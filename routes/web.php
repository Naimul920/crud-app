<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/category-product', [HomeController::class,'category'])->name('category');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/add-product', [ProductController::class,'index'])->name('product.add');
    Route::get('/manage-product', [ProductController::class,'manage'])->name('product.manage');
    Route::post('/new-product', [ProductController::class,'create'])->name('product.new');
    Route::get('/edit-product/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/edit-product/{id}', [ProductController::class,'update'])->name('product.update');
});
