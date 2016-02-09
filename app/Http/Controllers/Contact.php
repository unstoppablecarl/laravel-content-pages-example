<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PageTypeControllerInfo;
use Illuminate\Routing\Router;

class Contact extends Controller {

    public function form(Request $request, Page $page) {

        $data = [
            'page' => $page,
        ];


        return view('public.page-types.contact.form', $data);
    }

    public function formPost(Request $request, Page $page) {

        $rules = [
            'name' => 'required'
        ];


        $this->validate($request, $rules);

        $data = [
            'page' => $page,

        ];

        return view('public.page-types.contact.thank-you', $data);

    }

}
