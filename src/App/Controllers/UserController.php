<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as V;

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

    public function logout(Request $request, Response $response)
    {
        unset($_SESSION['user']);
        return $response->withRedirect($this->router->pathFor('login'));
    }

    public function register(Request $request, Response $response)
    {
        if ('POST' == $request->getMethod()) {
            $validator = $this->validator->validate($request, [
                'name'     => V::length(4, 25)->alnum('_')->noWhitespace()->unique(User::class, 'name'),
                'password' => V::length(8, 30)->alnum('_')->noWhitespace()
            ]);

            if (!$validator->isValid()) {
                $errors = $validator->getErrors();
                return $response->withJson(['code' => 0, 'msg' => current(current($errors))]);
            }

            $user = User::create([
                'name'     => $request->getParam('name'),
                'password' => $request->getParam('password')
            ]);
            $_SESSION['user'] = $user;

            return $response->withJson(['code' => 1]);
        }

        return $this->view->render($response, 'user/register.twig');
    }
}
