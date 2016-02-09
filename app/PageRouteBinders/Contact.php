<?php

namespace App\PageRouteBinders;

use Illuminate\Routing\Router;

use UnstoppableCarl\Pages\PageRouteBinder;

class Contact extends PageRouteBinder {

    protected function bindPageRoutes(Router $router) {

        $router->get('/', [
            'uses' => 'Contact@form',
            'as' => 'form'
        ]);

        $router->post('/', [
            'uses' => 'Contact@formPost',
            'as' => 'formPost'
        ]);

    }

}
