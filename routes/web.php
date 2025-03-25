<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get("/home", function () {
    return view('web.homepage');
});
Route::get("/product", function () {
    return view('web.product');
});

Route::get("/products/{slug}", function () {
    return "Halaman Single Produk: " ;
});

Route::get("/categories", function () {
    return view('web.categories');
});

Route::get("/categories/{slug}", function () {
    return "Halaman Single Kategori: " ;
});

Route::get("/cart", function () {
    return "Ini adalah halaman keranjang belanja";
});

Route::get("/checkout", function () {
    return "Halaman Checkout";
});


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

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
