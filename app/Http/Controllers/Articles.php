<?php

namespace App\Http\Controllers;

use App\Models\Page;
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

    public function all(Request $request, Router $router, Page $page) {

        $data = [
            'articles' => $this->stubArticleData,
            'page' => $page,
        ];

        return view('public.page-types.articles.list', $data);
    }

    public function single(Request $request, $article, Page $page) {

        return $this->getInfo($request, $page, __CLASS__, __FUNCTION__);

    }
}
