<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    ProductController,
    CategoryController,
    UnitController,
    HistoryController,
    AjaxController,
    ProfileController,
    DepartmentController,
    RoomController
};



Route::get('/', function () {
    return view('auth/login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class)->name('index', 'users');
    Route::resource('products', ProductController::class)->name('index', 'products');
    Route::resource('transactions', HistoryController::class)->name('index', 'transactions');
    Route::resource('categories', CategoryController::class)->name('index', 'categories');
    Route::resource('units', UnitController::class)->name('index', 'units');
    Route::resource('departments', DepartmentController::class)->name('index', 'departments');
    Route::resource('rooms', RoomController::class)->name('index', 'rooms');

    Route::get('department-user/{id}', [AjaxController::class, 'departmentUser'])->name('department-user');
    Route::get('user-rooms/{id}', [AjaxController::class, 'userRooms'])->name('user-rooms');
Route::get('room-products/{id}', [AjaxController::class, 'roomProducts'])->name('room-products');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
