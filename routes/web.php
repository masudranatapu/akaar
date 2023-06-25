<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/customer-list', [HomeController::class, 'c_list'])->name('c_list');
Route::post('/customer-store', [HomeController::class, 'store'])->name('customer.store');
Route::post('/customer-edit', [HomeController::class, 'edit'])->name('customer.edit');
Route::post('/customer-update/{id}', [HomeController::class, 'update'])->name('customer.update');
Route::get('/customer-delete/{id}', [HomeController::class, 'delete'])->name('customer.delete');
Route::post('/customer-filter/', [HomeController::class, 'c_filter'])->name('customer.filter');
