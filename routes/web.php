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


//ADMIN
Route::get('/admin', [
    'uses'=>'AdminController@index',
    'as'=>'admin.index'
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

Route::get('/admin/manage/blog/retrieveAll', [
    'uses'=> 'AdminController@retrieveBlogList',
    'as'=>'admin.manage.blog.retrieve'
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

Route::get('/admin/manage/category/retrieveAll', [
    'uses'=> 'AdminController@retrieveCategoryList',
    'as'=>'admin.manage.category.retrieve'
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

Auth::routes();
