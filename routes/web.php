<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/download-excel', [DashboardController::class, 'downloadExcel'])->middleware('auth');

Route::post('/dashboard/approve', [ViewController::class, 'first_approve'])->middleware('auth');
Route::get('/dashboard/action', [ViewController::class, 'index'])->middleware('auth')->name('dashboard.action');


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard/statistik', [DashboardController::class, 'statistik']);
    Route::get('/dashboard/order', [OrderController::class, 'order']);
    Route::post('/dashboard/order', [OrderController::class, 'order']);
    Route::post('/dashboard/store', [OrderController::class, 'store']);
});
