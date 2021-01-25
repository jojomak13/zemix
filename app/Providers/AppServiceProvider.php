<?php

namespace App\Providers;

use App\Order;
use App\Observers\OrderObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);

        Order::observe(OrderObserver::class);       
        Blade::directive('money', function ($money) {
            return "<?php echo number_format($money, 2) . ' <span class=\"curreny\">EGP</span>'; ?>";
        });
    }
}
