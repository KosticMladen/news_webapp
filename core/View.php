<?php
    namespace app\core;

    class View {
        public $controller;

        public function __construct(Controller $controller) {
            $this->controller = $controller;
        }

        public function output() {
            return $this->controller->test();
        }
    }