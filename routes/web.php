<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use League\Uri\Contracts\UserInfoInterface;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SuperAdmin\UnitController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\OrderController;
use App\Http\Controllers\SuperAdmin\ReportController;
use App\Http\Controllers\SuperAdmin\ProduksController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SuperAdmin\CategoryController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\BankAccountController;
use App\Http\Controllers\SuperAdmin\StockReportController;
use App\Http\Controllers\SuperAdmin\AdminProfileController;
use App\Http\Controllers\SuperAdmin\ShippingZoneController;

Route::middleware('prevent.admin.access')->group(function () {
    Route::get('/', function () {
        return view('landing-page');
    })->name('home');
    Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produk/filter', [ProductController::class, 'filterProducts'])->name('products.filter');
    Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
    Route::get('/kontak', function () {
        return view('kontak-page');
    })->name('contact');
    Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

    Route::middleware('auth')->group(function () {
        Route::prefix('keranjang')->name('cart.')->group(function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::post('/add/{product}', [CartController::class, 'store'])->name('store');
            Route::patch('/update/{cart}', [CartController::class, 'update'])->name('update');
            Route::delete('/remove/{cart}', [CartController::class, 'destroy'])->name('destroy');

            Route::post('/update-quantity/{item}', [CartController::class, 'updateQuantity'])->name('update.quantity');
        });

        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('/order/{order}/payment-instruction', [CheckoutController::class, 'paymentInstruction'])->name('order.payment.instruction');

        Route::prefix('profil')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::patch('/update', [ProfileController::class, 'updateDetails'])->name('update.details');
            Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
            Route::delete('/photo', [ProfileController::class, 'destroyPhoto'])->name('photo.destroy');
        });

        Route::get('/order/{order}/payment', [ProfileController::class, 'showPaymentForm'])->name('order.payment');
        Route::post('/order/{order}/payment', [ProfileController::class, 'storePayment'])->name('order.payment.store');
        Route::get('/order/{order}/detail', [ProfileController::class, 'showOrderDetail'])->name('order.detail');
        Route::post('/order/{order}/cancel', [ProfileController::class, 'cancelOrder'])->name('order.cancel');

        Route::post('/order/{order}/confirm-receipt', [ProfileController::class, 'confirmReceipt'])->name('order.confirm_receipt');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:superadmin,owner'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::patch('profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/photo', [AdminProfileController::class, 'destroyPhoto'])->name('profile.photo.destroy');


    Route::middleware('role:superadmin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('units', UnitController::class);
        Route::resource('products', ProduksController::class);

        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{order}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
        Route::resource('store-accounts', BankAccountController::class);
        Route::resource('shipping-zones', ShippingZoneController::class);

        Route::resource('users', UserController::class)->except('index');
    });

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/pdf', [ReportController::class, 'exportPDF'])->name('reports.pdf');
    Route::get('reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');

    Route::middleware('role:owner')->group(function () {
        // Route::get('stock-reports', [StockReportController::class, 'index'])->name('stock-reports.index');
    });
});

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
