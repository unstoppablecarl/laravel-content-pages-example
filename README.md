# Pages Example

Example implementation of the Pages package

## Installation

Install the package via composer:

```php
TBD
```
### Add service providers
Within `config/app.php` add the following line to the `providers` array.

```php
UnstoppableCarl\Pages\PagesServiceProvider::class
UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider::class
```

### Publish example files

Example files will be coppied to `/app`, `/database`, and `/resources`

`php artisan vendor:publish`

*OR*

`php artisan vendor:publish --provider "UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider"`

### Setup DB

If not already setup create migrations table.

`php artisan migrate:install`

Migrate and seed example data.

`php artisan migrate`

`php artisan db:seed --class=PagesSeeder`

### Add app example pages service provider

Within `config/app.php` add the following line to the `providers` array.
```php
App\Providers\PagesServiceProvider::class
```
Now that all example files have been installed you may remove the following from the `providers` array in `config/app.php`.
```php
UnstoppableCarl\PagesExample\PagesExampleInstallerServiceProvider::class
```

### Enable pages package

In `config/pages.php`

```php
    // set to true
    'enabled' => env('PAGES_ENABLED', true),
```

## Conclusion

You should now be able to see a list of routes by doing:
`php artisan route:list`

All of the routes listed should be publicly accessible. Look at the `pages` database table to see how the routes are set.

