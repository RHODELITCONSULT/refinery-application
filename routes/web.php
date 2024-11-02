<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsignorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\WaybillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
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


Route::get("/login",[AuthenticationController::class, 'loginPage'])->name('login.page')->withoutMiddleware([AuthMiddleware::class]);

Route::post("/authenticate",[AuthenticationController::class,"login"])->name("authenticate")->withoutMiddleware([AuthMiddleware::class]);

Route::middleware([AuthMiddleware::class])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/index', [DashboardController::class, 'index'])->name('index');

    Route::get('/product-list',[ProductController::class, 'index'])->name('product-list');

    Route::get('/add-product', [ProductController::class, 'create'])->name('add-product');

    Route::post('store',[ProductController::class, 'store'])->name('store-product');

    Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy-product');

    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update-product');

    Route::get('/category-list', [CategoryController::class, 'index'])->name('category-list');

    Route::post('/store-category',[CategoryController::class, 'store'])->name('store-category');

    Route::post('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');

    Route::get('/destroy-category/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');

    Route::get("consignor-list",[ConsignorController::class, 'index'])->name('consignor-list');

    Route::post("store-consignor",[ConsignorController::class, 'store'])->name('store-consignor');

    Route::post("update-consignor/{id}",[ConsignorController::class, 'update'])->name('update-consignor');

    Route::get("/destroy-consignor/{id}",[ConsignorController::class, 'destroy'])->name('destroy-consignor');

    Route::get('customers',[CustomerController::class, 'index'])->name('customers');

    Route::post('/store-customer',[CustomerController::class, 'store'])->name('store-customer');

    Route::post('/update-customer/{id}',[CustomerController::class, 'update'])->name('update-customer');

    Route::get('/destroy-customer/{id}',[CustomerController::class, 'destroy'])->name('destroy-customer');

    Route::get('meters',[MeterController::class, 'index'])->name('meters');

    Route::post('/store-meter',[MeterController::class, 'store'])->name('store-meter');

    Route::post('/update-meter/{id}',[MeterController::class, 'update'])->name('update-meter');

    Route::get('/destroy-meter/{id}',[MeterController::class, 'destroy'])->name('destroy-meter');

    Route::get('waybills',[WaybillController::class, 'index'])->name('waybills');

    Route::post('/store-waybill',[WaybillController::class, 'store'])->name('store-waybill');

    Route::post('/update-waybill/{id}',[WaybillController::class, 'update'])->name('update-waybill');

    Route::get('/destroy-waybill/{id}',[WaybillController::class, 'destroy'])->name('destroy-waybill');

    Route::get("/create-waybill",[WaybillController::class, 'create'])->name('create-waybill');

    Route::get("/edit-waybill/{id}",[WaybillController::class, 'edit'])->name('edit-waybill');

    Route::get("/show-waybill/{id}",[WaybillController::class, 'show'])->name('show-waybill');

    Route::post("/store-temperature",[TemperatureController::class, 'store'])->name('store-temperature');

    Route::get("/product-reporting", [ReportsController::class, "index"])->name("reports");

    Route::get("/customer-reporting", [ReportsController::class, "customerReportIndex"])->name("reports-customer");

    Route::get("/custom-filter-reporting", [ReportsController::class, "customReportFilter"])->name("reports-custom-filter");

    Route::post("/filter-waybills", [ReportsController::class, "filterWaybills"])->name("waybills-filter");

    Route::get("/profile",[ProfileController::class,"profilePage"])->name("profile.name");

    Route::post("/profile/update",[ProfileController::class,"profileUpdate"])->name("profile-update");

    Route::post("/change-password",[ProfileController::class,"updatePassword"])->name("change-password");

    Route::get("/users",[UserController::class,"index"])->name("users");

    Route::post("users/add",[UserController::class,"addUser"])->name("add-user");

    Route::post("users/edit/{id}",[UserController::class,"editUser"])->name("edit-user");

    Route::get("users/delete/{id}",[UserController::class,"deleteUser"])->name("delete-user");

    Route::post("users/change-status/{id}",[UserController::class,"changeStatus"])->name("change-status");

    Route::post("logout",[AuthenticationController::class,"logout"])->name("logout");
});
