<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Bookstore\AllBooksController;
use App\Http\Controllers\Bookstore\CreateBookController;
use App\Http\Controllers\Bookstore\DeleteBookController;
use App\Http\Controllers\Bookstore\GetBookController;
use App\Http\Controllers\Bookstore\UpdateBookController;
use App\Http\Controllers\Ratings\RatingController;
use App\Http\Controllers\Users\LogOutController;
use App\Http\Controllers\Users\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function(){
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });

    Route::prefix('books')->name('book.')->group(static function(){
        Route::get('/', [AllBooksController::class, 'index'])->name('index');
        Route::get('/{book}', [GetBookController::class, 'show'])->name('show');
    });

    Route::middleware('auth:sanctum')->group(static function () {
        Route::prefix('users')->name('user.')->group(static function(){
            Route::get('/profile', [ProfileController::class, 'show'])->name('show');
            Route::post('logOut', [LogOutController::class, 'logOut'])->name('logOut');
        });

        Route::prefix('books')->name('book.')->group(static function(){
            Route::post('/', [CreateBookController::class, 'store'])->name('store');
            Route::patch('/{book}', [UpdateBookController::class, 'update'])->name('update');
            Route::delete('/{book}', [DeleteBookController::class, 'destroy'])->name('destroy');
        });

        Route::name('rating.')->group(static function(){
            Route::post('/book/{book}/rating', [RatingController::class, 'store'])->name('store');
        });
    });
});
