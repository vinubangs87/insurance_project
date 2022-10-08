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
use App\Http\Controllers\ViewUploadedFilesController;
use App\Http\Controllers\contactUsController;
use App\Http\Controllers\forntendGeneralController;

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
})->name('front.home');

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

Route::post('/get/dependent/projectName', [VehicleDetailController::class,'get_dependent_project_name'])->name('dependent.projectName');

Route::get('/insurance/amount/update/{id}', [VehicleDetailController::class,'insurance_amount_show'])->name('insurance.amount.show');

Route::post('/add/fullPaymentType', [VehicleDetailController::class,'add_fullPaymentType'])->name('add.fullPaymentType');

Route::get('/resetRecords/reset/{id}', [VehicleDetailController::class,'reset_records_based_on_paymentType'])->name('resetRecords.reset');

Route::get('/settlementPartialType/settle/{id}', [VehicleDetailController::class,'settlement_PartialType'])->name('settlementPartialType.settle');

Route::post('/add/partialPaymentType', [VehicleDetailController::class,'add_partialPaymentType'])->name('add.partialPaymentType');

Route::post('/update/insuranceAmount', [VehicleDetailController::class,'update_insuranceAmount'])->name('update.insuranceAmount');

Route::get('/settlementPartialType/reset/{paymentsettlementsDetails_id}/{vehicledetail_id}/{insurance_amount}', [VehicleDetailController::class,'reset_records_based_on_partialpaymentType'])->name('settlementPartialType.reset');

Route::post('/data/export', [VehicleDetailController::class,'data_export'])->name('data.export');


// to get uploaded files
Route::get('/file-view/{filename}/{directory}', [ViewUploadedFilesController::class,'view_store_files'])->name('file.view');
// End admin routes

// Frontend routes

Route::get('about/us' , function(){
    return view('about');
})->name('about.us');

Route::get('our/services' , function(){
    return view('services');
})->name('our.services');

Route::get('our/partner' , function(){
    return view('partners');
})->name('our.partner');

Route::get('contact/us', [contactUsController::class,'index'])->name('contact.us');
Route::post('send/contact/mail', [contactUsController::class,'send_email'])->name('send.contact.mail');


Route::post('show/vehicle/details', [forntendGeneralController::class,'vehicle_details'])->name('show.vehicle.details');

/*Route::get('contact/us' , function(){
    return view('contacts');
})->name('contact.us');*/

// End frontend routes