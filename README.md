Auth
=====
Lomi525  Laravel Form Redirect Package


Installation
------------

composer.json repositories setting 
```json
{
    "type": "vcs",
    "url":  "https://github.com/lomi525/form-redirect.git"
}
```

Install using composer:
```bash
composer require lomi525/form-redirect
```



Laravel (optional)
------------------

Add the service provider in `app/config/app.php`:

```php
Lomi525\FormRedirect\FormRedirectServiceProvider::class,
```

And add the Auth alias to `app/config/app.php`:

```php
'Auth' => Lomi525\FormRedirect\Facades\UserAuth::class,
```

Basic Usage
-----------

Start by creating an `Auth` instance (or use the `Auth` Facade if you are using Laravel):

```php
use Lomi525\FormRedirect\FormRedirector;

$redirector = new FormRedirector();
```

