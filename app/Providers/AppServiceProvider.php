<?php

namespace App\Providers;

// Models

use App\Models\CollegeStudent;
use App\Models\Teacher;
use App\Observers\CollegeStudentObserver;
// Observer
use App\Observers\TeacherObserver;

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
        Teacher::observe(TeacherObserver::class);
        CollegeStudent::observe(CollegeStudentObserver::class);
    }
}
