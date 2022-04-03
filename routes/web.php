<?php

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

Route::get('/', function () {
    
    $paidAt = \Carbon\Carbon::create(2022, 3, 27, 12, 0, 0);
    $now = \Carbon\Carbon::now();

    dd($paidAt->diffInMonths($now));
});
