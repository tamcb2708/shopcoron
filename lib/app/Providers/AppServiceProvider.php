<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Contact;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $appproduct=Product::all()->count();
            $appblog=Blog::all()->count();
            $appcustomer=Customer::all()->count();
            $apporder=Order::all()->count();
            $appcontact=Contact::all()->count();
            $view->with('appproduct',$appproduct)->with('appblog',$appblog)->with('appcustomer',$appcustomer)->with('apporder',$apporder)->with('appcontact',$appcontact);

        });
    }
}
