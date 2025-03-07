<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('', [JobController::class, 'index'])->name('jobs.index');

    Route::middleware('guest')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register.create');
        Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

        Route::get('login', [SessionController::class, 'create'])->name('login');
        Route::post('login', [SessionController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');

        // Invokable controller: a controller that only has an __invoke method
        Route::get('search', SearchController::class)->name('search');
        Route::get('tag/{tag:name}', TagController::class)->name('tag');

        Route::delete('logout', [SessionController::class, 'destroy'])->name('logout');
    });
});
