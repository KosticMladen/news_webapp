<?php
    namespace app\core;
    class Application {
        public string $layout = 'main';
        public BaseModel $model;
        public ?Controller $controller = null;
        public View $view;
        public Router $router;
        public Request $request;
        public Response $response;

        public static Application $app;
        public static string $ROOT_DIR;

        public function __construct($rootPath) {
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->request = new Request();
            $this->response = new Response();
            $this->router = new Router($this->request, $this->response);

            $this->model = new BaseModel();
            $this->view = new View();
        }

        public function run() {
            $this->router->resolve();
        }

        public function getController() {
            return $this->controller;
        }

    }