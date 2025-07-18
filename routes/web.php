<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
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
use App\Http\Controllers\SuperAdmin\AdminProfileController;

// Halaman utama (Landing Page)
Route::get('/', function () {
    return view('landing-page');
})->name('home');

Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/filter', [ProductController::class, 'filterProducts'])->name('products.filter');
Route::get('/produk/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/tentang-kami', function () {
    return view('about-page');
})->name('about');
Route::get('/kontak', function () {
    return view('kontak-page');
})->name('contact');

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

// Grup route untuk yang sudah login
Route::middleware('auth')->group(function () {
    // Rute untuk logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('keranjang')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{product}', [CartController::class, 'store'])->name('store');
        Route::patch('/update/{cart}', [CartController::class, 'update'])->name('update');
        Route::delete('/remove/{cart}', [CartController::class, 'destroy'])->name('destroy');
    });

    // Route untuk Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    // Route untuk halaman sukses setelah order
    Route::get('/order/success/{order}', [CheckoutController::class, 'success'])->name('order.success');

    Route::get('/order/{order}/payment', [ProfileController::class, 'showPaymentForm'])->name('order.payment');
    Route::post('/order/{order}/payment', [ProfileController::class, 'storePayment'])->name('order.payment.store');
    Route::get('/order/{order}/detail', [ProfileController::class, 'showOrderDetail'])->name('order.detail');
    Route::post('/order/{order}/cancel', [ProfileController::class, 'cancelOrder'])->name('order.cancel');

    // Grup route untuk Profil Pelanggan
    Route::prefix('profil')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::patch('/update', [ProfileController::class, 'updateDetails'])->name('update.details');
        Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
    });

    // Grup Route untuk Admin & Owner
    Route::middleware(['auth', 'role:superadmin,owner'])->prefix('admin')->name('admin.')->group(function () {

        // == FITUR YANG BISA DIAKSES ADMIN & OWNER ==
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('profile', [AdminProfileController::class, 'index'])->name('profile.index');
        Route::patch('profile', [AdminProfileController::class, 'update'])->name('profile.update');

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


        // == FITUR YANG HANYA BISA DIAKSES OWNER ==
        Route::middleware('role:owner')->group(function () {
            // Laporan
            Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
            Route::get('reports/pdf', [ReportController::class, 'exportPDF'])->name('reports.pdf');
            Route::get('reports/excel', [ReportController::class, 'exportExcel'])->name('reports.excel');

            // Manajemen Pengguna & Rekening
            Route::resource('users', UserController::class);
            Route::resource('store-accounts', BankAccountController::class);
        });


        // Route::get('products', [ProduksController::class, 'index'])->name('products.index');
        // Route::get('users', [UserController::class, 'index'])->name('users.index');

        // Route::middleware('role:superadmin')->group(function () {
        //     Route::resource('categories', CategoryController::class);
        //     Route::resource('units', UnitController::class);
        //     Route::resource('products', ProduksController::class)->except('index');

        //     Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        //     Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        //     Route::patch('orders/{order}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

        //     Route::resource('users', UserController::class)->except('index');

        //     Route::resource('store-accounts', BankAccountController::class);

        //     Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        //     Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
        // });
    });
});


// Route::get('/', function () {
//     return view('welcome');
// });
