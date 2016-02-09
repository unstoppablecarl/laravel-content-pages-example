<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageType extends Controller {

    /**
     * The page type string name used in the 'page_types' array in /config/pages.php
     * @var string
     */
    protected $pageType;

    /**
     * Dir path to admin views for this page type
     * @var string
     */
    protected $viewDir;

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

    /**
     * Redirect to an action in this controller
     * @param string $action
     * @param array $parameters
     * @param int   $status
     * @param array $headers
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectAction($action, $parameters = [], $status = 302, $headers = []){
        return redirect()->action('Admin\PageType@' . $action, $parameters, $status, $headers);
    }

    protected function viewDir(){
        return $this->viewDir ?: 'admin::page-types.' . $this->pageType;
    }

    protected function view($view = null, $data = [], $mergeData = []){
        $path = $this->viewDir();
        if($view){
            $path .= '.' . $view;
        }
        return view($path, $data, $mergeData);
    }
}
