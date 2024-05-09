<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    return User::all();
});

Route::get('/users/{id}', function ($id) {
    return User::find($id);
});

