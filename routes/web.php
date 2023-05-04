<?php

use App\Core\Telegram\Handle;
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

Route::get('/', function () {
    return require_once public_path("telegram-templates/php/function.php");
});

Route::get('/handle', function (){
    dd((new Handle(public_path('main.json')))->build());
});
