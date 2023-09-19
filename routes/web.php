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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/list', [App\Http\Controllers\ProductController::class, 'list'])->name('list');

//Route::get('/list', [App\Http\Controllers\CompaniesController::class, 'companyname'])->name('companyname');

//商品新規登録画面の表示
Route::get('/p_register', [App\Http\Controllers\ProductController::class, 'register'])->name('p_register');
//商品登録の処理
Route::post('/p_register', [App\Http\Controllers\ProductController::class, 'submit'])->name('submit');

//商品詳細画面の表示
Route::get('/detail/{id}', [App\Http\Controllers\ProductController::class, 'detail'])->name('detail');

//商品編集画面の表示
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');

//商品情報編集処理
Route::post('/edit/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');


