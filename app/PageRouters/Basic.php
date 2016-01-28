<?php

namespace App\PageRouters;

use Illuminate\Routing\Router;

use UnstoppableCarl\Pages\PageRouteBinder;

class Basic extends PageRouteBinder {

    protected function bindPageRoutes(Router $router) {
        $router->any('/', 'BasicPage@index');
    }

}
