<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;




Route::prefix('admin')->name('admin.')->group(function () { //controller = frefix
    Route::prefix('products')->name('products.')->group(function(){ // thư mục trong view
        Route::get('create', [ProductController::class, 'create'])->name('create');

        Route::post('create', [ProductController::class, 'store'])->name('store');

        Route::get('/', [ProductController::class, 'index'])->name('list'); // hiện all dữ liệu

        Route::delete('delete/{id}',[ProductController::class,'destroy'])->name('delete'); // delete id
        
        Route::get('send/{id}', [ProductController::class, 'send'])->name('send'); // đưa dữ liệu qua form chỉnh sửa

        Route::post('update/{id}', [ProductController::class, 'update'])->name('update'); // đưa dữ liệu vào database
    });
});