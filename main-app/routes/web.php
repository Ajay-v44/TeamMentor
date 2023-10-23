<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/',  [EmployeeController::class, 'index'])->name('employee-index');
Route::get('/test', function () {
    return config('app.env');
});

//Employee Routes

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee-index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee-create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees-store');
Route::get('/employees/{id}',[EmployeeController::class,'show'])->name('employee-show');
Route::get('/employees/{id}/edit',[EmployeeController::class,'edit'])->name('employee-edit');
Route::put('/employees/{id}',[EmployeeController::class,'update'])->name('employee-update');