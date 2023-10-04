<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});



Route::group([
    'middleware'=>["auth"],
    'as'=>'dashboard.',
    "prefix"=>'dashboard'
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
    'middleware'=>["auth"],
    'as'=>'dashboard.',
    "prefix"=>'dashboard'
],function (){

    Route::resource("/products",ProductsController::class);

});

Route::get('dashboard',[DashboardController::class,'index']);



require __DIR__.'/auth.php';
