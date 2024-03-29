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
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\RoleController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/inicio', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('inicio');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Todas las rutas de administrador protegidas con el middleware auth
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
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
        Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
        Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');
        route::get('/edit/customer/invoice/{invoice_id}', 'EditCustomerInvoice')->name('edit.customer.invoice');
        route::post('/customer/update/invoice/{invoice_id}', 'UpdateCustomerInvoice')->name('customer.update.invoice');
        route::get('/customer/invoice/details/pdf/{invoice_id}', 'CustomerInvoiceDetailsPdf')->name('customer.invoice.details.pdf');
        route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
        route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');
        route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
        route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
        route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
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
        Route::get('/list/product/category', 'ListProductCategory')->name('list.product.category');
        Route::get('/list/product/supplier', 'ListProductSupplier')->name('list.product.supplier');
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
        Route::post('/store/purchase', 'StorePurchase')->name('store.purchase');
        Route::get('/delete/purchase/{id}', 'DeletePurchase')->name('delete.purchase');
        Route::get('/pending/purchase', 'PendingPurchase')->name('pending.purchase');
        Route::get('/approved/purchase/{id}', 'ApprovedPurchase')->name('approve.purchase');
        Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
    });
    
    // DefaultController - Para las rutas Ajax
    Route::controller(DefaultController::class)->group(function () {
        Route::get('/get-category', 'GetCategory')->name('get-category');
        Route::get('/get-product', 'GetProduct')->name('get-product');
        Route::get('/get-product-category', 'GetProductCategory')->name('get-product-category');
        Route::get('/check-product-stock', 'GetProductStock')->name('check-product-stock');
    }); 
    
    
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/todas/invoice', 'TodasInvoice')->name('todas.invoice');
        Route::get('/list/invoice', 'ListInvoice')->name('list.invoice');
        Route::get('/add/invoice', 'AddInvoice')->name('add.invoice');
        Route::post('/store/invoice', 'StoreInvoice')->name('store.invoice');
        Route::get('/pending/list/invoice', 'PendingListInvoice')->name('pending.list.invoice');
        Route::get('/delete/invoice/{id}', 'DeleteInvoice')->name('delete.invoice');
        Route::get('/approved/invoice/{id}', 'ApprovedInvoice')->name('approve.invoice');
        Route::post('/store/approved/invoice/{id}', 'StoreApprovedInvoice')->name('store.approved.invoice');
        Route::get('/print/list/invoice', 'PrintListInvoice')->name('print.list.invoice');
        Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');
        Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
        Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');
        Route::get('/por/mes/invoice', 'PorMesInvoice')->name('por.mes.invoice');
        Route::get('/facturas/por/mes', 'FacturasPorMes')->name('facturas.por.mes');
    });


    Route::controller(StockController::class)->group(function () {
        Route::get('/stock/report', 'StockReport')->name('stock.report');
        Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');
        Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise');
        Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
        Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');
       
    });



    // Roles y Permisos
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
    });


});



