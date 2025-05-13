<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/student',[StudentsController::class,'showForm'])->name('student.form');
Route::post('/restricted',[StudentsController::class,'store'])->middleware('check.age')->name('student.checked');

/**
 * Teacher realted routes 
 */
Route::prefix('teacher')->name('teacher.')->group(function(){
    Route::get('/index',[TeachersController::class,'index'])->name('index');
    Route::get('/create', [TeachersController::class, 'create'])->name('create');
    Route::post('/store', [TeachersController::class, 'store'])->name('store');
    Route::get('/{teacher}/edit', [TeachersController::class, 'edit'])->name('edit');
    Route::patch('/{teacher}/update', [TeachersController::class, 'update'])->name('update');
    Route::delete('/{teacher}/delete', [TeachersController::class, 'delete'])->name('delete');
});
