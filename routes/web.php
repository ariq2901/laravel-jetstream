<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [RegistrationController::class, 'index']);
Route::post('/proses', [RegistrationController::class, 'proses']);

//mystore
Route::get('/', function() {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('product', [ProductController::class, "index"]);
Route::middleware(['auth:sanctum', 'verified'])->get('product/create', [ProductController::class, "create"]);
Route::post('product/store', [ProductController::class, "store"]);
Route::get('product/edit/{product:product_slug}', [ProductController::class, "edit"]);
Route::get('product/{product_slug}', [ProductController::class, "showProduct"]);
Route::patch('product/update/{id}', [ProductController::class, 'update']);
Route::delete('product/delete/{product_slug}', [ProductController::class, 'delete']);


// Route::get('product/edit/{id}', [ProductController::class, 'edit']);

// Export file
Route::get('product/export/xlsx', [ProductController::class, 'exportXL']);
Route::get('product/export/csv', [ProductController::class, 'exportCSV']);
Route::get('product/export/pdf', [ProductController::class, 'exportPDF']);

// Input  file
Route::get('upload', [ProductController::class, 'upload']);
Route::post('product/upload/data', [ProductController::class, 'uploadData']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
