<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Middleware\CheckTypeUser;
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

Route::get('/home',[HomeController::class,'index'])->name("home");


Route::get('/home/products',[ProductController::class,'index'])->name("home.products.index");


Route::get('/home/products/{product:slug}',[ProductController::class,'show'])->name("home.products.show");

Route::resource('/carts',CartController::class);



Route::get('checkout',[CheckoutController::class,'create'])->name('create');
Route::post('checkout',[CheckoutController::class,'store']);


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});



Route::group([
    'middleware'=>["auth:admin"],
    'as'=>'dashboard.',
    "prefix"=>'admin/dashboard'
],function (){

    Route::get('/categories/trash',[CategoriesController::class,'trash'])->name('categories.trash');
    Route::resource("/categories",CategoriesController::class);
    Route::put('categories/{category}/restore',[CategoriesController::class,"restore"])->name('categories.restore');
    Route::delete('categories/{category}/forc-delete',[CategoriesController::class,"deleteforce"])->name('categories.forcedelete');
    Route::get("/index",[CategoriesController::class,'index']);
    Route::get("/profile",[ProfileController::class,'edit'])->name('profiles.edit');
    Route::patch("/profile",[ProfileController::class,'update'])->name('profiles.update');

});


Route::group([
    'middleware'=>["auth:admin"],
    'as'=>'dashboard.',
    "prefix"=>'admin/dashboard'
],function (){

    Route::resource("/products",ProductsController::class);

});

Route::get('dashboard',[DashboardController::class,'index']);



//require __DIR__.'/auth.php';
