<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\shopController;
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




Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/dashboard',[HomeController::class,'dashboard'])->middleware('isAdmin')->name('admin.dashboard');

Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login',[AuthController::class,'authenticate'])->name('auth.authenticate');

Route::get('/register', [AuthController::class,'register'])->name('auth.register');

Route::post('/register', [AuthController::class,'store'])->name('auth.store');

Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout');
Route::get('/categories',[CategoryController::class, 'index'])->name('categories.index');
Route::get('/create',[CategoryController::class,'create'])->name('categories.create');

Route::post('/store',[CategoryController::class, 'store'])->name('categories.store');

Route::delete('/categories/{category}',[CategoryController::class, 'destroy'])->name('categories.destroy');
Route::patch('/categories/{category}', [CategoryController::class, 'update'])->middleware('isAdmin')->name('categories.update');

Route::resource('products',productController::class);
Route::resource('shops',shopController::class);

Route::get('/categories',[shopController::class,'getCategories'])->name('categories.index');
Route::get('/categories/{category}/products',[shopController::class,'getProductsByCategory'])->name('categories.products');
Route::get('/search',[shopController::class,'searchProductByName'])->name('products.search');
Route::get('product/{id}', [ShopController::class, 'show'])->name('product.show');
