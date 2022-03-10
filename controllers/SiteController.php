<?php
    namespace app\controllers;
    use app\core\Controller;

    class SiteController extends Controller {
        public function home() {
            echo $this->render('home');
        }

        public function article() {
            echo $this->render('article');
        }
    }