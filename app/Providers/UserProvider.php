<?php

namespace App\Providers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    public $menu;
    public $arrCart;
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
        // $this->menu = Product::getMenu();
        // View::share('menu', $this->menu);
        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount) . ' VND' ?>";
        });
    }
}
