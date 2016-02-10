<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $examplePages = [
            [
                'path' => '/',
                'page_type' => 'basic',
                'content' => 'This is the home page content',
                'meta' => null,
            ],

            [
                'path' => 'about',
                'page_type' => 'basic',
                'content' => 'This is the about page content',
                'meta' => null,
            ],

            [
                'path' => 'services',
                'page_type' => 'basic',
                'content' => 'This is the services page content',
                'meta' => null,
            ],

            [
                'path' => 'services/marketing',
                'page_type' => 'basic',
                'content' => 'This is the services marketing page content',
                'meta' => null,
            ],

            [
                'path' => 'services/production',
                'page_type' => 'basic',
                'content' => 'This is the services production page content',
                'meta' => null,
            ],

            [
                'path' => 'industry/news',
                'page_type' => 'articles',
                'content' => 'This is the articles page content',
                'meta' => null,
            ],

            [
                'path' => 'contact-us',
                'page_type' => 'contact',
                'content' => 'This is the contact page content',
                'meta' => null,
            ],


        ];

        foreach($examplePages as $pageData){
            \App\Models\Page::create($pageData);
        }

    }
}
