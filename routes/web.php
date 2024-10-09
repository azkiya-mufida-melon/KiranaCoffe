<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/menus', \App\Http\Controllers\MenuController::class)->parameters([
    'menus' => 'id_menu'
]);

Route::resource('biodatas', BiodataController::class);

