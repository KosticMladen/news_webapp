<?php
    namespace app\core;
    class Application {
        public string $layout = 'main';
        public string $category = 'all';

        public Database $db;
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

            $this->db = new Database();
            $this->view = new View();
        }

        public function run() {
            echo $this->router->resolve();
        }

        public function getController() {
            return $this->controller;
        }

    }