<?php

namespace App\Providers;

use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //for multiple views
        View::composer(['admin.users.create','admin.users.index'], function($view){
            
        });

        //for all views
        View::composer('*', function($view){

        });

        //to send message to all the pages
        view()->composer('message', function ($view) {
            $with = array_merge([
                        'message' => ''
                    ], $view->getData());

            if (!empty($with['message'])) {
                $view->with($with);
            }
        });
    }
}
