<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BankEmployeesController;
use App\Http\Controllers\BankClientsController;
use App\Http\Controllers\IssuedCardsController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Http\Request;

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

Route::get('/authentication/login',[AuthenticationController::class,'login']) -> name('authentication.login');
Route::get('/authentication/logout',[AuthenticationController::class,'logout']) -> name('authentication.logout');
Route::post('/authentication/login',[AuthenticationController::class,'loginConfirm']) -> name('authentication.loginConfirm');
Route::get('/bankemployees/create',[BankEmployeesController::class,'create']) -> name('bankemployees.create') -> middleware('custom.auth');
Route::post('/bankemployees/create',[BankEmployeesController::class,'createConfirm']) -> name('bankemployees.createConfirm');
Route::get('/bankemployees/index',[BankEmployeesController::class,'index']) -> name('bankemployees.index') -> middleware('custom.auth');
Route::get('/bankemployees/edit/{id}',[BankEmployeesController::class,'edit']) -> name('bankemployees.edit/{id}') -> middleware('custom.auth');
Route::post('/bankemployees/edit',[BankEmployeesController::class,'editConfirm']) -> name('bankemployees.editConfirm');
Route::get('/bankemployees/delete/{id}',[BankEmployeesController::class,'delete']) -> name('bankemployees.delete/{id}') -> middleware('custom.auth');
Route::post('/bankemployees/delete',[BankEmployeesController::class,'deleteConfirm']) -> name('bankemployees.deleteConfirm');
Route::get('/bankclients/create',[BankClientsController::class,'create']) -> name('bankclients.create') -> middleware('custom.auth');
Route::post('/bankclients/create',[BankClientsController::class,'createConfirm']) -> name('bankclients.createConfirm');
Route::get('/',[BankClientsController::class,'index']) -> name('bankclients.index') -> middleware('custom.auth');
Route::get('/bankclients/index',[BankClientsController::class,'index']) -> name('bankclients.index') -> middleware('custom.auth');
Route::get('/bankclients/edit/{id}',[BankClientsController::class,'edit']) -> name('bankclients.edit/{id}') -> middleware('custom.auth');
Route::post('/bankclients/edit',[BankClientsController::class,'editConfirm']) -> name('bankclients.editConfirm');
Route::get('/bankclients/delete/{id}',[BankClientsController::class,'delete']) -> name('bankclients.delete/{id}') -> middleware('custom.auth');
Route::post('/bankclients/delete',[BankClientsController::class,'deleteConfirm']) -> name('bankclients.deleteConfirm');
Route::get('/issuedcards/create/{id}',[IssuedCardsController::class,'createCardByClient']) -> name('issuedcards.create/{id}') -> middleware('custom.auth');
Route::post('/issuedcards/create',[IssuedCardsController::class,'createConfirm']) -> name('issuedcards.createConfirm');
Route::get('/issuedcards/index',[IssuedCardsController::class,'index']) -> name('issuedcards.index') -> middleware('custom.auth');
Route::get('/issuedcards/delete/{id}',[IssuedCardsController::class,'delete']) -> name('issuedcards.delete/{id}') -> middleware('custom.auth');
Route::post('/issuedcards/delete',[IssuedCardsController::class,'deleteConfirm']) -> name('issuedcards.deleteConfirm');
Route::get('/transactions/create/{id}',[TransactionsController::class,'createTransaction']) -> name('transactions.create/{id}') -> middleware('custom.auth');
Route::post('/transactions/create',[TransactionsController::class,'executeTransaction']) -> name('transactions.executeTransaction');
Route::get('/transactions/index',[TransactionsController::class,'index']) -> name('transactions.index') -> middleware('custom.auth');

?>