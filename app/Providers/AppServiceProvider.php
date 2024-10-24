<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as IlluminateViewView;
use Spatie\FlareClient\View as FlareClientView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Blade::directive('price_format', function ($price) {
            return "<?php echo number_format($price, 0, ',', ' '); ?>";
        });

        $categories = Category::all();
        View::share('categories', $categories);
    }
}
