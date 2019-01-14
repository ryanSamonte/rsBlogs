<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ContributorController extends Controller
{
    public function index(){
        $blogCount = Blog::where('authorId', Auth::user()->id)
                    ->where('deleted_at', null)
                    ->count();
        
        $categoryCount = Category::where('authorId', Auth::user()->id)
                    ->where('deleted_at', null)
                    ->count();

        $authorCount = User::where('email', '!=', 'superadmin@gmail.com')->count();

        return view('contributor.index', compact("blogCount", "categoryCount", "authorCount"));
    }

    //BLOGS
    public function manageBlogs(){
        $categoryList = Category::where('deleted_at', null)->pluck('categoryName', 'id')->toArray();

        return view('contributor.manage.blog.index', compact('categoryList'));
    }

    public function saveBlogs(Request $request){
        $validatedData = $request->validate([
            "blogTitle" => "required",
            "categoryId" => "required",
            "blogContent" => "required",
            "bannerFile" => "required|image"
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

    public function retrieveBlogListAll(){
        $blogList = Blog::where('deleted_at', null)
        ->with('categoryRelation')
        ->with('authorRelation')
        ->get();

        return response()->json($blogList);
    }

    public function retrieveBlogListPerAdmin(){
        $blogList = Blog::where('authorId', Auth::user()->id)
        ->where('deleted_at', null)
        ->with('categoryRelation')
        ->with('authorRelation')
        ->get();

        return response()->json($blogList);
    }

    public function findBlog(Request $request){
        $blogId = $request['id'];

        $blogInfo = Blog::find($blogId);

        return response()->json($blogInfo);
    }

    public function updateBlog(Request $request){
        $validatedData = $request->validate([
            "blogTitle" => "required",
            "categoryId" => "required",
            "blogContent" => "required"
        ]); 

        $blogId = $request['id'];

        $blogInfo = Blog::find($blogId);

        $blogInput = $request->all();
        
        if(Input::hasFile('bannerFile')){
            $image = Input::file('bannerFile');
            $blogInput['bannerFile'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('img_upload');
            $image->move($destinationPath, $blogInput['bannerFile']);
        
            $blogInfo->update($blogInput);
        }
        else{
            $blogInfo->update($blogInput);
        }
    }

    public function updateBlogBanner(Request $request){
        $validatedData = $request->validate([
            "bannerFile" => "required|image"
        ]); 

        $blogId = $request['id'];

        $blogInfo = Blog::find($blogId);

        $blogInput = $request->all();
        
        if(Input::hasFile('bannerFile')){
            $image = Input::file('bannerFile');
            $blogInput['bannerFile'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('img_upload');
            $image->move($destinationPath, $blogInput['bannerFile']);
        
            $blogInfo->update($blogInput);
        }
        else{
            $blogInfo->update($blogInput);
        }
    }

    public function softDeleteBlog(Request $request){
        $blogId = $request['id'];

        $blogInfo = Blog::find($blogId);
        
        $blogInput = $request->all();

        $blogInput['deleted_at'] = now();

        $blogInfo->update($blogInput);

        return dd($blogInput);
    }


    //CATEGORY
    public function manageCategory(){
        return view('contributor.manage.category.index');
    }

    public function saveCategory(Request $request){
        $validatedData = $request->validate([
            "categoryName" => "required",
            "categoryDesc" => "required"
        ]);

        $categoryInput = $request->all();
        $categoryInput['authorId'] = Auth::user()->id;

        Category::create($categoryInput);

        return dd($categoryInput);
    }

    public function retrieveCategoryListAll(){
        $categoryList = Category::where('deleted_at', null)
        ->get();

        return response()->json($categoryList);
    }

    public function retrieveCategoryListPerAdmin(){
        $categoryList = Category::where('authorId', Auth::user()->id)
        ->where('deleted_at', null)
        ->get();

        return response()->json($categoryList);
    }

    public function findCategory(Request $request){
        $categoryId = $request['id'];

        $categoryInfo = Category::find($categoryId);

        return response()->json($categoryInfo);
    }

    public function updateCategory(Request $request){
        $validatedData = $request->validate([
            "categoryName" => "required",
            "categoryDesc" => "required"
        ]); 

        $categoryId = $request['id'];

        $categoryInfo = Category::find($categoryId);

        $categoryInput = $request->all();

        $categoryInfo->update($categoryInput);
    }

    public function softDeleteCategory(Request $request){
        $categoryId = $request['id'];

        $categoryInfo = Category::find($categoryId);
        
        $categoryInput = $request->all();

        $categoryInput['deleted_at'] = now();

        $categoryInfo->update($categoryInput);

        return dd($categoryInput);
    }
}
