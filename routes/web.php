<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

// Auth Routes
Route::get('/', [AuthController::class, 'showRegisterForm'])->name('Register.form');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('Login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');
    
    // User specific routes
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

    // Permission specific routes
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    // Role specific routes
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permission', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permission', [RoleController::class, 'updatePermissionToRole']);
});

// Logout route accessible without authentication
Route::get('/logout', [PageController::class, 'logout'])->name('logout');
