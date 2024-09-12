<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
Route::get('/', [StudentController::class, 'index'])->name('index');
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::post('/store', [StudentController::class, 'store'])->name('store');
Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
Route::put('/{id}', [StudentController::class, 'update'])->name('update');



// Route::get('/', function () {
//     return view('edit');
// });
    