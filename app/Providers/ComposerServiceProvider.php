<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Setting;
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
        View::composer('*', function ($view) {
            // Gunakan cache untuk mengelakkan query berulang pada setiap paparan
            $settings = \Illuminate\Support\Facades\Cache::remember('global_settings', 60, function () {
                return Setting::all()->keyBy('key');
            });

            $cartItemCount = 0;
            if (Auth::check()) {
                $cartItemCount = Cart::where('user_id', Auth::id())->count();
            }

            $view->with('globalSettings', $settings)
                ->with('cartItemCount', $cartItemCount);
        });
    }
}
