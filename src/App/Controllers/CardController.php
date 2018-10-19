<?php

namespace App\Controllers;

use App\Models\Card;
use Slim\Http\Request;
use Slim\Http\Response;

class CardController extends Controller
{
    // 卡片列表
    public function index(Request $request, Response $response, array $args)
    {
        $cards = Card::where('user_id', $_SESSION['user']->id)->get();
        return $this->view->render($response, 'card/index.twig', compact('cards'));
    }

    // 添加卡片
    public function store(Request $request, Response $response, array $args)
    {
        Card::insert([
            'title'   => $request->getParam('title'),
            'user_id' => $_SESSION['user']->id
        ]);

        return $response->withJson(['code' => 1]);
    }
}
