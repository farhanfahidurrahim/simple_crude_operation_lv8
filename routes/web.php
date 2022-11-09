<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SectionController;


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
Route::get('/password-change',[HomeController::class,'pass_change'])->name('password_change');
Route::post('/password-update',[HomeController::class,'pass_update'])->name('password_update');


Route::get('/class',[ClassController::class,'index'])->name('class');
Route::post('class/store',[ClassController::class,'store'])->name('add.class');
Route::get('class/delete/{id}',[ClassController::class,'delete'])->name('delete.class');
Route::get('class/edit/{id}',[ClassController::class,'edit'])->name('edit.class');
Route::post('class/update/{id}',[ClassController::class,'update'])->name('update.class');

Route::resource('/students',StudentController::class);

Route::resource('/section',SectionController::class);
