<?php

use App\Http\Controllers\Admin\{DashboardController, UserController, TeamController};
use App\Http\Controllers\ui\{HomeController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController, ProductController, CategoryController, OrderController, CustomerController};
use App\Http\Controllers\{CartController, CheckoutController, AuthController, FeedbackController};


Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [CategoryController::class, 'delete'])->name('delete');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::get('/gallery', [ProductController::class, 'gallery'])->name('gallery');
        Route::get('/add', [ProductController::class, 'add'])->name('add');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit-info', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('delete');
        Route::get('/{id}/edit-gallery', [ProductController::class, 'edit_gallery'])->name('edit_gallery');
        Route::put('/{id}/update-gallery', [ProductController::class, 'update_gallery'])->name('update_gallery');
    });

    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'list'])->name('list');
        Route::get('/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::post('/{id}/update-status', [OrderController::class, 'update_status'])->name('update_status');
        Route::delete('/{orderId}', [OrderController::class, 'destroy'])->name('destroy');
    });



    Route::get('/login', [DashboardController::class, 'AuthForm'])->name('AuthForm');

    Route::post('/login', [DashboardController::class, 'AuthPost'])->name('AuthPost');

    Route::middleware('admin')->group(function () {

        //Route::get('/', [DashboardController::class, 'Dashboard'])->name('Dashboard');

        Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');
        Route::get('logout', [DashboardController::class, 'AuthOut'])->name('AuthOut');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::put('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('team')->name('team.')->group(function () {
            Route::get('', [TeamController::class, 'index'])->name('index');
            Route::get('/create', [TeamController::class, 'add'])->name('add');
            Route::post('/create', [TeamController::class, 'store'])->name('store');
        });
    });
});




Route::name('ui.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/matches', [HomeController::class, 'matches'])->name('matches');

    Route::get('/players', [HomeController::class, 'players'])->name('players');

    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    Route::get('/login', [HomeController::class, 'AuthForm'])->name('AuthForm');

    Route::post('/login', [HomeController::class, 'AuthPost'])->name('AuthPost');

    Route::get('logout', [HomeController::class, 'AuthOut'])->name('AuthOut');

    Route::get('/register', [HomeController::class, 'AuthRegisterForm'])->name('AuthRegisterForm');

    Route::post('/register', [HomeController::class, 'AuthRegister'])->name('AuthRegister');

    Route::get('/agent-system', [HomeController::class, 'agentSystem'])->name('agentSystem');

    // Route cho trang Cart
    Route::get('/cart', function () {return view('ui.pages.cart.index');})->name('cart');

    // Route cho trang Product
    Route::get('/product', function () {
        return view('ui.pages.product.index');
    })->name('ui.product');


    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/details/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/search', [ProductController::class, 'search'])->name('search');
    });

    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('add');
        Route::post('/remove/{id}', [CartController::class, 'remove'])->name('remove');
        Route::put('/update/{id}', [CartController::class, 'update'])->name('update');
        Route::post('/clear', [CartController::class, 'clear'])->name('clear');
    });

    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/shipping-details', [CheckoutController::class, 'shipping'])->name('shipping');
        Route::post('/shipping-details-confirm', [CheckoutController::class, 'confirmShipping'])->name('confirm_shipping');
        Route::get('/payment-methods', [CheckoutController::class, 'payment'])->name('payment');
        Route::post('/payment-methods', [CheckoutController::class, 'confirmPayment'])->name('confirm_payment');
        Route::get('/thank-you', [CheckoutController::class, 'complete'])->name('complete');
        Route::post('/thank-you', [CheckoutController::class, 'destroy'])->name('destroy');
        Route::get('/your-order', [CheckoutController::class, 'viewOrders'])->name('viewOrders');
    });
});

