<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;



Route::get('/', function () {
    return view('auth/login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class)->name('index', 'users');
    Route::resource('products',ProductController::class)->name('index','products');
    Route::resource('transactions',TransactionController::class)->name('index','transactions');
    Route::resource('categories',CategoryController::class)->name('index','categories');
    Route::resource('units',UnitController::class)->name('index','units');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
