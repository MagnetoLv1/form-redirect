<?php
namespace Lomi525\FormRedirect;


use Illuminate\Support\ServiceProvider;

class FormRedirectServiceProvider extends  ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['form.redirect'] = $this->app->share(function ($app) {
            $poster = new Poster($app['url']);

            // If the session is set on the application instance, we'll inject it into
            // the redirector instance. This allows the redirect responses to allow
            // for the quite convenient "with" methods that flash to the session.
            if (isset($app['session.store'])) {
                $poster->setSession($app['session.store']);
            }

            return $poster;
        });
    }
}