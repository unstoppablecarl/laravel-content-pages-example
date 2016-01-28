<?php

namespace App\Repositories;

use UnstoppableCarl\Pages\Contracts\PageRepository as PageRepoContract;
use App\Models\Page;

class PageRepository implements PageRepoContract {

    public function findById($id) {

        return Page::find($id);
    }

    public function getRouteData() {
        return Page::query()
                   ->select(['id', 'path', 'page_type'])
                   ->orderBy('route_priority', 'desc')
                   ->get()->toArray();

    }
}
