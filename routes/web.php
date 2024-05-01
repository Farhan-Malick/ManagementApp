<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeAccountsController;
use App\Http\Controllers\GoogleController;


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
    return view('auth.login');
});
Route::get('/taskUpload', [TaskController::class, 'index'])->name('taskUpload');
Route::post('save-task', [TaskController::class, 'saveTask'])->name('save.task');
Route::get('/taskDetail', [TaskController::class, 'taskDetail'])->name('taskDetail');

Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// Google Start
Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
});

Route::any('login/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
// Google End

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Home Accounts Management Routes
Route::get('/HomeAccounts', [HomeAccountsController::class, 'HomeAccounts']);
Route::get('/HomeAccountsInDetail', [HomeAccountsController::class, 'index']);


use App\Http\Controllers\ClientController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExpenseController;

Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
Route::get('/home-accounts',  [HomeAccountsController::class, 'HomeAccounts'])->name('home-accounts');
