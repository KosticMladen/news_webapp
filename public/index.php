<?php
    require_once __DIR__ . "/../vendor/autoload.php";
    use app\core\Application;
    use app\controllers\SiteController;
    use app\controllers\AuthController;

    $app = new Application(dirname(__DIR__));

    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/article', [SiteController::class, 'article']);
    
    $app->router->get('/login', [AuthController::class, 'login']);
    $app->router->post('/login', [AuthController::class, 'login']);
    $app->router->get('/logout', [AuthController::class, 'logout']);

    $app->run();
