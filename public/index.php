<?php
    require_once __DIR__ . "/../vendor/autoload.php";
    use app\core\Application;
    use app\controllers\SiteController;
    use app\controllers\AuthController;
    use app\controllers\ArticleController;

    $app = new Application(dirname(__DIR__));

    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/article', [SiteController::class, 'article']);
    
    $app->router->get('/login', [AuthController::class, 'login']);
    $app->router->post('/login', [AuthController::class, 'login']);
    $app->router->get('/logout', [AuthController::class, 'logout']);
    
    $app->router->get('/register', [AuthController::class, 'register']);
    $app->router->post('/register', [AuthController::class, 'register']);

    $app->router->get('/delete', [ArticleController::class, 'delete']);
    $app->router->post('/delete', [ArticleController::class, 'delete']);

    $app->router->get('/update', [ArticleController::class, 'update']);
    $app->router->post('/update', [ArticleController::class, 'update']);
    
    $app->router->get('/newArticle', [ArticleController::class, 'newArticle']);
    $app->router->post('/newArticle', [ArticleController::class, 'newArticle']);

    $app->run();
