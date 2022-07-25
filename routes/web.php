<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\insuranceCompanyController;
use App\Http\Controllers\Admin\ProductNameController;
use App\Http\Controllers\Admin\EngineTypeController;
use App\Http\Controllers\Admin\PermitTypeController;
use App\Http\Controllers\Admin\VechileStatusController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\FinanceCompanyController;
use App\Http\Controllers\Admin\VehicleDetailController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
//Master routes
Route::resource('/insurancecompany', insuranceCompanyController::class);
Route::get('/insurancedelete/{id}', [insuranceCompanyController::class,'destroy'])->name('insurancecompany.delete');

Route::resource('/enginetype', EngineTypeController::class);
Route::get('/enginetypedelete/{id}', [EngineTypeController::class,'destroy'])->name('enginetype.delete');

Route::resource('/permittype', PermitTypeController::class);
Route::get('/permittypedelete/{id}', [PermitTypeController::class,'destroy'])->name('permittype.delete');

Route::resource('/vechilestatus', VechileStatusController::class);
Route::get('/vechilestatusdelete/{id}', [VechileStatusController::class,'destroy'])->name('vechilestatus.delete');

Route::resource('/producttype', ProductTypeController::class);
Route::get('/producttypedelete/{id}', [ProductTypeController::class,'destroy'])->name('producttype.delete');

Route::resource('/procuctname', ProductNameController::class);
Route::get('/procuctnamedelete/{id}', [ProductNameController::class,'destroy'])->name('procuctname.delete');

Route::resource('/financecompany', FinanceCompanyController::class);
Route::get('/financecompanydelete/{id}', [FinanceCompanyController::class,'destroy'])->name('financecompany.delete');
//End master routes

Route::resource('/vehicledetails', VehicleDetailController::class);
Route::get('/vehicle/details', [VehicleDetailController::class,'vehiclerecords'])->name('vehicledetails.vehiclerecords');
// End admin routes