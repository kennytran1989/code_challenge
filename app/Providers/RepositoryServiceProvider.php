<?php

namespace App\Providers;

use App\Contract\Repository\LoanRepository;
use App\Contract\Repository\UserRepository;
use App\Repository\Mysql\EqLoanRepository;
use App\Repository\Mysql\EqUserRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, function() {
            return new EqUserRepository();
        });
        $this->app->singleton(LoanRepository::class, function() {
            return new EqLoanRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
