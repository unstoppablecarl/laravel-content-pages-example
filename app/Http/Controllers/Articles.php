<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PageTypeControllerInfo;
use Illuminate\Routing\Router;

class Articles extends Controller {

    use PageTypeControllerInfo;

    protected $stubArticleData = [
        [
            'id'    => 1,
            'title' => 'Dog Bites Man',
        ],
        [
            'id'    => 2,
            'title' => 'Cat Starts Fire',
        ],
        [
            'id'    => 3,
            'title' => 'Mouse Avoids Trap',
        ]
    ];

    public function all(Request $request, Router $router) {


        $page = $request->get('page_model');

        $data = [
            'articles' => $this->stubArticleData,
            'page' => $page,
        ];

        return view('public.page-types.articles.list', $data);

//        return $this->getInfo($request, __CLASS__, __FUNCTION__);

    }

    public function single(Request $request) {

        return $this->getInfo($request, __CLASS__, __FUNCTION__);

    }
}
