<?php

use Lomi525\FormRedirect\FormRedirector;

if (! function_exists('form_redirect')) {
    /**
     * Get an instance of the redirector.
     *
     * @param  string|null  $to
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function form_redirect($to = null, $status = 302, $headers = [], $secure = null)
    {
        if (is_null($to)) {
            return app(FormRedirector::class);
        }

        return app(FormRedirector::class)->to($to, $status, $headers, $secure);
    }
}