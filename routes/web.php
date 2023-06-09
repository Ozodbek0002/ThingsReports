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
    DepartmentController,
    RoomController,
    RoleController,
    SearchController,
    ReportController,
};


Route::get('/', function () {
    return view('auth/login');
});


Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('departments', DepartmentController::class)->name('index', 'departments');
    Route::resource('roles', RoleController::class)->name('index', 'roles');
    Route::resource('users', UserController::class)->name('index', 'users');
    Route::resource('products', ProductController::class)->name('index', 'products');
    Route::resource('transactions', HistoryController::class)->name('index', 'transactions');
    Route::resource('categories', CategoryController::class)->name('index', 'categories');
    Route::resource('units', UnitController::class)->name('index', 'units');
    Route::resource('rooms', RoomController::class)->name('index', 'rooms');

    Route::get('department-user/{id}', [AjaxController::class, 'departmentUser'])->name('department-user');
    Route::get('user-rooms/{id}', [AjaxController::class, 'userRooms'])->name('user-rooms');
    Route::get('room-products/{id}', [AjaxController::class, 'roomProducts'])->name('room-products');

    Route::post('SearchHistory', [SearchController::class, 'SearchHistory'])->name('SearchHistory');
    Route::post('SearchHistories', [SearchController::class, 'SearchHistories'])->name('SearchHistories');
    Route::post('SearchProduct', [SearchController::class, 'SearchProduct'])->name('SearchProduct');
    Route::Post('SearchProducts', [SearchController::class, 'SearchProducts'])->name('SearchProducts');
    Route::Post('SearchRooms', [SearchController::class, 'SearchRooms'])->name('SearchRooms');
    Route::Post('SearchUsers', [SearchController::class, 'SearchUsers'])->name('SearchUsers');
    Route::get('ShowUserProducts/{id}', [SearchController::class, 'ShowUserProducts'])->name('ShowUserProducts');
    Route::get('ReportHistory/{from_date}&{to_date}', [ReportController::class, 'ReportHistory'])->name('ReportHistory');
    Route::get('ReportProduct/{from_date}&{to_date}', [ReportController::class, 'ReportProduct'])->name('ReportProduct');
//    Route::post('HistoriesDatatable',[AjaxController::class,'HistoriesDatatable'])->name('HistoriesDatatable');

});


require __DIR__ . '/auth.php';
