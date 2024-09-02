<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('admin/dashboard', function () {
    return view('dashboard');
});

Route::get('admin/pages', function () {
    return view('pages.crud');
});

Route::post('admin/addUsers', [CrudController::class, 'addUsers']);
Route::get('admin/pages', [CrudController::class, 'listUsers']);
Route::delete('admin/delete/{id}', [CrudController::class, 'deleteUser'])->name('admin.delete');