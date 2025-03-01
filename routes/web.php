<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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
    return view('pages.home');
});

Route::get('/about-us', function () {
    return view('pages.about');
});

Route::get('/contact-us', function () {
    return view('pages.contact');
});

Route::get('/products', function () {
    return view('pages.products');
});

// Route::get('/students', [StudentsController::class,'index'])->name('home'); 
Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentsController::class, 'index'])->name('student');
    Route::get('/add-student', [StudentsController::class, 'add'])->name('student.add');
    Route::post('/save', [StudentsController::class, 'save'])->name('student.save');
    Route::get('/{stu_id}/delete', [StudentsController::class, 'delete'])->name('student.delete');
    Route::get('/{stu_id}/edit', [StudentsController::class, 'edit'])->name('student.edit');
    Route::post('/{stu_id}/update', [StudentsController::class, 'update'])->name('student.update');
    Route::get('/{stu_id}/manage', [StudentsController::class, 'vewRecords'])->name('student.manage');
    Route::post('/saveRecord', [StudentsController::class, 'saveRecord'])->name('student.saveRecord');
});
