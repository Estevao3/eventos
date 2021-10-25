<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
//Route::get('/', 'EventController@index')->name('index');
Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('/events/create', [EventController::class, 'create'])->name('create')->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('show');
Route::post('/events', [EventController::class, 'store'])->name('store');
Route::delete('/events/{id}',[EventController::class, 'destroy'])->name('destroy')->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->name('update')->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->name('joinEvent')->middleware('auth');

Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::delete('/events/leave/{id}', [EventController::class, 'leave'])->name('leave')->middleware('auth');


