<?php

use App\Http\Controllers\AbsenceReportController;
use App\Http\Controllers\BowelMovementController;
use App\Http\Controllers\ChildController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodChildController;
use App\Http\Controllers\AttendanceRecordController;
use App\Http\Controllers\parentchildcontroller;
use App\Models\BowelMovement;
use App\Models\FoodCildRecord;
use App\Http\Controllers\webController;
use App\Http\Controllers\topcontroller;
use App\Http\Controllers\TransportRecordController;
use App\Models\TransportRecord;
use App\Http\Controllers\parentlogincontroller;
use App\Http\Controllers\parentregistercontroller;
use App\Http\Controllers\parenttopcontroller;
use App\Http\Controllers\ParentattendController;



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
});

Route::get('/', [webController::class, 'index']);

Route::get('/home', 'HomeController@index')->name('home');




Auth::routes();
Route::get('child', [ChildController::class, 'index'])->name('child.index');
Route::get('child/create', [ChildController::class, 'create'])->name('child.create');
Route::post('child.store', [ChildController::class, 'store'])->name('child.store');
Route::get('child/edit/{id}', [ChildController::class, 'edit'])->name('child.edit');
Route::post('child/update/{id}', [ChildController::class, 'update'])->name('child.update');
Route::delete('child/destroy/{id}', [ChildController::class, 'destroy'])->name('child.destroy');

Route::get('food/index',[FoodChildController::class,'index'])->name('food.index');
Route::get('food/create/', [FoodChildController::class, 'create'])->name('food.create');
Route::post('food/store', [FoodChildController::class, 'store'])->name('food.store');
Route::get('food/edit/{id}', [FoodChildController::class, 'edit'])->name('food.edit');
Route::post('food/update/{id}', [FoodChildController::class, 'update'])->name('food.update');
Route::delete('food/destroy/{id}', [FoodChildController::class, 'destroy'])->name('food.destroy');

Route::get('bowel/index', [BowelMovementController::class, 'index'])->name('bowel.index');
Route::get('bowel/create', [BowelMovementController::class, 'create'])->name('bowel.create');
Route::post('bowel/store', [BowelMovementController::class, 'store'])->name('bowel.store');
Route::get('bowel/edit/{id}', [BowelMovementController::class, 'edit'])->name('bowel.edit');
Route::post('bowel/update/{id}',[BowelMovementController::class, 'update'])->name('bowel.update');
Route::get('bowel/destroy/{id}', [BowelMovementController::class, 'destroy'])->name('bowel.destroy');

Route::get('attend/index', [AttendanceRecordController::class, 'index'])->name('attend.index');
Route::get('attend/create', [AttendanceRecordController::class, 'create'])->name('attend.create');
Route::post('attend/store', [AttendanceRecordController::class, 'store'])->name('attend.store');
Route::get('attend/edit/{id}', [AttendanceRecordController::class, 'edit'])->name('attend.edit');
Route::post('attend/update/{id}', [AttendanceRecordController::class, 'update'])->name('attend.update');
Route::delete('attend/destroy/{id}', [AttendanceRecordController::class, 'destroy'])->name('attend.destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('trans/index', [TransportRecordController::class, 'index'])->name('trans.index');
Route::get('trans/create', [TransportRecordController::class, 'create'])->name('trans.create');
Route::post('trans/store', [TransportRecordController::class, 'store'])->name('trans.store');
Route::get('trans/edit/{id}', [TransportRecordController::class, 'edit'])->name('trans.edit');
Route::post('trans/update/{id}', [TransportRecordController::class, 'update'])->name('trans.update');
Route::get('trans/destroy/{id}', [TransportRecordController::class, 'destroy'])->name('trans.destroy');


Route::get('parents/login', [parentlogincontroller::class, 'index'])->name('parents.login');
Route::get('parents/register', [parentregistercontroller::class, 'index'])->name('parents.register');
Route::get('parents/top', [parenttopcontroller::class, 'index'])->name('parents.top');
Route::get('parents/create', [parentchildcontroller::class, 'create'])->name('parents.create');
Route::post('parents/index', [parentchildcontroller::class, 'index'])->name('parents.index');


Route::get('absence/index', [AbsenceReportController::class, 'index'])->name('absence.index');
Route::get('absence/create', [AbsenceReportController::class, 'create'])->name('absence.create');
Route::post('absence/store', [AbsenceReportController::class, 'store'])->name('absence.store');
Route::get('absence/edit/{id}', [AbsenceReportController::class, 'edit'])->name('absence.edit');
Route::get('absence/destroy/{id}', [AbsenceReportController::class, 'destroy'])->name('absence.destroy');