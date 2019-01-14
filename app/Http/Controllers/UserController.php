<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;

class UserController extends Controller
{
    public function index(){
        $otherBlogs = Blog::with('authorRelation')
        ->where('deleted_at', null)
        ->orderByDesc('created_at')
        ->limit(4)
        ->get();

        $blogsCount = DB::table('blogs')
        ->where('deleted_at', null)
        ->count();

        //return dd($otherBlogs);
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

    public function viewBlogAll(){
        $blogs = Blog::with('authorRelation')
        ->where('deleted_at', null)
        ->orderByDesc('created_at')
        ->paginate(5);

        return view('all', ['blogs' => $blogs]);
    }
}
