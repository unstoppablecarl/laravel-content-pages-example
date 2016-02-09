<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PageTypeControllerInfo;

class BasicPage extends Controller {

    use PageTypeControllerInfo;

    public function index(Request $request, Page $page){

        return $this->getInfo($request, $page, __CLASS__, __FUNCTION__);

    }
}
