<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\HomeController;
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


Route::get('/welcome', 'HomeController@index');

Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/products/{category}/{name?}', [ProductsController::class, 'show'])->name('products.show');

Route::match(['post', 'put', 'get'], '/products-create', function() {
    return 'Create Product';
});

Route::view('/hello', 'welcome', [
    'title' => 'Welcome',
]);

Route::redirect('/home', '/');


Route::get('/admin/categories', [CategoriesController::class, 'index']);
Route::get('/admin/categories/create', [CategoriesController::class, 'create']);
Route::get('/admin/categories/{id}', [CategoriesController::class, 'show']);
Route::post('/admin/categories', [CategoriesController::class, 'store']);
Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy']);
Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/admin/categories/{id}', [CategoriesController::class, 'update']);

