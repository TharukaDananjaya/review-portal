<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\IdeaAndSuggestionService;
use Illuminate\Http\Request;

class IdeaAndSuggestionController extends Controller
{
    private $resources = [];
    private $prefix = '/user/request';
    private $ideaAndSuggestionService;
    public function __construct(IdeaAndSuggestionService $ideaAndSuggestionService)
    {
        $this->resources['prefix'] = $this->prefix;
        $this->ideaAndSuggestionService = $ideaAndSuggestionService;
    }
    public function Index(Request $request): \Illuminate\View\View
    {
        $this->resources['data'] = $this->ideaAndSuggestionService->getForUser($request->user()->id);
        return view('user.idea-and-suggestions.index')->with($this->resources);
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required'],
        ]);
        try {
            $this->ideaAndSuggestionService->store([
                'description' => $request->description,
                'user_id' => $request->user()->id,
            ]);
            $this->resources['messages'] = array("type" => "success", "heading" => "Success", "description" => "Thank you. Your Idea/Suggestion have been received.");
            return redirect()->back()->with('messages', $this->resources);
        } catch (\Exception $ex) {
            dd($ex);
            $this->resources['messages'] = array("type" => "error", "heading" => "Error", "description" => "Something went wrong.");
            return redirect()->back()->with('messages', $this->resources);
        }
    }
}
