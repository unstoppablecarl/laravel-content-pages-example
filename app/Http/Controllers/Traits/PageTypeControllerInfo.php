<?php

namespace App\Http\Controllers\Traits;

use App\Models\Page;
use Illuminate\Http\Request;

trait PageTypeControllerInfo {

    public function getInfo(Request $request, Page $page, $class, $function) {

        $route     = $request->route();
        $routeInfo = ['path' => $route->getPath()];
        $routeInfo = array_merge($routeInfo, $route->getAction());

        $out = [
            'route'        => $routeInfo,
            '__CLASS__'    => $class,
            '__FUNCTION__' => $function,
            'page_model'   => $page->toArray()
        ];

        return $out;

    }

}
