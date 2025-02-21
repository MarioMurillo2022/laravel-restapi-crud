<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Auth::routes();


// Ruta por defecto: Login
Route::get('/', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta de registro
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas para la gestión de estudiantes
    Route::get('/students/show', [StudentController::class, 'showStudent'])->name('students.show');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/create', [StudentController::class, 'showCreateForm'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/update/{id}', [StudentController::class, 'showUpdateForm'])->name('students.updateForm');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

    // Rutas para la edición de perfil
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

    // Rutas para la gestión de usuarios (editar perfil, etc.)
    // Route::get('users/profile', [UserController::class, 'showProfile'])->name('users.profile');
    // Route::put('users/{id}', [UserController::class, 'updateProfile'])->name('users.updateProfile');

});
