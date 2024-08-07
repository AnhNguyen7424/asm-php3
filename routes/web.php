<?php

use Illuminate\Support\Facades\Route;
// Controller Admin
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
// Controller User
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\User\ClientController;

Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');



// Admin
Route::group([
    'prefix' => 'admin',
    'as'    => 'admin.',
    'middleware' => 'checkAdmin'
], function() {
    // Dashboard
    Route::get('dashboard', [AuthenController::class, 'dashboard'])->name('dashboard');


    // Nhóm quản lý user
    Route::group([
        'prefix' => 'users',
        'as'    => 'users.',
    ], function(){
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
        Route::post('add-user', [UserController::class, 'addUsers'])->name('addUsers');
        Route::delete('delete-user', [UserController::class, 'deleteUsers'])->name('deleteUsers');
        Route::get('detail-user', [UserController::class, 'detailUsers'])->name('detailUsers');
        Route::patch('update-user', [UserController::class, 'updateUsers'])->name('updateUsers');
    });


    // Nhóm quản lý category
    Route::group([
        'prefix' => 'category',
        'as'    => 'category.',
    ], function(){
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');
        Route::delete('delete-category', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('update-category/{idCategory}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });

    // Nhóm quản lý products
    Route::group([
        'prefix' => 'products',
        'as'    => 'products.',
    ], function(){
        Route::get('/', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');

    });
});



// http://127.0.0.1:8000/
Route::get('/', function(){
    return redirect()->route('users.home');
});


// Users
Route::group([
    'prefix'    => 'users',
    'as'    => 'users.',
],function() {
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('danhmuc', [HomeController::class, 'danhmuc'])->name('danhmuc');
    Route::get('user-info', [HomeController::class, 'userInfo'])->name('userInfo');
    Route::post('update-user', [HomeController::class, 'updateUser'])->name('updateUser');
    Route::post('change-pass-user', [HomeController::class, 'changePassUser'])->name('changePassUser');

    Route::get('detail-product', [HomeController::class, 'detailProduct'])->name('detailProduct');
    Route::post('search-product', [HomeController::class, 'searchProduct'])->name('searchProduct');

    Route::group([
        'middleware' => 'checkUser'
    ], function() {
        Route::post('add-to-cart', [ClientController::class, 'addToCart'])->name('addToCart');
        Route::get('view-cart', [ClientController::class, 'viewCart'])->name('viewCart');
        Route::get('view-checkout', [ClientController::class, 'viewCheckout'])->name('viewCheckout');
        Route::patch('update-cart', [ClientController::class, 'updateCart'])->name('updateCart');
        Route::delete('delete-cart', [ClientController::class, 'deleteCart'])->name('deleteCart');

    });
});
