<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdmindashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\user\UserdashboardController;
use Illuminate\Support\Facades\Route;


//------------------Home Route------(Without Login)----------------
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'Index')->name('Home');
    Route::get('admin_login', 'admin_login')->name('admin_login');
    Route::get('category/{id}/{slug}/', 'category')->name('category');
    Route::get('subcategory/{id}/{slug}/', 'subcategory')->name('subcategory');
    Route::get('single_product/{id}/{slug}/', 'single_product')->name('single_product');
});


//-----------------User Route-----------(Auth User)------------------
Route::prefix('user')->group(function(){
    Route::controller(UserdashboardController::class)->group(function(){
        Route::get('/user_login_form', 'user_login_form')->name('user_login_form');
        Route::post('/user_login_process', 'user_login_process')->name('user_login_process');
        Route::get('/user_dashboard', 'user_dashboard')->name('user_dashboard')->middleware('seller');
        Route::get('/user_register_process', 'user_register_process')->name('user_register_process');
        Route::post('/user_register_create', 'user_register_create')->name('user_register_create');
        Route::get('/user_logout', 'user_logout')->name('user_logout');

        //------------------User Operation Route---------------------------
        Route::get('/user/product', 'user_product')->name('user_product');
        Route::get('/user/detail_product/{id}/{slug}', 'user_detail_product')->name('user_detail_product');
        Route::get('/add_to_cart', 'add_to_cart')->name('add_to_cart');
        Route::post('/add_cart', 'add_cart')->name('add_cart');
        Route::put('/update_cart/{rowId}', 'update_cart')->name('update_cart');
        Route::post('/delete_cart/{rowId}', 'delete_cart')->name('delete_cart');
        Route::post('/create_invoice', 'create_invoice')->name('create_invoice');
        Route::post('/order_confirm', 'order_confirm')->name('order_confirm');
        Route::get('/user_pending_order', 'user_pending_order')->name('user_pending_order');
        Route::get('/user_success_order', 'user_success_order')->name('user_success_order');
    });
});


//-----------------Admin Route-----------(Auth Admin)------------------
Route::prefix('admin')->group(function(){
    Route::controller(AdmindashboardController::class)->group(function(){
        Route::get('/admin_login_form', 'admin_login_form')->name('admin_login_form');
        Route::post('/admin_login_process', 'admin_login_process')->name('admin_login_process');
        Route::get('/admin_dashboard', 'admin_dashboard')->name('admin_dashboard')->middleware('admin');
        Route::get('/admin_register_process', 'admin_register_process')->name('admin_register_process');
        Route::post('/admin_register_create', 'admin_register_create')->name('admin_register_create');
        Route::get('/admin_logout', 'admin_logout')->name('admin_logout');
    });

    Route::middleware('admin')->group(function(){
        Route::resources([
            'category' => CategoryController::class,
            'subcategory' => SubcategoryController::class,
            'product' => ProductController::class,
            'administration' => AdminController::class,
            'user' => UserController::class,
        ]);
    
        Route::get('all-order', [OrderController::class, 'all_order'])->name('all_order');
        Route::get('pending-order', [OrderController::class, 'pending_order'])->name('pending_order');
        Route::get('success-order', [OrderController::class, 'success_order'])->name('success_order');
        Route::get('/admin/view_order/{id}', [OrderController::class, 'view_order'])->name('view_order');
        Route::put('/admin/order_success/{id}', [OrderController::class, 'order_success'])->name('order_success');
        Route::get('order', [OrderController::class, 'order'])->name('order');
        Route::post('store-order', [OrderController::class, 'store_order'])->name('store_order');
    });

});


Route::middleware('auth', 'verified', 'role:admin')->group(function () {   
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//-----------------Breeze Route Inclusion-----------(Auth User)------------------
require __DIR__.'/auth.php';
