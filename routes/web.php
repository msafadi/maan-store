<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\ProductsController;
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
})
->middleware(['auth', 'verified'])
->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')
    ->prefix('/admin')
    ->namespace('Admin')
    ->as('admin.')
    ->group(function() {

        Route::prefix('/categories')->as('categories.')->group(function() {

            Route::get('/', [CategoriesController::class, 'index'])->name('index');
            Route::get('/create', [CategoriesController::class, 'create'])->name('create');
            Route::get('/{id}', [CategoriesController::class, 'show'])->name('show');
            Route::post('/', [CategoriesController::class, 'store'])->name('store');
            Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
            Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
            Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
        });

        Route::resource('products', 'ProductsController')->names([
            //'index' => 'admin.products.index',
            //'create' => 'admin.products.create',
        ]);

        // Route::get('/products', [ProductsController::class, 'index']);
        // Route::get('/products/create', [ProductsController::class, 'create']);
        // Route::get('/products/{id}', [ProductsController::class, 'show']);
        // Route::post('/products', [ProductsController::class, 'store']);
        // Route::delete('/products/{id}', [ProductsController::class, 'destroy']);
        // Route::get('/products/{id}/edit', [ProductsController::class, 'edit']);
        // Route::put('/products/{id}', [ProductsController::class, 'update']);

});

Route::get('products', [ProductsController::class, 'index']);
Route::get('products/{id}', [ProductsController::class, 'show'])->name('show');
Route::post('reviews', [ProductsController::class, 'review'])->name('review');

