<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog) {
        request()->validate([
            'body' => 'required | min:10'
        ]);

        $blog->comment()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }

}
