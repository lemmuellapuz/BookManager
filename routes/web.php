<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PublishedBookController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SignupController;
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

//GUEST & AUTH

Route::middleware('guest')->group(function(){

    Route::get('/sign-up', [SignupController::class, 'index'])->name('sign-up.index');
    Route::post('/sign-up', [SignupController::class, 'signUp'])->name('sign-up');
    
    Route::get('/sign-in', [SigninController::class, 'index'])->name('sign-in.index');
    Route::post('/sign-in', [SigninController::class, 'signIn'])->name('sign-in');
    
});

Route::middleware('auth')->group(function(){

    Route::post('/sign-out', [SignoutController::class, 'signOut'])->name('sign-out');

    Route::resource('books', BookController::class);
    Route::get('books-table', [BookController::class, 'table'])->name('books.table');

    Route::get('published-books', [PublishedBookController::class, 'index'])->name('published-books.index');
    Route::get('published-books-table', [PublishedBookController::class, 'table'])->name('published-books.table');
    Route::get('published-books/{book}', [PublishedBookController::class, 'view'])->name('published-books.view');

});
