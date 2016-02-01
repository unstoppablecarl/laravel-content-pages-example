<?php

namespace App\PageRouteBinders;

use Illuminate\Routing\Router;

use UnstoppableCarl\Pages\PageRouteBinder;

class Articles extends PageRouteBinder {

    protected function bindPageRoutes(Router $router) {

        $router->get('/', [
            'uses' => 'Articles@all',
            'as' => 'all'
        ]);

        $router->get('/{article}', [
            'uses' => 'Articles@single',
            'as' => 'single'
        ]);



    }

}
