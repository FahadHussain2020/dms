<?php
namespace App\Providers;
use App\Classmodel; // write model name here
use Illuminate\Support\ServiceProvider;
class DynamicClassname extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('classname_array', Classmodel::all());
        });
    }

}
