<?php
    namespace app\core;

    class Application {
        public BaseModel $model;
        public Controller $controller;
        public View $view;

        public static Application $app;

        public function __construct($rootPath) {
            $this->model = new BaseModel();
            $this->controller = new Controller($this->model);
            $this->view = new View($this->controller);
        }

        public function run() {
            echo $this->view->output()['users_fname'];
        }
    }