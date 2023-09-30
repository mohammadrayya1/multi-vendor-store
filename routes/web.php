<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
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
    'as'=>'dashboard.'
],function (){

    Route::get('/categories/trash',[CategoriesController::class,'trash'])->name('categories.trash');
    Route::resource("/dashboard/categories",CategoriesController::class);
    Route::put('categories/{category}/restore',[CategoriesController::class,"restore"])->name('categories.restore');
    Route::delete('categories/{category}/forc-delete',[CategoriesController::class,"deleteforce"])->name('categories.forcedelete');
    Route::get("/dashboard/index",[CategoriesController::class,'index']);

});
require __DIR__.'/auth.php';
