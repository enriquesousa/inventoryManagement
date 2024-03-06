<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;


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
    Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/list/customer', 'ListCustomer')->name('list.customer');
    Route::get('/add/customer', 'AddCustomer')->name('add.customer');
    Route::post('/store/customer', 'StoreCustomer')->name('store.customer');
    Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');
    Route::post('/update/customer', 'UpdateCustomer')->name('update.customer');
    Route::get('/show/customer/{id}', 'ShowCustomer')->name('show.customer');
    Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');
});

Route::controller(UnitController::class)->group(function () {
    Route::get('/list/unit', 'ListUnit')->name('list.unit');
    Route::get('/add/unit', 'AddUnit')->name('add.unit');
    Route::post('/store/unit', 'StoreUnit')->name('store.unit');
    Route::get('/edit/unit/{id}', 'EditUnit')->name('edit.unit');
    Route::post('/update/unit/{id}', 'UpdateUnit')->name('update.unit');
    // Route::get('/show/unit/{id}', 'ShowUnit')->name('show.unit');
    Route::get('/delete/unit/{id}', 'DeleteUnit')->name('delete.unit');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/list/category', 'ListCategory')->name('list.category');
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
    Route::post('/update/category/{id}', 'UpdateCategory')->name('update.category');
    // Route::get('/show/category/{id}', 'ShowCategory')->name('show.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/list/product', 'ListProduct')->name('list.product');
    Route::get('/add/product', 'AddProduct')->name('add.product');
    Route::post('/store/product', 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
    Route::post('/update/product', 'UpdateProduct')->name('update.product');
    // Route::get('/show/product/{id}', 'ShowProduct')->name('show.product');
    Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
});

Route::controller(PurchaseController::class)->group(function () {
    Route::get('/list/purchase', 'ListPurchase')->name('list.purchase');
    Route::get('/add/purchase', 'AddPurchase')->name('add.purchase');
    // Route::post('/store/purchase', 'StorePurchase')->name('store.purchase');
    // Route::get('/edit/purchase/{id}', 'EditPurchase')->name('edit.purchase');
    // Route::post('/update/purchase/{id}', 'UpdatePurchase')->name('update.purchase');
    // Route::get('/show/purchase/{id}', 'ShowPurchase')->name('show.purchase');
    // Route::get('/delete/purchase/{id}', 'DeletePurchase')->name('delete.purchase');
});





