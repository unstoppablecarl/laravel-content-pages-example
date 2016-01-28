<?php

namespace App\Http\Controllers\Admin\PageType;

use App\Http\Controllers\Admin\PageType;
use App\Models\Page;
use Illuminate\Http\Request;

class Articles extends PageType {

    protected $pageType = 'articles';


    public function updatePost(Request $request, Page $page) {

        $page->fill($request->all());

        $meta = $request->get('meta', []);

        $page->meta = $request->get('meta', []);
//        dd($page);
        $page->save();

        return $this->redirectAction('update', $page);
    }
}
