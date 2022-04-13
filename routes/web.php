<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;
use App\Http\Controllers\backend\EmailController;
use App\Http\Controllers\DeleteMarkallController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('category',CategoryController::class);
Route::resource('subcategory',SubcategoryController::class);

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('home/user/list/show',[HomeController::class,'showUserList'])->name('showUserList');
Route::delete('home/user/destroy/{id}',[HomeController::class,'usersdestroy'])->name('users.destroy');
Route::delete('home/deleteMarkall',[HomeController::class,'deleteMarkall'])->name('deleteMarkall');
//email
Route::get('emails',[EmailController::class,'index'])->name('emails.index');
Route::get('email/send/{id}',[EmailController::class,'emailsend'])->name('emailsend');