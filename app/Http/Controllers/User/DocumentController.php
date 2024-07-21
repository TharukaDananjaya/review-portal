<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Services\DocumentService;
use App\Services\FileService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    private $resources = [];
    private $prefix = '/user/documents';
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
    public function index(Request $request): \Illuminate\View\View
    {
        $this->resources['data'] = $this->documentService->getAll();
        return view('user.documents.index')->with($this->resources);
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
        return view('user.documents.view')->with($this->resources);
    }
    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'comment' => ['required'],
        ]);
        try {
            $this->commentService->store([
                'comment' => $request->comment,
                'user_id' => $request->user()->id,
                'status' => 0,
                'document_id' => $request->id
            ]);
            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Thank you. We have received your comment. It is currently being reviewed by our moderators and will be published once approved. Please note that we will not amend any part of the comment, all that meets the guidelines will be published as posted.");
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
        $getRequest = $this->documentService->getById($request->id);
        if ($getRequest) {
            return $this->fileService->downloadFile($getRequest->document);
        }
        $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
        return redirect()->back()->with('messages', $this->resources);
    }
}
