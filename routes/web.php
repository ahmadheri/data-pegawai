<?php

use App\Http\Controllers\Admin\EmployeeController;
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

Route::get('/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
Route::get('/employee', [EmployeeController::class, 'index'])->name('admin.employee.index');
Route::post('/employee', [EmployeeController::class, 'store'])->name('admin.employee.store');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('admin.employee.show');
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('admin.employee.update');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);

