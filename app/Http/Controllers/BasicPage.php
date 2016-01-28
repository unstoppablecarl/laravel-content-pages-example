<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\PageTypeControllerInfo;

class BasicPage extends Controller {

    use PageTypeControllerInfo;

    public function index(Request $request){

        return $this->getInfo($request, __CLASS__, __FUNCTION__);

    }
}
