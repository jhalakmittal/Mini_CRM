<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login',[AdminController::class,'login']);
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/login',[AdminController::class,'submit_login']);
// Route::post('admin/login',[AdminController::class,'submit_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

//Comapny resource
Route::get('company/{id}/delete',[CompanyController::class,'destroy']);
Route::resource('company',CompanyController::class);
Route::post('company', [CompanyController::class, 'store'])->name('store');

//Employee resource
Route::get('employee/{id}/delete',[EmployeeController::class,'destroy']);
Route::resource('employee',EmployeeController::class);