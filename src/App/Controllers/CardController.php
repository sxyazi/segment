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
        $card = Card::create([
            'title'   => $request->getParam('title'),
            'user_id' => $_SESSION['user']->id
        ]);

        return $response->withJson(['code' => 1, 'id' => $card->id]);
    }

    // 更新卡片
    public function update(Request $request, Response $response, array $args)
    {
        $card = Card::find($request->getParam('id'));
        if ($card->user_id === $_SESSION['user']->id) {
            $card->update([
                'title' => $request->getParam('title')
            ]);
        }

        return $response->withJson(['code' => 1]);
    }

    // 销毁卡片
    public function destroy(Request $request, Response $response, array $args)
    {
        $card = Card::find($request->getParam('id'));
        if ($card->user_id === $_SESSION['user']->id) {
            $card->delete();
        }

        return $response->withJson(['code' => 1]);
    }
}
