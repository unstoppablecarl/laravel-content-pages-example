<?php

namespace App\Http\Controllers\Admin\PageType;

use App\Http\Controllers\Admin\PageType;
use App\Models\Page;
use Illuminate\Http\Request;

class Articles extends PageType {

    protected $pageType = 'articles';

    public function createPose(Request $request) {

        $page = new Page();
        $page->fill($request->all());
        $page->page_type = $this->pageType;
        $page->meta = $request->get('meta', []);
        $page->save();

        return $this->redirectAction('update', $page);
    }

    public function updatePost(Request $request, Page $page) {

        $page->fill($request->all());
        $page->meta = $request->get('meta', []);
        $page->save();

        return $this->redirectAction('update', $page);
    }
}
