<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify; // Añadido correctamente

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Fortify::ignoreRoutes(); // Descomentado
        
        $this->app->bind('path.public', function() {
            return config('app.public_prefix');
        });
    }


//    public function boot()
// {
//     Paginator::useBootstrap();
//     Livewire::setUpdateRoute(function ($handle) {
//         return Route::post('/livewire/update', $handle);
//     });
// }

}

// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;


// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      *
//      * @return void
//      */
//     public function register()
//     {
//         //
//             Fortify::ignoreRoutes();

//         $this->app->bind('path.public', function () {
//             return config('app.public_prefix');
//         }); 
//     }

//     /**
//      * Bootstrap any application services.
//      *
//      * @return void
//      */
//     public function boot()
//     {
//           }
// }
