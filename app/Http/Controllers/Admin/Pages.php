<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;

class Pages extends Controller {

    public function index(Request $request){
        $pages = Page::all();

        $tplData = [
            'pages' => $pages
        ];

        return view('admin::pages.list', $tplData);

    }

    public function selectPageType() {

        $types = config('pages.page_types');

        $tplData = [
            'pageTypes' => $types
        ];

        return view('admin::pages.select-page-type', $tplData);
    }

}
