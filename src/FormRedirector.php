<?php
namespace Lomi525\FormRedirect;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Session\Store as SessionStore;

class FormRedirector
{
    /**
     * The URL generator instance.
     *
     * @var \Illuminate\Routing\UrlGenerator
     */
    protected $generator;

    /**
     * The session store instance.
     *
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Create a new Redirector instance.
     *
     * @param  \Illuminate\Routing\UrlGenerator $generator
     * @return void
     */
    public function __construct(UrlGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Create a new redirect response to the given path.
     *
     * @param  string $path
     * @param  int $status
     * @param  array $headers
     * @param  bool $secure
     * @return FormRedirectResponse
     */
    public function to($path, $status = 302, $headers = [], $secure = null)
    {
        $path = $this->generator->to($path, [], $secure);
        return $this->createRedirectResponse($path, $status, $headers);
    }

    /**
     * Create a new redirect response to the previous location.
     *
     * @param  int $status
     * @param  array $headers
     * @param  string $fallback
     * @return FormRedirectResponse
     */
    public function back($status = 302, $headers = [], $fallback = false)
    {
        $path = $this->generator->previous($fallback);
        return $this->to($path, $status, $headers);
    }

    /**
     * Create a new redirect response.
     *
     * @param  string $path
     * @param  int $status
     * @param  array $headers
     * @return FormRedirectResponse;
     */
    protected function createRedirectResponse($path, $status, $headers)
    {
        $formRedirectResponse = new FormRedirectResponse($path, $status, $headers);

        if (isset($this->session)) {
            $formRedirectResponse->setSession($this->session);
        }
        $formRedirectResponse->setRequest($this->generator->getRequest());

        return $formRedirectResponse;
    }
    /**
     * Set the active session store.
     *
     * @param  \Illuminate\Session\Store  $session
     * @return void
     */
    public function setSession(SessionStore $session)
    {
        $this->session = $session;
    }


}