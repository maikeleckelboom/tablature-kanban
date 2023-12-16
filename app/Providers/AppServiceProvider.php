<?php

namespace App\Providers;

use App\Models\Kanban\Card;
use App\Models\Kanban\Column;
use App\Observers\Kanban\CardObserver;
use App\Observers\Kanban\ColumnObserver;
use Closure;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

/**
 * @method map(Closure $param)
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->runMigrations();

        JsonResource::withoutWrapping();
    }

    private function runMigrations(): void
    {
        $modules = [
            'Kanban',
        ];

        foreach ($modules as $module) {
            $this->loadMigrationsFrom(database_path('migrations/' . $module));
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Collection::macro('recursive', function () {
            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->recursive();
                }

                return $value;
            });
        });


        Column::observe(ColumnObserver::class);
        Card::observe(CardObserver::class);
    }
}
