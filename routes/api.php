<?php

use App\Rest\Controllers\AcountController;
use App\Rest\Controllers\EntryController;
use App\Rest\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use \Lomkit\Rest\Facades\Rest;

Route::middleware(['auth:api'])->group(function () {
    Rest::resource('users', \App\Rest\Controllers\UsersController::class);
    Rest::resource('acounts', \App\Rest\Controllers\AcountController::class);
    Rest::resource('entries', \App\Rest\Controllers\EntryController::class);
    Rest::resource('expenses', \App\Rest\Controllers\ExpenseController::class);
    Rest::resource('levies', \App\Rest\Controllers\LevyController::class);
    Rest::resource('necessaryExpenses', \App\Rest\Controllers\NecessaryExpenseController::class);
});

Route::post('login', [\App\Http\Controllers\Auth::class, 'login']);
