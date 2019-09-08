<?php

namespace ann\distance;
use Illuminate\Support\ServiceProvider;
class distanceServiceProvider extends ServiceProvider {
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'nearestUser');
    }
    public function register()
    {
    }
}
?>