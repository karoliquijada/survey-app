<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Auth/Login', [
            'canRegister' => Route::has('register'),
        ]);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/survey', [SurveyController::class,'index'])->name('survey');
    Route::get('/survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
    Route::post('/submit-answers/{survey_id}', [AnswerController::class, 'store'])->name('submit-answers');
    
    Route::get('/thankyou', function () {
        return Inertia::render('ThankYou');
    })->name('thankyou');
    
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

    //Admin routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('role:admin')->name('dashboard');
});


require __DIR__.'/auth.php';
