<?php

namespace App\Controllers;

use App\Models\Card;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class CardController extends Controller
{
    // 卡片列表
    public function index(Request $request, Response $response, array $args)
    {
        $user = User::find($_SESSION['user']->id);
        return $this->view->render($response, 'card/index.twig', compact('user'));
    }

    // 添加卡片
    public function store(Request $request, Response $response, array $args)
    {
        Card::create([
            'title'   => $request->getParam('title'),
            'user_id' => $_SESSION['user']->id
        ]);

        return $response->withJson(['code' => 1]);
    }
}
