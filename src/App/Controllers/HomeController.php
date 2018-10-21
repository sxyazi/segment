<?php

namespace App\Controllers;

use App\Models\Card;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {

//        return $response->withRedirect($this->router->pathFor('cards.index'));
    }
}
