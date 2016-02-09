<?php

namespace App\Http\Controllers\Admin\PageType;

use App\Http\Controllers\Admin\PageType;
use App\Models\Page;
use Illuminate\Http\Request;

class Contact extends PageType {

    protected $pageType = 'contact';
    protected $viewDir = 'admin::page-types.basic';

}
