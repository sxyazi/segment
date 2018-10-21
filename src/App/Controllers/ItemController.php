<?php

namespace App\Controllers;

use App\Models\Card;
use App\Models\Item;
use Slim\Http\Request;
use Slim\Http\Response;

class ItemController extends Controller
{
    // 列出项目
    public function index(Request $request, Response $response, array $args)
    {
        $card = Card::find($args['id']);
        return $this->view->render($response, 'item/index.twig', compact('card'));
    }

    // 保存项目
    public function store(Request $request, Response $response, array $args)
    {
        $item = Item::create([
            'card_id' => $args['id'],
            'content' => $request->getParam('content')
        ]);

        return $response->withJson(['code' => 1, 'id' => $item->id]);
    }

    // 更新项目
    public function update(Request $request, Response $response, array $args)
    {
        Item::whereKey($request->getParam('id'))->update([
            'content' => $request->getParam('content')
        ]);

        return $response->withJson(['code' => 1]);
    }

    // 销毁项目
    public function destroy(Request $request, Response $response, array $args)
    {
        Item::whereKey($request->getParam('id'))->delete();

        return $response->withJson(['code' => 1]);
    }
}
