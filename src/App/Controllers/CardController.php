<?php

namespace App\Controllers;

use App\Models\Card;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class CardController extends Controller
{
    // 列出卡片
    public function index(Request $request, Response $response, array $args)
    {
        $user = User::find($_SESSION['user']->id);
        return $this->view->render($response, 'card/index.twig', compact('user'));
    }

    // 保存卡片
    public function store(Request $request, Response $response, array $args)
    {
        Card::create([
            'title'   => $request->getParam('title'),
            'user_id' => $_SESSION['user']->id
        ]);

        return $response->withJson(['code' => 1]);
    }

    // 更新卡片
    public function update(Request $request, Response $response, array $args)
    {
    }

    // 销毁卡片
    public function destroy(Request $request, Response $response, array $args)
    {
        Card::whereKey($request->getParam('id'))->delete();

        return $response->withJson(['code' => 1]);
    }
}
