<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SessionController;

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

// Route::get('/', function () { return view('welcome');});
 Route::get('/',[HomeController::class, 'index'])->name("home");
 Route::get('/add/student',[StudentController::class, 'AddStudent'])->name('add-student');
 Route::post('/store',[StudentController::class,'store'])->name('store');
 Route::get('/manage/student',[StudentController::class,'manageStudent'])->name('manage-student');
 Route::get('/edit/student/{id}', [StudentController::class, 'edit'])->name('edit');
 Route::post('/update', [StudentController::class, 'updateStudent'])->name('update');
 Route::post('/remove', [StudentController::class, 'remove'])->name('remove');

 Route::resources(['departments' => DepartmentController::class]);
 Route::resources(['sessions' => SessionController::class]);

 Route::get('/dept-wise-student/{id}',[DepartmentController::class,'deptWiseStudent'])->name('dept.wise.student');
 Route::get('/session/wise/student/{id}',[SessionController::class,'sessionWiseStudent'])->name('session.wise.student');
