<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {

        View::composer('*', function ($view) {
            $categories = Category::all(); 
            $view->with('categories', $categories);
        });
    }

    public function register()
    {
        //
    }
}
