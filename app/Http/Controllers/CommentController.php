<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store($id){

        $comment= new Comment();
        $comment->idea_id = $id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

         return redirect()->route('ideas.show', $id)->with('success', 'Comment posted successfully');
    }
}
