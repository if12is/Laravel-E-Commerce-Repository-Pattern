<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // if (app()->runningInConsole()) {
        $setting = Setting::firstOr(function () {
            return   Setting::create([
                'title' => 'Ecommerce',
                'description' => ' description',
                'keywords' => 'keywords',
                'logo' => 'logo',
                'favicon' => 'icon',
                'status' => 1,
                'maintenance' => 0,
                'facebook' => 'www.facebook.com',
                'twitter' => 'www.twitter.com',
                'instagram' => 'www.instagram.com',
                'youtube' => 'www.youtube.com',
                'github' => 'www.github.com',
                'whatsapp' => 'www.whatsapp.com',
                'email' => 'email',
                'phone' => 'phone',
                'language' => 'en',
            ]);
        });
        view()->share('setting', $setting);
        // }
    }
}
