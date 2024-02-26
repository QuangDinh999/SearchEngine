<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['accountMiddleware'])->get('/', function (){
    return view('welcome');
});


    Route::get('/search', [\App\Http\Controllers\PersonController::class, 'index'])->name('person.search');
Route::post('/save-search', [\App\Http\Controllers\PersonController::class, 'index'])->name('search.save');
Route::get('/search/{id}', [\App\Http\Controllers\NewSearchController::class, 'searchById'])->name('search.byId');

Route::get('/history', [\App\Http\Controllers\HistoryChatController::class, 'index'])->name('history.search');
Route::get('/del_session', [\App\Http\Controllers\HistoryChatController::class, 'destroy'])->name('history.destroy');

Route::get('/login-account', [\App\Http\Controllers\AccountController::class, 'login'])-> name('account.login');
Route::post('/login-account', [\App\Http\Controllers\AccountController::class, 'loginProcess'])-> name('account.loginProcess');
Route::get('/logout-account', [\App\Http\Controllers\AccountController::class, 'logout'])-> name('account.logout');

