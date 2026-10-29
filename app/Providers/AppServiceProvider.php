<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share data user ke SEMUA view, tanpa peduli login atau tidak
        // Nilainya null jika belum login → aman dipakai dengan null-safe operator
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}