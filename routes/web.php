<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\AuthController;
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
use League\Uri\Contracts\UserInfoInterface;

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

        // Route untuk Checkout
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('/order/{order}/payment-instruction', [CheckoutController::class, 'paymentInstruction'])->name('order.payment.instruction');

        // Grup route untuk Profil Pelanggan
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

// Grup route untuk tamu (yang belum login)
Route::middleware('guest')->group(function () {
    // Rute untuk menampilkan form registrasi
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    // Rute untuk memproses data registrasi
    Route::post('register', [AuthController::class, 'register']);

    // Rute untuk menampilkan form login
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    // Rute untuk memproses data login
    Route::post('login', [AuthController::class, 'login']);
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Grup Route untuk Admin & Owner
Route::middleware(['auth', 'role:superadmin,owner'])->prefix('admin')->name('admin.')->group(function () {

    // == FITUR YANG BISA DIAKSES ADMIN & OWNER ==
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::patch('profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/photo', [AdminProfileController::class, 'destroyPhoto'])->name('profile.photo.destroy');


    Route::middleware('role:superadmin')->group(function () {
        // Master Data
        Route::resource('categories', CategoryController::class);
        Route::resource('units', UnitController::class);
        Route::resource('products', ProduksController::class);

        // Manajemen Pesanan
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{order}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

        // Pengaturan Website
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
        Route::resource('store-accounts', BankAccountController::class);
        Route::resource('shipping-zones', ShippingZoneController::class);
        // Manajemen Pengguna
        Route::resource('users', UserController::class)->except('index');
    });

    Route::get('users', [UserController::class, 'index'])->name('users.index');


    // Laporan
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/pdf', [ReportController::class, 'exportPDF'])->name('reports.pdf');
    Route::get('reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');

    // == FITUR YANG HANYA BISA DIAKSES OWNER ==
    Route::middleware('role:owner')->group(function () {
        // Route::get('stock-reports', [StockReportController::class, 'index'])->name('stock-reports.index');
    });
});
