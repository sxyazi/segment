<?php

namespace App\Controllers;

use App\Models\Item;
use Slim\Http\Request;
use Slim\Http\Response;

class ItemController extends Controller
{
    // 列出项目
    public function index(Request $request, Response $response, array $args)
    {
        $card_id = $args['id'];
        $items = Item::where('card_id', $card_id)->get();

        return $this->view->render($response, 'item/index.twig', compact('items', 'card_id'));
    }

    // 保存项目
    public function store(Request $request, Response $response, array $args)
    {
        $id = Item::insertGetId([
            'card_id' => $args['id'],
            'content' => $request->getParam('content')
        ]);

        return $response->withJson(['code' => 1, 'id' => $id]);
    }

    // 更新项目
    public function update(Request $request, Response $response, array $args)
    {
        Item::where('id', $request->getParam('id'))->update([
            'content' => $request->getParam('content')
        ]);

        return $response->withJson(['code' => 1]);
    }

    // 销毁项目
    public function destroy(Request $request, Response $response, array $args)
    {
        Item::where('id', $request->getParam('id'))->delete();

        return $response->withJson(['code' => 1]);
    }
}
