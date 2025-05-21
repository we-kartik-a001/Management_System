<?php

namespace App\Providers;

// Models
use App\Models\CollegeStudent;

// Observer
use App\Observers\CollegeStudentObserver;

//Support
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // CollegeStudent::observe(CollegeStudentObserver::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
