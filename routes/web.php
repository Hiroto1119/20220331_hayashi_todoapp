<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/create', [TodoController::class, 'create']);
Route::patch('/update', [TodoController::class, 'update'])->name('todo.update');
Route::post('/delete', [TodoController::class, 'delete'])->name('todo.delete');
