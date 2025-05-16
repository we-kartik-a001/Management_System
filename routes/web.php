<?php

//Request 

use Symfony\Component\HttpFoundation\Request;

//Controller 
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CollegeStudentsController;
use App\Http\Controllers\TeachersController;

//Routes
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Student realted routes 
 */
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/index', [CollegeStudentsController::class, 'index'])->name('index');
    Route::get('/create', [CollegeStudentsController::class, 'create'])->name('create');
    // Route::post('/store', [CollegeStudentsController::class, 'store'])->middleware('check.age')->name('store');
    Route::post('/store', [CollegeStudentsController::class, 'store'])->name('store');
    Route::post('/students/{student}/teachers/{teacher}', [CollegeStudentsController::class, 'detachTeacher'])->name('detachTeacher');
});

/**
 * Teacher realted routes 
 */
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/index', [TeachersController::class, 'index'])->name('index');
    Route::get('/create', [TeachersController::class, 'create'])->name('create');
    Route::post('/store', [TeachersController::class, 'store'])->name('store');
    Route::get('/{teacher}/edit', [TeachersController::class, 'edit'])->name('edit');
    Route::patch('/{teacher}/update', [TeachersController::class, 'update'])->name('update');
    Route::delete('/{teacher}/delete', [TeachersController::class, 'delete'])->name('delete');
});

/**
 * If we go this link we will get the session data
 */
Route::get('get-all-session', function () {

    $session = session()->all();

    //Methods to get the data from the session 

    //M1
    $username = session()->get('user_name');
    $userid = session()->get('user_id');

    //M2
    $UserName = session('user_name');
    $UserId = session('user_id');

    // Print Session data
    print_r($session);
    print_r($username);
    print_r($userid);
    print_r($UserName);
    print_r($UserId);
});

/**
 * If we go this link then we are settting the data in the session 
 */
Route::get('set-session', function (Request $request) {
    $request->session()->put('user_name', 'Webreinvent Tech');
    $request->session()->put('user_id', '1223');

    return redirect('/get-all-session');
});

/**
 * From here we are deleting the session
 */
Route::get('destroy-session', function () {
    session()->forget(['user_name', 'user_id', 'name']);

    return redirect('get-all-session');
});

/**
 * verify blade related route
 */
Route::prefix('session')->name('session.')->group(function () {
    Route::get('/index', [SessionController::class, 'index'])->name('index');
    Route::get('/create', [SessionController::class, 'createSession'])->name('create');
    Route::post('/verifystore', [SessionController::class, 'storeInSession'])->name('store');
    Route::post('/delete', [SessionController::class, 'deleteFromSession'])->name('delete');
});

/**
 * Add to cart related routes
 */
