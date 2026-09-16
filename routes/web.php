<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\VendorPackagesController;
use App\Http\Controllers\VendorSettlementController;
use App\Http\Controllers\PaymentHistoryController;



use App\Http\Controllers\VendorsController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\BookingMastersController;
use App\Http\Controllers\VendorBankdetailsController;
use App\Http\Controllers\VendorServicesController;










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

Route::put('/categories/{id}', [CategoriesController::class, 'update'])
    ->name('categories.update');

Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])
    ->name('categories.destroy');



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


Route::get('/vendorpackages', [VendorPackagesController::class, 'index'])
    ->name('vendorpackages');

Route::post('/vendorpackages/store', [VendorPackagesController::class, 'store'])
    ->name('vendorpackages.store');

Route::get('/vendorpackages/{id}/edit', [VendorPackagesController::class, 'edit'])
    ->name('vendorpackages.edit');

Route::put('/vendorpackages/{id}', [VendorPackagesController::class, 'update'])
    ->name('vendorpackages.update');


Route::get('/payment-history', [PaymentHistoryController::class, 'index'])
    ->name('payment_history');

Route::post('/payment-history/store', [PaymentHistoryController::class, 'store'])
    ->name('payment_history.store');

Route::put('/payment-history/{id}', [PaymentHistoryController::class, 'update'])
    ->name('payment_history.update');



Route::get('/vendorsettlement', [VendorSettlementController::class, 'index'])
    ->name('vendorsettlement');

Route::post('/vendorsettlement/store', [VendorSettlementController::class, 'store'])
    ->name('vendor_settlement.store');

Route::put('/vendorsettlement/{id}', [VendorSettlementController::class, 'update'])
    ->name('vendor_settlement.update');



Route::get('/customers', [CustomersController::class, 'index'])
    ->name('customers');

Route::post('/customers/store', [CustomersController::class, 'store'])
    ->name('customers.store');

Route::put('/customers/{id}', [CustomersController::class, 'update'])
    ->name('customers.update');

Route::get('/bookingmasters', [BookingMastersController::class, 'index'])
    ->name('bookingmasters.index');




Route::get('/vendor-bankdetails', [VendorBankdetailsController::class, 'index'])
    ->name('vendor_bankdetails.index');

Route::post('/vendor-bankdetails', [VendorBankdetailsController::class, 'store'])
    ->name('vendor_bankdetails.store');

Route::put('/vendor-bankdetails/{id}', [VendorBankdetailsController::class, 'update'])
    ->name('vendor_bankdetails.update');





Route::get('/vendor-services', [VendorServicesController::class, 'index'])
    ->name('vendor_services.index');

Route::post('/vendor-services', [VendorServicesController::class, 'store'])
    ->name('vendor_services.store');

Route::put('/vendor-services/{id}', [VendorServicesController::class, 'update'])
    ->name('vendor_services.update');

Route::delete('/vendor-services/{id}', [VendorServicesController::class, 'destroy'])
    ->name('vendor_services.destroy');









require __DIR__.'/auth.php';
