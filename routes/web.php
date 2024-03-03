<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'AdminDestroy')->name('admin.logout');
    Route::get('/admin/view/profile', 'ViewProfile')->name('admin.view.profile');
    Route::get('/admin/edit/profile', 'EditProfile')->name('admin.edit.profile');
    Route::post('/admin/store/profile', 'StoreProfile')->name('admin.store.profile');

    Route::get('/admin/change/password', 'ChangePassword')->name('admin.change.password');
    Route::post('/admin/update/password', 'UpdatePassword')->name('admin.update.password');
});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/list/supplier', 'ListSupplier')->name('list.supplier');
    Route::get('/add/supplier', 'AddSupplier')->name('add.supplier');
    Route::post('/store/supplier', 'StoreSupplier')->name('store.supplier');
    Route::get('/edit/supplier/{id}', 'EditSupplier')->name('edit.supplier');
    Route::post('/update/supplier/{id}', 'UpdateSupplier')->name('update.supplier');
    Route::get('/show/supplier/{id}', 'ShowSupplier')->name('show.supplier');
    // Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
});

