<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
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
// VIEW
Route::view('/dashboard', 'dashboard.layouts.main');

// GET
Route::get('/dashboard/reports', [BookController::class, 'reports']);

// RESOURCES
Route::resources([
    '/dashboard/books' => BookController::class,
    '/dashboard/publishers' => PublisherController::class
]);
