<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class)
    ->only(['index', 'show']);

Route::resource('suppliers', SupplierController::class);

Route::resource('purchases', PurchaseController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::resource('sales', SaleController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::get('/stock-movements', [StockMovementController::class, 'index'])
    ->name('stock-movements.index');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
