<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get("/home", function () {
    return "Selamat datang di e-commerce kami";
});
Route::get("/product", function () {
    return "Halaman Produk";
});

Route::get("/products/{id}", function ($id) {
    return "Detail Produk dengan ID: " . $id;
});

Route::get("/cart", function () {
    return "Ini adalah halaman keranjang belanja";
});

Route::get("/checkout", function () {
    return "Halaman Checkout";
});
Route::get("/user", function () {
    return "Halaman Profil e-commerce";
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
