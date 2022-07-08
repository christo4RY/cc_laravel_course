<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index() {
        return view('blogs', [
            'blogs' => Blog::latest()
                            ->filter(request(['search','category','users']))
                            ->paginate(6)
                            ->withQueryString()
        ]);
    }

    function show(Blog $blog) {
        return view('blog', [
            'blog' => $blog,
            'randomBlogs' => Blog::inrandomOrder()->take(3)->get()
        ]);
    }
}
