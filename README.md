# Pages Example

Example implementation of https://github.com/unstoppablecarl/laravel-content-pages

## Installation

Add the package via composer by adding the following to `composer.json` and running `composer update`.

```json
{
    "require": {
        "unstoppablecarl/laravel-content-pages": "dev-master",
        "unstoppablecarl/laravel-content-pages-example": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/unstoppablecarl/laravel-content-pages"
        },
        {
            "type": "vcs",
            "url": "https://github.com/unstoppablecarl/laravel-content-pages-example"
        }
    ],
    "minimum-stability": "dev"
}
```
### Add example installer service provider
Within `config/app.php` add the following line to the `providers` array.

```php
UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider::class
```

### Publish example files

Example files will be coppied to `/app`, `/database`, and `/resources`

```shell
php artisan vendor:publish
```

*OR*

```shell
php artisan vendor:publish --provider "UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider"
```

By default `vendor:publish` will not overwrite existing files if you want it to you can add `--force` to overwrite existing.

### Setup DB

Setup create migrations table (If not done already).

```shell
php artisan migrate:install
```

Migrate and seed example data.

```shell
php artisan migrate
```

```shell
php artisan db:seed --class=PagesSeeder
```

### Setup service providers

Within `config/app.php` add the following line to the `providers` array.

```php
// laravel-content-pages service provider
UnstoppableCarl\Pages\PagesServiceProvider::class,

// example app service provider installed by vendor:publish
App\Providers\PagesServiceProvider::class
````
Now that all example files have been installed, within `config/app.php` **remove** the following line from the `providers` array.
```php
UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider::class
```

### Enable pages package

In `config/pages.php`

```php
    // set to true
    'enabled' => env('PAGES_ENABLED', true),
```

## Result

You should now be able to see a list of routes by doing:
```shell
php artisan route:list
```

All of the routes listed should be publicly accessible. Look at the `pages` database table to see how the routes are set.

## Typical use case:
   
You need a content management solution where a user can manage page records, the page records have a path that is the url to that page and metadata / content. Simple route model binding would almost work, but you would need to match all routes and have a controller that tried to match to pages and handle any 404 stuff. Not ideal.

In addition to basic content pages you need to have ‘types’ of pages that behave differently: a contact form, a list/single article view etc. Setting the page type changes the behavior of that page’s admin controller to accommodate variant behavior / data. It also may bind ‘sub’ routes of that page such as the list view: ‘/‘ and ‘/{article-slug}` or whatever is needed for that page. The page’s base path must be able to be changed without code changes and without breaking anything. This could also include variant templates for different page types but that is just a detail. It could include variant ANYTHING per page type really.
