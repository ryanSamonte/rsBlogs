<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;

class AdminController extends Controller
{
    public function index(){
        $blogCount = Blog::all()->count();
        
        $categoryCount = Category::all()->count();

        return view('admin.index', compact("blogCount", "categoryCount"));
    }

    //BLOGS
    public function manageBlogs(){
        $categoryList = Category::pluck('categoryName', 'id')->toArray();

        return view('admin.manage.blog.index', compact('categoryList'));
    }

    public function saveBlogs(Request $request){
        $blogInput = $request->all();
        $blogInput['authorId'] = 1;

        Blog::create($blogInput);

        return dd($blogInput);
    }

    public function retrieveBlogList(){
        $blogList = Blog::with('categoryRelation')->get();

        return response()->json($blogList);
    }


    //CATEGORY
    public function manageCategory(){
        return view('admin.manage.category.index');
    }

    public function saveCategory(Request $request){
        $categoryInput = $request->all();
        $categoryInput['authorId'] = 1;

        Category::create($categoryInput);

        return dd($categoryInput);
    }

    public function retrieveCategoryList(){
        $categoryList = Category::all();

        return response()->json($categoryList);
    }
}
