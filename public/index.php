<?php
    require_once __DIR__ . "/../vendor/autoload.php";
    use app\core\Application;
    use app\controllers\SiteController;

    $app = new Application(dirname(__DIR__));

    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/article', [SiteController::class, 'article']);

    $app->run();
