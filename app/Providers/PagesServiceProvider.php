<?php

namespace App\Providers;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use UnstoppableCarl\Pages\Contracts\PageRepository as PageRepoContract;
use App\Models\Page;
use App\Repositories\PageRepository;
use UnstoppableCarl\Pages\Middleware\AdminPageController;
use UnstoppableCarl\Pages\Middleware\AdminPageControllerCreate;

class PagesServiceProvider extends ServiceProvider {

    public function register() {

        /**
         * Bind the PageRepositoryContract implementation needed by the UnstoppableCarl\Pages package
         */
        $this->app->bind(PageRepoContract::class, PageRepository::class);

        /**
         * This overrides the page_types key in /config/pages.php
         * You should move these values to that config file.
         * They are set here to streamline installation of this example.
         */
        $this->registerPageTypeConfig([
            'basic' => [
                'page_route_binder' => \App\PageRouteBinders\Basic::class,
                'admin_controller'  => \App\Http\Controllers\Admin\PageType\Basic::class,
            ],

            'articles' => [
                'page_route_binder' => \App\PageRouteBinders\Articles::class,
                'admin_controller'  => \App\Http\Controllers\Admin\PageType\Articles::class,
            ],

            'contact' => [
                'page_route_binder' => \App\PageRouteBinders\Contact::class,
                'admin_controller'  => \App\Http\Controllers\Admin\PageType\Contact::class,
            ],
        ]);
    }

    /**
     * Overrides the page_types key in /config/pages.php
     * @param $pageTypes
     */
    protected function registerPageTypeConfig($pageTypes) {
        $this->app['config']->set('pages.page_types', $pageTypes);
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(Router $router, ViewFactory $view) {

        $view->addNamespace('admin', resource_path('views/admin'));

        // route model binding for admin routes
        $router->model('content_page', Page::class);

        $this->bootAdminRoutes($router);
    }

    /**
     * Bind admin routes
     * @param Router $router
     */
    protected function bootAdminRoutes(Router $router) {

        /**
         * You should move these to the app/Http/routes.php file
         * They are set here to streamline installation of this example.
         */
        $router->group([
            'namespace' => 'App\Http\Controllers',
            'prefix'    => 'admin',
            'middleware' => ['web'],
        ], function (Router $router) {

            $router->get('/pages', [
                'as'   => 'admin.pages.list',
                'uses' => 'Admin\Pages@index',
            ]);

            $router->get('/pages/create', [
                'as'   => 'admin.pages.select_page_type',
                'uses' => 'Admin\Pages@selectPageType',
            ]);

            $router->get('/pages/create/{page_type}', [
                'as'         => 'admin.pages.create',
                'uses'       => 'Admin\PageType@create',
                'middleware' => AdminPageControllerCreate::class,
            ]);

            $router->post('/pages/create/{page_type}', [
                'as'         => 'admin.pages.create:post',
                'uses'       => 'Admin\PageType@createPost',
                'middleware' => AdminPageControllerCreate::class,
            ]);

            $router->get('/pages/update/{content_page}', [
                'as'         => 'admin.pages.update',
                'uses'       => 'Admin\PageType@update',
                'middleware' => AdminPageController::class,
            ]);

            $router->post('/pages/update/{content_page}', [
                'as'         => 'admin.pages.update:post',
                'uses'       => 'Admin\PageType@updatePost',
                'middleware' => AdminPageController::class,
            ]);

            $router->get('/pages/delete/{content_page}', [
                'as'         => 'admin.pages.delete',
                'uses'       => 'Admin\PageType@delete',
                'middleware' => AdminPageController::class,
            ]);

            $router->post('/pages/delete/{content_page}', [
                'as'         => 'admin.pages.delete:post',
                'uses'       => 'Admin\PageType@deletePost',
                'middleware' => AdminPageController::class,
            ]);

        });

    }
}
