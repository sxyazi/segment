<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        return $this->renderer->render($response, 'index.phtml', $args);
    }
}
