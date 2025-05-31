<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataTablesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [DataTablesController::class, 'index'])->name('users.index');
Route::get('users/{id}', [DataTablesController::class, 'show']);
Route::post('users', [DataTablesController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [DataTablesController::class, 'edit']);
Route::delete('users/{id}', [DataTablesController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
