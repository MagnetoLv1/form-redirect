<?php
namespace Lomi525\FormRedirect;


use Illuminate\Support\ServiceProvider;

class FormRedirectServiceProvider extends  ServiceProvider
{

    public function boot()
    {

        $this->loadViewsFrom(__DIR__ . '/views', 'FormRedirect');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['form.redirect'] = $this->app->share(function ($app) {
            $formRedirector = new FormRedirector($app['url']);

            // If the session is set on the application instance, we'll inject it into
            // the redirector instance. This allows the redirect responses to allow
            // for the quite convenient "with" methods that flash to the session.
            if (isset($app['session.store'])) {
                $formRedirector->setSession($app['session.store']);
            }

            return $formRedirector;
        });
    }
}