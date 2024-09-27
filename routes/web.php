<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\SubmissionController;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/consumer_form', [ConsumerController::class, 'consumerForm'])->name('consumer_form');

Route::prefix('consumer')->group(function () {
    Route::get('/', [ConsumerController::class, 'index']);
    Route::post('/', [ConsumerController::class, 'store'])->name('save_consumer');
    Route::post('/store_products', [ConsumerController::class, 'storeProducts'])->name('save_products');
    Route::put('/{consumer_id}', [ConsumerController::class, 'updateAddress'])->name('update_address');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('get_products');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('consumer')->group(function () {
        Route::get('/', [ConsumerController::class, 'index'])->name('get_consumer');
    });

    Route::prefix('submission')->group(function () {
        Route::get('/', [SubmissionController::class, 'index'])->name('get_submission');
    });
});
