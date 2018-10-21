<?php

namespace App\Controllers;

use App\Models\Card;
use App\Models\Item;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, array $args)
    {
        $user = $_SESSION['user'];
        $cardCount = Card::where('user_id', $user->id)->count();
        $itemCount = Item::where('user_id', $user->id)->count();

        return $this->view->render($response, 'home/index.twig', compact('user', 'cardCount', 'itemCount'));
    }
}
