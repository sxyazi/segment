<?php

namespace App\Controllers;

use App\Models\Item;
use Slim\Http\Request;
use Slim\Http\Response;

class ItemController extends Controller
{
    // 项目列表
    public function index(Request $request, Response $response, array $args)
    {
        $card_id = $args['id'];
        $items = Item::where('card_id', $card_id)->get();

        return $this->view->render($response, 'card/show.twig', compact('items', 'card_id'));
    }

    // 添加项目
    public function store(Request $request, Response $response, array $args)
    {
        Item::insert([
            'card_id' => $args['id'],
            'content' => $request->getParam('content')
        ]);

        return $response->withJson(['code' => 1]);
    }

    // 修改项目
    public function update(Request $request, Response $response, array $args)
    {
        Item::where('id', $request->getParam('id'))->update([
            'content' => $request->getParam('content')
        ]);

        return $response->withJson(['code' => 1]);
    }
}
