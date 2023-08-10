<?php

use App\Http\Controllers\admin\{DashboardController, UserController, TeamController, PlayerController};
use App\Http\Controllers\ui\{HomeController};
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [DashboardController::class, 'AuthForm'])->name('AuthForm');

    Route::post('/login', [DashboardController::class, 'AuthPost'])->name('AuthPost');

    Route::middleware('admin')->group(function () {

        Route::get('/', [DashboardController::class, 'Dashboard'])->name('Dashboard');

        Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');

        Route::get('logout', [DashboardController::class, 'AuthOut'])->name('AuthOut');

        Route::prefix('user')->name('user.')->group(function () {

            Route::get('', [UserController::class, 'index'])->name('index');

            Route::get('/detail/{id}', [UserController::class, 'show'])->name('show');

            Route::put('/detail/{id}', [UserController::class, 'update'])->name('update');

            Route::delete('/detail/{id}', [UserController::class, 'destroy'])->name('destroy');

        });

        Route::prefix('team')->name('team.')->group(function () {

            Route::get('', [TeamController::class, 'index'])->name('index');

            Route::get('/create', [TeamController::class, 'add'])->name('add');

            Route::post('/create', [TeamController::class, 'store'])->name('store');

            Route::get('/detail/{id}', [TeamController::class, 'show'])->name('show');

            Route::put('/detail/{id}', [TeamController::class, 'update'])->name('update');

            Route::delete('/detail/{id}', [TeamController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('player')->name('player.')->group(function () {

            Route::get('', [PlayerController::class, 'index'])->name('index');

            Route::get('/club/{slug}', [PlayerController::class, 'viewTeamPlayer'])->name('viewTeamPlayer');

            Route::get('/create', [PlayerController::class, 'add'])->name('add');

            Route::post('/create', [PlayerController::class, 'store'])->name('store');

            // Route::put('/{id}', [TeamController::class, 'update'])->name('update');

        });
    });
});

Route::name('ui.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/login', [HomeController::class, 'AuthForm'])->name('AuthForm');

    Route::post('/login', [HomeController::class, 'AuthPost'])->name('AuthPost');

    Route::get('logout', [HomeController::class, 'AuthOut'])->name('AuthOut');

    Route::get('/register', [HomeController::class, 'AuthRegisterForm'])->name('AuthRegisterForm');

    Route::post('/register', [HomeController::class, 'AuthRegister'])->name('AuthRegister');

});
