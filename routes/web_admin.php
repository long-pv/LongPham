<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('dangki', [UserController::class, 'create'])->name('dangki');
Route::post('dangki', [UserController::class, 'store'])->name('dangki.post');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () { //controller = frefix
    Route::prefix('products')->name('products.')->group(function(){ // thư mục trong view
        Route::get('create', [ProductController::class, 'create'])->name('create');

        Route::post('create', [ProductController::class, 'store'])->name('store');

        Route::get('/', [ProductController::class, 'index'])->name('list'); // hiện all dữ liệu

        Route::delete('delete/{id}',[ProductController::class,'destroy'])->name('delete'); // delete id
        
        Route::get('send/{id}', [ProductController::class, 'send'])->name('send'); // đưa dữ liệu qua form chỉnh sửa

        Route::post('update/{id}', [ProductController::class, 'update'])->name('update'); // đưa dữ liệu vào database
    });

    // category thêm ràng buộc
    Route::prefix('categories')->name('category.')->group(function(){
        Route::delete('/delete', [CategoryController::class,'destroy'])->name('delete'); // do chưa có phân quyền nên bỏ quyền user
        Route::get('/', [CategoryController::class,'index'])->name('index'); 
    });
});


