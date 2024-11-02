<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/waybills-per-month",[ApiController::class,'getWaybillsPerMonth']);
Route::get("/waybills-per-product",[ApiController::class,'getWaybillsPerProduct']);
