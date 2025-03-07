<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register.create');
        Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

        Route::get('login', [SessionController::class, 'create'])->name('login');
        Route::post('login', [SessionController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('', [JobController::class, 'index'])->name('jobs.index');

        // Invokable controller: a controller that only has an __invoke method
        Route::get('search', SearchController::class)->name('search');

        Route::delete('logout', [SessionController::class, 'destroy'])->name('logout.destroy');
    });
});
