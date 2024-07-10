<?php

namespace App\Providers;

use App\Interfaces\Admin\BlogInterface as BlogAdminInterfaces;
use App\Interfaces\Admin\UserInterface;
use App\Interfaces\AuthInterface;
use App\Interfaces\user\BlogInterface;
use App\Repository\Admin\BlogRepository as BlogAdminRepository;
use App\Repository\Admin\UserRepository;
use App\Repository\AuthRepository;
use App\Repository\User\BlogRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, function () {
            return new AuthRepository();
        });
        $this->app->bind(BlogInterface::class, function () {
            return new BlogRepository();
        });
        $this->app->bind(BlogAdminInterfaces::class, function () {
            return new BlogAdminRepository();
        });
        $this->app->bind(UserInterface::class, function () {
            return new UserRepository();
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
