<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.navbar', function ($view) {
            $cartItemCount = 0;
            if (Auth::check()) {
                // Hitung jumlah item unik di keranjang pengguna yang sedang login
                $cartItemCount = Cart::where('user_id', Auth::id())->count();
            }
            // Kirim data 'cartItemCount' ke view
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
