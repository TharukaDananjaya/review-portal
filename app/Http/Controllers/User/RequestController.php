<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\FileService;
use App\Services\RequestService;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    private $resources = [];
    private $prefix = '/user/request';
    private $requestService;
    private $fileService;
    public function __construct(RequestService $requestService, FileService $fileService)
    {
        $this->resources['prefix'] = $this->prefix;
        $this->requestService = $requestService;
        $this->fileService = $fileService;
    }
    public function Index(Request $request): \Illuminate\View\View
    {
        $this->resources['data'] = $this->requestService->getByUser($request->user()->id);
        return view('user.requests.index')->with($this->resources);
    }
    public function store(Request $request)
    {
        $request->validate([
            'request_type' => ['required']
        ]);
        try {
            $documentPath = NULL;
            if ($request->request_type == 'other') {
                if ($request->hasFile('file')) {
                    $documentPath = $this->fileService->fileUpload('request/documents', $request->file);
                }
            }

            if ($request->request_type == 'call_back') {
                // check if the user already has pending call request

                if ($this->requestService->checkRequestLimitExeeded($request->request_type, $request->user()->id) > 0) {
                    $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Apologies, but you could only have 1 pending Call back request. A new request can be posted once the current pending request is completed.");
                    return redirect()->back()->with('messages', $this->resources);
                }
            } elseif ($request->request_type == 'meet') {
                // check if the user already has pending meet request
                if ($this->requestService->checkRequestLimitExeeded($request->request_type, $request->user()->id) > 0) {
                    $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Apologies, but you could only have 1 pending Meet request. A new request can be posted once the current pending request is completed.");
                    return redirect()->back()->with('messages', $this->resources);
                }
            }
            // check if the user already has pending 5 requests
            if ($this->requestService->checkRequestLimitExeeded5($request->user()->id) >= 5) {
                $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Apologies, but you could only have 3 pending Other requests. A new request can be posted when one of the pending request is completed.");
                return redirect()->back()->with('messages', $this->resources);
            }
            $this->requestService->store([
                'request_type' => $request->request_type,
                'note' => $request->note,
                'user_id' => $request->user()->id,
                'status' => 'pending',
                'document' => $documentPath
            ]);

            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "We have received your request and will be getting back to you at the earliest.");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
    public function download(Request $request)
    {
        $request->validate([
            'id' => ['required']
        ]);
        $getRequest = $this->requestService->getForUser($request->user()->id, $request->id);
        if ($getRequest) {
            return $this->fileService->downloadFile($getRequest->document);
        }
        $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
        return redirect()->back()->with('messages', $this->resources);
    }
}
