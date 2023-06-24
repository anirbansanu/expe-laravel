<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::name('users.')->prefix('users')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('subcategories', SubCategoryController::class)->except('index');
        Route::get('/subcategories/index/{category?}',[SubCategoryController::class,'index'])->name('subcategories.index');
    });

});
