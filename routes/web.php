<?php
//USER
Route::get('/', [
    'uses'=>'UserController@index',
    'as'=>'home'
]);

Route::get('/view/blog', [
    'uses'=> 'UserController@viewBlog',
    'as'=>'user.view.blog'
]);

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function(){
    //ADMIN
    Route::get('/admin', [
        'uses'=>'AdminController@index',
        'as'=>'admin.index',
    ]);

    //BLOGS
    Route::get('/admin/manage/blog', [
        'uses'=>'AdminController@manageBlogs',
        'as'=>'admin.manage.blog'
    ]);

    Route::post('/admin/manage/blog/save', [
        'uses'=> 'AdminController@saveBlogs',
        'as'=>'admin.manage.blog.save'
    ]);

    Route::get('/admin/manage/blog/retrieve/all', [
        'uses'=> 'AdminController@retrieveBlogListAll',
        'as'=>'admin.manage.blog.retrieve.all'
    ]);

    Route::get('/admin/manage/blog/retrieve', [
        'uses'=> 'AdminController@retrieveBlogListPerAdmin',
        'as'=>'admin.manage.blog.retrieve'
    ]);

    Route::get('/admin/manage/blog/edit', [
        'uses'=> 'AdminController@findBlog',
        'as'=>'admin.manage.blog.edit'
    ]);

    Route::post('/admin/manage/blog/update', [
        'uses'=> 'AdminController@updateBlog',
        'as'=>'admin.manage.blog.update'
    ]);

    Route::get('/admin/manage/blog/delete', [
        'uses'=> 'AdminController@softDeleteBlog',
        'as'=>'admin.manage.blog.delete'
    ]);

    //CATEGORY
    Route::get('/admin/manage/category', [
        'uses'=>'AdminController@manageCategory',
        'as'=>'admin.manage.category'
    ]);

    Route::post('/admin/manage/category/save', [
        'uses'=> 'AdminController@saveCategory',
        'as'=>'admin.manage.category.save'
    ]);

    Route::get('/admin/manage/category/retrieve/all', [
        'uses'=> 'AdminController@retrieveCategoryListAll',
        'as'=>'admin.manage.category.retrieve.all'
    ]);

    Route::get('/admin/manage/category/retrieve', [
        'uses'=> 'AdminController@retrieveCategoryListPerAdmin',
        'as'=>'admin.manage.category.retrieve'
    ]);

    Route::get('/admin/manage/category/edit', [
        'uses'=> 'AdminController@findCategory',
        'as'=>'admin.manage.category.edit'
    ]);

    Route::post('/admin/manage/category/update', [
        'uses'=> 'AdminController@updateCategory',
        'as'=>'admin.manage.category.update'
    ]);

    Route::get('/admin/manage/category/delete', [
        'uses'=> 'AdminController@softDeleteCategory',
        'as'=>'admin.manage.category.delete'
    ]);

    //AUTHOR
    Route::get('/admin/manage/author', [
        'uses'=>'AdminController@manageAuthor',
        'as'=>'admin.manage.author'
    ]);

    Route::post('/admin/manage/author/save', [
        'uses'=> 'AdminController@saveAuthor',
        'as'=>'admin.manage.author.save'
    ]);

    Route::get('/admin/manage/author/retrieveAll', [
        'uses'=> 'AdminController@retrieveAuthorList',
        'as'=>'admin.manage.author.retrieve'
    ]);
});
