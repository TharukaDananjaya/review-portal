<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use App\Services\InvoiceService;
use App\Services\UserService;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\PdfToImage\Pdf as PdfToImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    private $resources = [];
    private $prefix = '/admin/users';
    private $invoiceService;
    private $userService;
    private $fileService;
    public function __construct(
        InvoiceService $invoiceService,
        UserService $userService,
        FileService $fileService
    ) {
        $this->resources['prefix'] = $this->prefix;
        $this->invoiceService = $invoiceService;
        $this->userService = $userService;
        $this->fileService = $fileService;
    }
    public function index(): \Illuminate\View\View
    {
        $this->resources['data'] = $this->invoiceService->getAll();
        return view('admin.invoice.manage')->with($this->resources);
    }
    public function create(): \Illuminate\View\View
    {
        return view('admin.invoice.add')->with($this->resources);
    }
    public function search(Request $request)
    {
        try {
            $request->validate([
                'search' => ['required'],
            ]);
            $this->resources['data'] = $this->invoiceService->search($request->search);
            return view('admin.invoice.manage')->with($this->resources);
        } catch (\Exception $ex) {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => $ex->getMessage());
            return redirect()->back()->with('messages', $this->resources);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => ['required'],
            'date' => ['required'],
            'product_condition' => ['required'],
            'designation' => ['required'],
            'qty' => ['required'],
            'puht' => ['required'],
            'total_ht' => ['required'],
            'currency' => ['required'],
        ]);
        try {
            $requestAll = $request->all();
            $products = [];
            $total = 0;
            foreach ($requestAll['designation'] as $key => $value) {

                $products[] = ["designation" => $value, 'notes' =>  $requestAll['notes'][$key], "qty" => $requestAll['qty'][$key], "puht" => $requestAll['puht'][$key], "total_ht" => $requestAll['total_ht'][$key]];
                $total = $total + $requestAll['total_ht'][$key];
            }

            $data = $this->invoiceService->store([
                'customer_name' => $requestAll['customer_name'],
                'date' => $requestAll['date'],
                'product_condition' => $requestAll['product_condition'],
                'products' => $products,
                'total_amount' => $total,
                'currency' =>  $requestAll['currency']
            ]);
            $pdf = $this->generatePdf($data);
            return $this->downloadPdf($pdf, 'invoice_' . $data['id'] . ".pdf");

            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Invoice creation success!");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            dd($ex);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }

    public function edit(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();
        $this->resources['data'] = $this->invoiceService->getById($requestAll['id']);
        return view('admin.invoice.edit')->with($this->resources);
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'customer_name' => ['required'],
            'date' => ['required'],
            'product_condition' => ['required'],
            'designation' => ['required'],
            'qty' => ['required'],
            'puht' => ['required'],
            'total_ht' => ['required'],
            'currency' => ['required'],
        ]);
        try {
            $requestAll = $request->all();
            $products = [];
            $total = 0;
            foreach ($requestAll['designation'] as $key => $value) {
                $products[] = ["designation" => $value, 'notes' =>  $requestAll['notes'][$key], "qty" => $requestAll['qty'][$key], "puht" => $requestAll['puht'][$key], "total_ht" => $requestAll['total_ht'][$key]];
                $total = $total + $requestAll['total_ht'][$key];
            }

            $this->invoiceService->update([
                'customer_name' => $requestAll['customer_name'],
                'date' => $requestAll['date'],
                'product_condition' => $requestAll['product_condition'],
                'products' => $products,
                'total_amount' => $total,
                'currency' =>  $requestAll['currency'],
            ], $requestAll['id']);



            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Invoice updated success!");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
    public function delete(Request $request): mixed
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();
        $delete = $this->invoiceService->delete($requestAll['id']);
        if ($delete) {
            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Invoice deleting successfully completed!.");
        } else {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Invoice deleting failed try again!.");
        }

        return redirect()->back()->with('messages', $this->resources);
    }
    public function template(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();

        $this->resources['data'] = $this->invoiceService->getById($requestAll['id']);
        return view('admin.invoice.template')->with($this->resources);
    }

    public function generatePdf($data)
    {
        $pdfData = [
            "data" => $data
        ];
        // Create a new Dompdf instance
        $pdfName = 'invoice_' . $data['id'] . ".pdf";
        $pdf = Pdf::loadView('admin.invoice.template', $pdfData);
        $pdf->setPaper('a4', 'landscape');
        Storage::put('public/pdf/' . $pdfName, $pdf->output());

        return $pdf;
    }
    public function downloadPdf($pdf, $pdfName)
    {
        return $pdf->stream($pdfName);
    }
    public function print(Request $request)
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();

        $data = $this->invoiceService->getById($requestAll['id']);
        $pdf = $this->generatePdf($data);
        return $this->downloadPdf($pdf, 'invoice_' . $data['id'] . ".pdf");
    }

    public function multiplePrint(Request $request)
    {
        $request->validate([
            'print_type' => ['required'],
            'slected_rows' => ['required'],
        ]);

        try {
            $requestAll = $request->all();
            $zipFilePaths = [];

            if ($requestAll['print_type'] == 'png') {
                $pngPath = 'storage/pdf/images/';
                $this->fileService->makeDirectory($pngPath);
                foreach ($requestAll['slected_rows'] as $value) {
                    $getPdf = $this->invoiceService->getById($value);
                    $pdf = $this->generatePdf($getPdf);
                    $zipFilePaths[] = public_path() . '/storage/pdf/images/invoice_' . $getPdf['id'] . ".png";
                    $pdf = new PdfToImage(public_path() . "/storage/pdf/" . 'invoice_' . $getPdf['id'] . ".pdf");

                    $pageCount = $pdf->getNumberOfPages(); //returns an int
                    if ($pageCount > 1) {
                        $mergePaths = [];
                        for ($i = 0; $i < $pageCount; $i++) {
                            $pngName = "invoice_$getPdf[id]_$i.png";
                            $mergePaths[] = public_path('storage/pdf/images/'.$pngName);
                            $pdf->setPage($i + 1)->saveImage($pngPath . $pngName);
                        }
                        $this->fileService->mergeImages("invoice_$getPdf[id].png", $mergePaths[0], $mergePaths);
                    } else {
                        $pngName = "invoice_$getPdf[id].png";
                        $pdf->saveImage($pngPath . $pngName);
                    }
                }
            } elseif ($requestAll['print_type'] == 'pdf') {
                $this->fileService->makeDirectory('storage/pdf/zip/');
                foreach ($requestAll['slected_rows'] as $value) {
                    $getPdf = $this->invoiceService->getById($value);
                    $pdf = $this->generatePdf($getPdf);
                    $zipFilePaths[] = public_path() . '/storage/pdf/invoice_' . $getPdf['id'] . ".pdf";
                }
            }
            $zipPath = public_path('storage/pdf/zip/' . time() . '.zip');
            return $this->fileService->downloadZip($zipPath, $zipFilePaths);
        } catch (\Exception $e) {
            dd($e);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
}
