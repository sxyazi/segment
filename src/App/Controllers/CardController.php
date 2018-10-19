<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class CardController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'card/index.twig');
    }

    public function show(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'card/show.twig');
    }
}
