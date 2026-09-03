<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ReviewsController;



use App\Http\Controllers\VendorsController;
use App\Http\Controllers\BannersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');


 Route::get('/page', [HomeController::class, 'page'])->name('page.list');

Route::get('/categories', [CategoriesController::class, 'index'])
    ->name('categories.index');

Route::post('/categories', [CategoriesController::class, 'store'])
    ->name('categories.store');

Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])
    ->name('categories.edit');

Route::put('/categories/{id}', [CategoriesController::class, 'update'])
    ->name('categories.update');



Route::get('/reviews', [ReviewsController::class, 'index'])
    ->name('reviews.index');

Route::post('/reviews/store', [ReviewsController::class, 'store'])
    ->name('reviews.store');

Route::put('/reviews/{id}', [ReviewsController::class, 'update'])
    ->name('reviews.update');

Route::delete('/reviews/{id}', [ReviewsController::class, 'destroy'])
    ->name('reviews.destroy');






 Route::get('/vendors', [VendorsController::class, 'index'])
    ->name('vendors');

Route::get('/vendors/create', function () {
    return view('create_vendor');
})->name('vendors.create');

Route::post('/vendors/store', [VendorsController::class, 'store'])
    ->name('vendors.store');

Route::put('/vendors/{id}', [VendorsController::class, 'update'])
    ->name('vendors.update');


Route::get('/banners', [BannersController::class, 'index'])
    ->name('banners');
Route::post('/banners/store', [BannersController::class, 'store'])
    ->name('banners.store');
Route::get('/banners/{id}/edit', [BannersController::class, 'edit'])
    ->name('banners.edit');
Route::put('/banners/{id}', [BannersController::class, 'update'])
    ->name('banners.update');
Route::delete('/banners/{id}', [BannersController::class, 'destroy'])
    ->name('banners.destroy');


require __DIR__.'/auth.php';
