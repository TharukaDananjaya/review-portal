<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\DocumentService;
use App\Services\FileService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $resources = [];
    private $prefix = '/home';
    private $documentService;
    private $commentService;
    private $fileService;
    public function __construct(DocumentService $documentService, CommentService $commentService, FileService $fileService)
    {
        $this->resources['prefix'] = $this->prefix;
        $this->documentService = $documentService;
        $this->commentService = $commentService;
        $this->fileService = $fileService;
    }
    public function Index(Request $request): \Illuminate\View\View
    {
        $this->resources['data'] = $this->documentService->getAll();
        return view('index')->with($this->resources);
    }
    public function view(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'id' => ['required']
        ]);
        $requestAll = $request->all();
        $this->resources['data'] = $this->documentService->getById($requestAll['id']);
        $this->resources['comments'] = $this->commentService->getAllByDocumentId($requestAll['id']);
        $this->resources['comment_count'] = $this->commentService->getCommentCountByDocId($requestAll['id']);
        return view('view')->with($this->resources);
    }
    public function download(Request $request)
    {
        $request->validate([
            'id' => ['required']
        ]);
        $getRequest = $this->documentService->getById($request->id);
        if ($getRequest) {
            return $this->fileService->downloadFile($getRequest->document);
        }
        $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
        return redirect()->back()->with('messages', $this->resources);
    }
}
