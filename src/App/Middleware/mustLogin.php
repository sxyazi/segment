<?php

namespace App\Middleware;

class mustLogin
{
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * mustLogin invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface $response PSR7 response
     * @param  callable $next Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        if ($_SESSION['user']) {
            return $next($request, $response);
        }

        return $response->withRedirect($this->router->pathFor('login'));
    }
}
