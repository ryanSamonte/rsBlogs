<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function index(){
        $blogCount = Blog::all()->count();
        
        $categoryCount = Category::all()->count();

        $authorCount = User::all()->count();

        return view('admin.index', compact("blogCount", "categoryCount", "authorCount"));
    }

    //BLOGS
    public function manageBlogs(){
        $categoryList = Category::pluck('categoryName', 'id')->toArray();

        return view('admin.manage.blog.index', compact('categoryList'));
    }

    public function saveBlogs(Request $request){
        $validatedData = $request->validate([
            "bannerFile" => "dimensions:max_width=728,max_height=400",
        ]); 

        $blogInput = $request->all();

        if(Input::hasFile('bannerFile')){
            $image = Input::file('bannerFile');
            $blogInput['bannerFile'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('img_upload');
            $image->move($destinationPath, $blogInput['bannerFile']);
            
            $blogInput['authorId'] = Auth::user()->id;
        
            Blog::create($blogInput);
        }
        else{
            $blogInput['authorId'] = Auth::user()->id;
        
            Blog::create($blogInput);
        }
    }

    public function retrieveBlogList(){
        $blogList = Blog::with('categoryRelation')->with('authorRelation')->get();

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

    //AUTHOR
    public function manageAuthor(){
        return view('admin.manage.author.index');
    }

    public function saveAuthor(Request $request){
        $authorInput = $request->all();
        $authorInput['password'] = bcrypt($request['password']);

        User::create($authorInput);

        return dd($authorInput);
    }

    public function retrieveAuthorList(){
        $authorList = User::all();

        return response()->json($authorList);
    }
}
