<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function blogs() {
        $title = 'Tin tức';
        $blogs = Blog::all();
        return view('dashboard.pages.blogs.list', [

            "title" => $title,
            "blogs" => $blogs,

        ] );
    }
    public function creBlo() {
        $title = 'Tin tức';
        
        
        return view('dashboard.pages.blogs.create', [

            "title" => $title,

        ] );
    }
}
