<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
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
Route::get('/',[ProductController::class, 'index'])->name('index');
Route::get('create', [ProductController::class, 'create'])->name('create');
Route::post('store', [ProductController::class, 'store'])->name('store');
Route::group([
    'prefix' => '{product}'
], function () {
    Route::get('edit', [ProductController::class, 'edit'])->name('edit');
    Route::patch('update', [ProductController::class, 'update'])->name('update');
    Route::get('show', [ProductController::class, 'show'])->name('show');
    Route::get('destroy', [ProductController::class, 'destroy'])->name('destroy');

    Route::group([
        'prefix' => 'service',
        'as' => 'service.'
    ], function () {
        Route::get('create', [ServiceController::class, 'create'])->name('create');
        Route::post('store', [ServiceController::class, 'store'])->name('store');

        Route::prefix('{service}')->group(function () {
            Route::get('show', [ServiceController::class, 'show'])->name('show');
            Route::get('edit', [ServiceController::class, 'edit'])->name('edit');
            Route::post('update', [ServiceController::class, 'update'])->name('update');
            Route::get('destroy', [ServiceController::class, 'destroy'])->name('destroy');
            Route::get('update-status', [ServiceController::class, 'updateStatus'])->name('update_status');

        });

       
    });
});