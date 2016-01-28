<?php

namespace App\PageRouters;

use Illuminate\Routing\Router;

use UnstoppableCarl\Pages\PageRouteBinder;

class Articles extends PageRouteBinder {

    protected function bindPageRoutes(Router $router) {
        $router->any('/', 'Articles@all');
        $router->any('/{article}', 'Articles@single');
    }

}
