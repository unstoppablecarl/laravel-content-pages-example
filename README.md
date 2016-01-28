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

`php artisan vendor:publish`

*OR*

`php artisan vendor:publish --provider "UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider"`

By default `vendor:publish` will not overwrite existing files if you want it to you can add `--force` to overwrite existing.

### Setup DB

Setup create migrations table (If not done already).

`php artisan migrate:install`

Migrate and seed example data.

`php artisan migrate`

`php artisan db:seed --class=PagesSeeder`

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
`php artisan route:list`

All of the routes listed should be publicly accessible. Look at the `pages` database table to see how the routes are set.

