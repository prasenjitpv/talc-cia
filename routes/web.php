<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('ques1', [HomeController::class, 'index'])->name('ques1');
Route::get('/ques2', [HomeController::class, 'Ques2'])->name('ques2');
Route::get('/ques3', [HomeController::class, 'Ques3'])->name('ques3');
Route::get('/finalstep', [HomeController::class, 'FinalStep'])->name('finalstep');
Route::get('/thankyou', [HomeController::class, 'Thankyou'])->name('thankyou');

Route::post('/submitques', [HomeController::class, 'SubmitQues'])->name('submitques');
Route::post('/submitfinal', [HomeController::class, 'SubmitFinal'])->name('submitfinal');
