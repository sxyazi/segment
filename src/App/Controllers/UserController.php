<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class  UserController extends Controller
{
    public function login(Request $request, Response $response)
    {
        if ('POST' == $request->getMethod()) {
            $user = User::where('name', $request->getParam('name'))->first();
            if (!$user) {
                return $response->withJson(['code' => 0, 'msg' => '用户不存在！']);
            }

            if (md5($request->getParam('password')) !== $user->password) {
                return $response->withJson(['code' => 0, 'msg' => '密码错误！']);
            }

            $_SESSION['user'] = $user;
            return $response->withJson(['code' => 1]);
        }

        return $this->view->render($response, 'user/login.twig');
    }
}
