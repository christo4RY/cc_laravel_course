<?php

namespace App\Http\Controllers;

use App\Mail\subscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $subscribers = $blog->subscribes->filter(fn($subscriber) => $subscriber->id != auth()->id());
        $subscribers->each(function($subscriber) use ($blog){
            Mail::to($subscriber->email)->queue(new subscriberMail($blog));
        });

        return redirect("/blog/".$blog->slug);
    }

}
