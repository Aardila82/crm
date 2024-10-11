<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home'); // Asegúrate de que el nombre coincide con el de tu vista.
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para el dashboard, protegida por middleware 'auth'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Grupo de rutas protegidas por 'auth' para los contactos
Route::middleware('auth')->group(function () {
    // Rutas de gestión de contactos
    Route::resource('contacts', ContactController::class);

    // Ruta para mostrar el formulario de contacto
    Route::get('/contact', [ContactController::class, 'contactForm'])->name('contact.form');

    // Ruta para procesar el formulario de contacto
    Route::post('/contact', [ContactController::class, 'storeContact'])->name('contact.store');

    // Ruta para mostrar detalles de un contacto
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
});
