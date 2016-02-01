<?php

namespace App\PageRouteBinders;

use Illuminate\Routing\Router;

use UnstoppableCarl\Pages\PageRouteBinder;

class Basic extends PageRouteBinder {

    protected function bindPageRoutes(Router $router) {
        $router->get('/', 'BasicPage@index');
    }

}
