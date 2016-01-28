<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageType extends Controller {

    protected $pageType;

    public function create(Request $request) {

        $data = $this->viewData([
            'pageTitle' => 'Create ' . $this->pageType,
            'pageType' => $this->pageType,
            'page' => new Page,
        ]);

        return $this->view('create', $data);
    }

    public function createPost(Request $request) {

        $page = new Page();
        $page->fill($request->all());
        $page->page_type = $this->pageType;
        $page->save();

        return $this->redirectAction('update', $page);
    }

    public function update(Request $request, Page $page) {

        $data = $this->viewData([
            'pageTitle' => 'Update ' . $this->pageType,
            'page' => $page
        ]);

        return $this->view('update', $data);
    }

    public function updatePost(Request $request, Page $page) {

        $page->fill($request->all());
        $page->save();

        return $this->redirectAction('update', $page);
    }

    public function delete(Request $request, Page $page) {

        $data = $this->viewData([
            'pageTitle' => 'Delete ' . $this->pageType,
            'page' => $page
        ]);

        return $this->view('delete', $data);

    }

    public function deletePost(Request $request, Page $page) {
        $page->delete();
        return redirect()->action('Admin\Pages@index');
    }

    protected function viewData($data = []){
        return array_merge([
            'pageType' => $this->pageType,

        ], $data);
    }

    protected function redirectAction($action, $parameters = [], $status = 302, $headers = []){
        return redirect()->action('Admin\PageType@' . $action, $parameters, $status, $headers);
    }

    protected function view($view = null, $data = [], $mergeData = []){
        $path = 'admin::page-types.' . $this->pageType;
        if($view){
            $path .= '.' . $view;
        }
        return view($path, $data, $mergeData);
    }
}
