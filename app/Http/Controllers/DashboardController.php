<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $temperature = TemperatureController::getTemperature();
        return view('index', ['temperature' => $temperature]);
    }
}
