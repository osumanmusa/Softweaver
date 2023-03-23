<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\AdminRegController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;

  

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

  

Route::get('/', function () {

    return view('welcome');

});


/*------------------------------------------

--------------------------------------------

			Staff Routes

--------------------------------------------

--------------------------------------------*/

   
Route::get('/staff-list', [StaffController::class, 'index'])->name('staff.list');
Route::post('/staff-store', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff-show/{id}', [StaffController::class, 'show'])->name('staff.view');
Route::get('/staff-delete/{id}', [StaffController::class, 'destroy'])->name('staff.delete');
Route::post('/staff-update/{id}', [StaffController::class, 'update'])->name('staff.update');


/*------------------------------------------

--------------------------------------------

			Branch Routes

--------------------------------------------

--------------------------------------------*/

 Route::get('/branch-list', [BranchController::class, 'index'])->name('branch.list');

 /*------------------------------------------

--------------------------------------------

			Department Routes

--------------------------------------------

--------------------------------------------*/


 Route::get('/department-list', [DepartmentController::class, 'index'])->name('branch.list');
