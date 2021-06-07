<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LoginController;




Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () { //controller = frefix
    Route::prefix('products')->name('products.')->group(function(){ // thư mục trong view
        Route::get('create', [ProductController::class, 'create'])->name('create');

        Route::post('create', [ProductController::class, 'store'])->name('store');

        Route::get('/', [ProductController::class, 'index'])->name('list'); // hiện all dữ liệu

        Route::delete('delete/{id}',[ProductController::class,'destroy'])->name('delete'); // delete id
        
        Route::get('send/{id}', [ProductController::class, 'send'])->name('send'); // đưa dữ liệu qua form chỉnh sửa

        Route::post('update/{id}', [ProductController::class, 'update'])->name('update'); // đưa dữ liệu vào database
    });
});