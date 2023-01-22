<?php
namespace EdwardAlgorist\WorldTime\Providers;
use EdwardAlgorist\WorldTime\WorldTime;
use Illuminate\Support\ServiceProvider;

class WorldTimeServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('world-time', function() {
            return new WorldTime();
        });
    }

}