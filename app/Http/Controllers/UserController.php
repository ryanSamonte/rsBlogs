<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;

class UserController extends Controller
{
    public function index(){
        $otherBlogs = DB::table('blogs')
        ->orderByDesc('created_at')
        ->limit(4)
        ->get();

        $blogsCount = DB::table('blogs')
        ->count();

        return view("welcome", compact("otherBlogs", "blogsCount"));
    }

    public function viewBlog(Request $request){
        $blog = Blog::find($request["id"]);

        $otherBlogs = DB::table('blogs')
        ->orderByDesc('created_at')
        ->limit(5)
        ->get();

        return view("viewBlog", compact("blog", "otherBlogs"));
    }
}
