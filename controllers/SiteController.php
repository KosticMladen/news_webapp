<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Application;
    use app\models\NewsModel;

    class SiteController extends Controller {
        public function home() {
            $params = $this->getDataByCategory();
            return $this->render('home', $params);
        }

        public function article() {
            return $this->render('article');
        }

        public static function siteSetCategories(): array {
            $news_model = new NewsModel;
            $categories = $news_model->getCategories();

            return $categories;
        }
        
        public function getDataByCategory(): array {
            $news_model = new NewsModel;
            $category = Application::$app->request->getBody();
            if (!isset($category['category'])) {
                $category=Application::$app->category;
                $data = $news_model->getNews($category);

                return $data;
            } else {
                $data = $news_model->getNews($category['category']);

                return $data;
            }
        }

    }