<?php
namespace Lomi525\FormRedirect\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: anyman
 * Date: 2016-12-13
 * Time: 오후 12:20
 */
class FormRedirector extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'form.redirect';
    }
}