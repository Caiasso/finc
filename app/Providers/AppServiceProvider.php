<?php

namespace App\Providers;
use Carbon\Carbon;
use Carbon\CarbonInterval;

use Illuminate\Support\Facades\View;
use App\Models\Movimentacao;

use Illuminate\Support\ServiceProvider;

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
        Carbon::setLocale('pt_BR');
        CarbonInterval::setLocale('pt_BR');

        View::composer('*', function ($view) {
            if (auth()->check()) {
                $movs = Movimentacao::where('user_id', auth()->id())
                    ->whereMonth('created_at', now()->month)
                    ->orderBy('created_at', 'desc')
                    ->get();

                $view->with('movimentacoesMesTicker', $movs);
            } else {
                $view->with('movimentacoesMesTicker', collect());
            }
        });
    }
}
