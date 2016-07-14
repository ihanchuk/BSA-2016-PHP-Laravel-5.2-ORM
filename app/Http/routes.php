<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/",function(){
    print("hi");
});
Route::resource("/users","BookUsersController");
Route::resource("/books","BooksController");
Route::get("/editor/revoke/{id}","EditorController@revokeBook");

Route::get("/test",function(){
    $x = new \App\Models\FrontEnd\Users\BookUser();
    $res = $x->first();
    dd($res->books->toArray());

//    $y = new \App\Models\FrontEnd\Books\Book();
//    $res = $y->first();
//   dd($res->owner->toArray());
});