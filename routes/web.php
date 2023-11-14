<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\UnitController;

// Route::get('/', function () {
//     return view('frontend.index');
// });


// Route::controller(DemoController::class)->group(function () {
// Route::get('/', 'HomeMain')->name('home');


//     Route::get('/about', 'Index')->name('about.page')->middleware('check');
//     Route::get('/contact', 'ContactMethod')->name('cotact.page');
// });


// Admin All Route 
Route::middleware(['auth'])->group(function () {


    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    // Suppliers 
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier', 'SupplierAll')->name('supplier');
        Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
        Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
        Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
        Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
        Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
    });

    // Customers
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'CustomerAll')->name('customer');
        Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
        Route::post('/customer/store', 'CustomerStore')->name('customer.store');
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
        Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
        Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
        Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');
        Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
        Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');
        Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');
        Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
        Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');
    });

    // Units
    Route::controller(UnitController::class)->group(function () {
        Route::get('/unit', 'UnitAll')->name('unit');
        Route::get('/unit/add', 'UnitAdd')->name('unit.add');
        Route::post('/unit/store', 'UnitStore')->name('unit.store');
        Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
        Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
        Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
    });

    // Categories
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'CategoryAll')->name('category');
        Route::get('/category/add', 'CategoryAdd')->name('category.add');
        Route::post('/category/store', 'CategoryStore')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
        Route::post('/category/update', 'CategoryUpdate')->name('category.update');
        Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
    });

    // Products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'ProductsAll')->name('product');
        Route::get('/product/add', 'ProductAdd')->name('product.add');
        Route::post('/product/store', 'ProductStore')->name('product.store');
        Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
        Route::post('/product/update', 'ProductUpdate')->name('product.update');
        Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
    });

    // Purchases
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase', 'PurchaseAll')->name('purchase');
        Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
        Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
        Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
        Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
        Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
        Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
    });

    // Purchases
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice', 'InvoiceAll')->name('invoice');
        Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add');
        Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');
        Route::get('/invoice/pending', 'InvoicePending')->name('invoice.pending');
        Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
        Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
        Route::get('/invoice/print/list', 'InvoicePrintList')->name('invoice.print.list');
        Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');
        Route::get('/daily/invoice/report', 'InvoiceDailyReport')->name('daily.invoice.report');
        Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');
        Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
    });

    // Defaults
    Route::controller(DefaultController::class)->group(function () {
        Route::get('/get-category', 'GetCategory')->name('get-category');
        Route::get('/get-product', 'GetProduct')->name('get-product');
        Route::get('/check-product', 'GetStock')->name('check-product-stock');
    });

    // Defaults
    Route::controller(StockController::class)->group(function () {
        Route::get('/stock', 'StockReport')->name('stock');
        Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');
    });
});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
