<?php
    namespace app\core;

    class Controller {
        private $model;

        public function __construct(BaseModel $model) {
             $this->model = $model;
        }

        public function test() {
            return $this->model->test();
        }
    }