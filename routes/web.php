<?php

use App\Http\Controllers\questions\QuestionController;
use App\Http\Controllers\students\StudentController;

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
})->name('accueil');

Route::get('/student', [QuestionController::class, 'index'])->name('start.question');
Route::post('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/result', [StudentController::class, 'score'])->name('student.score');
Route::get('/student/questions/{name}', [QuestionController::class, 'show'])->name('show.question');
Route::post('/admin/question/create', [QuestionController::class, 'store'])->name('question.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/resultats', [StudentController::class, 'index'])->name('students.list');
