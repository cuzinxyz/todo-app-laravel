<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index'])->name('homepage');
// Route::post('/task', [TaskController::class, 'store'])->name('storeTask');

Route::post(
    '/task',
    [TaskController::class, 'store']
)->name('storeTask');

Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('editTask');
Route::put('/edit/{task}', [TaskController::class, 'update'])->name('updateTask');

Route::delete('/delete/{task}', [TaskController::class, 'destroy'])->name('destroyTask');

Route::get('/task/{type}', [TaskController::class, 'filter'])->name('filterTask');
