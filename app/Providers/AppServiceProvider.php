<?php

namespace App\Providers;

use App\Models\JenisData;
use Illuminate\Support\ServiceProvider;
use App\Models\PersonalAccessToken;
use App\Models\Unit;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
