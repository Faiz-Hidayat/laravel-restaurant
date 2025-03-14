<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/product/{slug}', function ($slug) {
    return view('product', compact('slug'));
});

Route::get('/cart', function () {
    return view('cart');
});
