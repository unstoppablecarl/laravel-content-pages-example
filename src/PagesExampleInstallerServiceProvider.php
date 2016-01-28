<?php

namespace UnstoppableCarl\PagesExample;

use Illuminate\Support\ServiceProvider;

class PagesExampleInstallerServiceProvider extends ServiceProvider {

    public function register() {

        $this->publishes([
            __DIR__ . '/../database/seeds/' => database_path('seeds')
        ], 'seeds');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../app/' => app_path()
        ], 'app');

        $this->publishes([
            __DIR__ . '/../resources/views/' => resource_path('views')
        ], 'views');

    }
}
