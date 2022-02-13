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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// テスト用トップページ
Route::get('/test_todo', [App\Http\Controllers\test_todoController::class, 'test_todo'])->name('test_todo');

// todo新規入力ページ
Route::post('/todo_new', [App\Http\Controllers\TodoController::class, 'todo_new'])->name('todo_new');

// todo新規データベース追加処理
Route::post('/todo_save', [App\Http\Controllers\TodoController::class, 'todo_save'])->name('todo_save');

// todo選択年月日で検索
Route::post('/todo_list', [App\Http\Controllers\TodoController::class, 'todo_list'])->name('todo_list');

// 選択したtodoの編集
Route::get('/todo_edit/{id}',[App\Http\controllers\TodoController::class,'todo_edit'])->name('todo_edit');

// todoデータベース更新
Route::post('/todo_update', [App\Http\Controllers\TodoController::class, 'todo_update'])->name('todo_update');

// 選択したtodoの削除
Route::get('/todo_delete/{id}',[App\Http\controllers\TodoController::class,'todo_delete'])->name('todo_delete');







