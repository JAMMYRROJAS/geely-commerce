<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Rutas del sistema
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('customers', CustomerController::class)->names('customers');
Route::resource('suppliers', SupplierController::class)->names('suppliers');
Route::resource('products', ProductController::class)->names('products');

Route::resource('receipts', ReceiptController::class)->names('receipts')->except([
    'edit', 'update', 'destroy'
]);

Route::resource('sales', SaleController::class)->names('sales')->except([
    'edit', 'update', 'destroy'
]);

Route::resource('commerce', CommerceController::class)->names('commerce')->only([
    'index', 'update'
]);

//PDF
Route::get('receipts/pdf/{receipt}', [ReceiptController::class, 'pdf'])->name('receipts.pdf');
Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf'])->name('sales.pdf');

//Rutas para cambiar los estados
Route::get('change_status/products/{product}', [ProductController::class, 'change_status'])->name('change.status.products');

//Rutas para los reportes
Route::get('reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
Route::get('reports_date', [ReportController::class , 'reports_date'])->name('reports.date');
Route::post('sales/report_results', [ReportController::class, 'report_results'])->name('report.results');

Route::resource('users', UserController::class)->names('users');
Route::resource('roles', RoleController::class)->names('roles')->except([
    'create', 'store', 'destroy'
]);


//Ruta de prueba
Route::get('/prueba', function () {
    return view('prueba');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
