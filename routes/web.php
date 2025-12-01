<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

// Redirection de la racine vers dashboard
Route::get('/', function () {
    return redirect()->route('auth');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/', function () {
    return redirect()->route('auth');
});

// Auth page unique
Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Dashboard et produits protégés par auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $totalProducts = Product::count();
        $lastProduct = Product::latest()->first();
        $products = Product::latest()->paginate(6);

        return view('dashboard', compact('totalProducts', 'lastProduct', 'products'));
    })->name('dashboard');

    Route::resource('products', ProductController::class);
});
require __DIR__.'/auth.php';