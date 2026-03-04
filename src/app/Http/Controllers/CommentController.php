<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $item)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $item,
            'content' => $request->content,
        ]);

        return back();
    }
}
