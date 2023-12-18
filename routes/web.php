<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers;



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
    //return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
//Routes for subjects.
    Route::get('/subjects',[App\Http\Controllers\SubjectC::class, 'list'])->name('subjects');
    Route::get('create-subject',[App\Http\Controllers\SubjectC::class, 'create'])->name('create-subject');
    Route::post('store-subject',[App\Http\Controllers\SubjectC::class, 'store']);
    Route::get('edit-subject/{id}',[App\Http\Controllers\SubjectC::class, 'edit']);
    Route::post('update-subject/{id}',[App\Http\Controllers\SubjectC::class, 'update']);
    Route::get('delete-subject/{id}',[App\Http\Controllers\SubjectC::class, 'delete']);

//Routes for subjects.
    Route::get('/students/{id}',[App\Http\Controllers\StudentC::class, 'list'])->name('students');
    Route::get('create-student/{id}',[App\Http\Controllers\StudentC::class, 'create'])->name('create-student');
    Route::post('store-student',[App\Http\Controllers\StudentC::class, 'store']);

//Routes for quizzes. 
    Route::get('/quizzes/{id}',[App\Http\Controllers\StudentC::class, 'Quizlist'])->name('quizzes');
    Route::get('create-quiz/{id}',[App\Http\Controllers\StudentC::class, 'Quizcreate'])->name('create-quiz');
    Route::post('store-quiz',[App\Http\Controllers\StudentC::class, 'Quizstore']);

//Routes for questions.
    Route::get('/questions/{id}/{key}',[App\Http\Controllers\QuestionC::class, 'list'])->name('questions');
    Route::get('create-question/{id}/{key}',[App\Http\Controllers\QuestionC::class, 'create'])->name('create-question');
    Route::post('store-question',[App\Http\Controllers\QuestionC::class, 'store']);
//route for students (subjects)
    Route::get('/student/subjects',[App\Http\Controllers\SubjectC::class, 'studentList'])->name('subjects');
//route for students (quizzes)
    Route::get('/student/quizzes/{id}',[App\Http\Controllers\StudentC::class, 'StuQuizlist'])->name('quizzes'); 

    Route::get('/start-quiz/{id}/{key}',[App\Http\Controllers\QuestionC::class, 'startQuiz'])->name('start-quiz');

    Route::get('/start-quiz/{id}/{key}/{next}',[App\Http\Controllers\QuestionC::class, 'startQuiz'])->name('start-quiz');
    Route::post('store-student-quiz',[App\Http\Controllers\QuestionC::class, 'storeStudentQuiz']);

    Route::get('/show-score/{id}',[App\Http\Controllers\StudentC::class, 'showScore'])->name('show-score');
    

    

    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
