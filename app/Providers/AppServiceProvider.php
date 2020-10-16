<?php

namespace App\Providers;

use App\Customer;
use Illuminate\Support\ServiceProvider;
use View;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      View::composer('*',function ($view){
          $view->with('customer',Customer::find(Session::get('customerId')));
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
