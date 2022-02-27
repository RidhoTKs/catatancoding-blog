<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardCategoryController;

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

Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::resource('/', PostController::class);

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/admin-login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/admin-login', [LoginController::class, 'credential']);

Route::post('/admin-logout', [LoginController::class, 'logout'])->middleware('auth');

// route untuk mendapat slug secara otomatis
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/category/checkSlug', [DashboardCategoryController::class, 'checkSlug'])->middleware('auth');

// // route untuk dashboard admin untuk mengelola post
// Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');

// // route untuk mengelola category
// Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');

    // route untuk mengelola category
    Route::resource('/dashboard/category', DashboardCategoryController::class)->middleware('auth');
});
