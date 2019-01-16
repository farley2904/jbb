<?php

namespace Jbb\Providers;

use Blade;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //дозволяє присвоїти значення змінній у шаблоні blade
        //  @set($i,10)
        Blade::directive('set', function ($exp) {
            list($name, $val) = explode(',', $exp);

            return "<?php $name = $val ?>";
        });

        // дозволяє бачити(слухати) sql запити
        DB::listen(function ($query) {

            //echo '<p style="color:green">'.$query->sql.' - time: '.$query->time.'</p>';

           // dump($query->bindings);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
