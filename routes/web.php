<?php

use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['auth'],
    'prefix' => '/productos'
], function () {
    Route::get('', [ProductController::class, 'index'])->name('products');

    Route::group([
        'middleware' => ['role:administrador']
    ], function () {
        Route::get('nuevo', [ProductController::class, 'nuevo'])->name('prod.create');
        Route::post('nuevo', [ProductController::class, 'add']);

        Route::get('editar/{prod}', [ProductController::class, 'editar'])->name('prod.edit');
        Route::post('editar/{prod}', [ProductController::class, 'update']);

        Route::delete('/{prod}', [ProductController::class, 'delete'])->name('prod.delete');
    });

    Route::post('/comprar/{prod}', [ProductController::class, 'shop'])
        ->middleware('role:cliente')->name('prod.shop');
});

Route::group([
    'middleware' => ['auth', 'role:administrador'],
    'prefix' => '/facturas'
], function () {
    Route::get('', [FacturaController::class, 'index'])->name('facturas');
});

require __DIR__ . '/auth.php';
