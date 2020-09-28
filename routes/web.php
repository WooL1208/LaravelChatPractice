<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//set lang
Route::get('lang/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('lang',$locale);
    return redirect()->back();;
});

//Comment List
Route::match(["get","post"],'/','CommentListController@showComment');

//Reply List and Add Reply
Route::match(["get","post"],'reply/{id}','ReplyController@addReply');
// Route::post('reply','ReplyController@doAddReply');

//Add Post
Route::get('add','AddCommentController@addComment');
Route::post('add','AddCommentController@doAddComment');

//User SignUp
Route::get('sign-up','SignController@signUp');
Route::post('sign-up','SignController@doSignUp');

//signIn
Route::match(["get","post"],'sign-in', 'SignController@signIn');
//signOut
Route::get('sign-out', 'SignController@signOut');

//test
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
