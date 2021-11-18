<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'middleware' => ['auth'],
    'prefix' => '/productos'
], function () {
    Route::get('', [ProductController::class, 'index'])->name('products');

    Route::group([
        'middleware' => ['role:administrador']
    ], function () {
        Route::get('nuevo', [ProductController::class, 'nuevo'])->name('prod.create');
        Route::delete('/{prod}', [ProductController::class, 'delete'])->name('prod.delete');
    });
});

require __DIR__ . '/auth.php';
