<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/menus', \App\Http\Controllers\MenuController::class)->parameters([
    'menus' => 'id_menu'
]);


Route::get('/menus/{id_menu}', [MenuController::class, 'show'])->name('menus.show');

