<?php

use Slim\Http\Response;
use Slim\Http\Request;
use CustomApi\Controller\UsersController;
use League\OAuth2\Server\Middleware\ResourceServerMiddleware;
use League\OAuth2\Server\ResourceServer;
// error_reporting(1);

//------------------------BostelCRM routes------------------------------ //
$app->post(
    '/register',
    function (Request $request, Response $res) {
        $usersController = new UsersController();
        $usersController->register($request, $res);
    }
);

$app->post(
    '/add_sub_user',
    function (Request $request, Response $res) {
        $usersController = new UsersController();
        $usersController->register($request, $res);
    }
)->add(new ResourceServerMiddleware($app->getContainer()->get(ResourceServer::class)));
