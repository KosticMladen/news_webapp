<?php
    require_once __DIR__ . "/../vendor/autoload.php";
    use app\core\View;
    use app\core\Controller;
    use app\core\BaseModel;
    // $app = new Application();
    $model = new BaseModel();
    $controller = new Controller($model);
    $view = new View($controller);

    var_dump($view->output());
