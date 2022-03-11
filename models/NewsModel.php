<?php
    namespace app\models;
    use app\core\Application;

    class NewsModel {
        public function getCategories() {
            $categories = [];
            $statement = Application::$app->db->pdo->query('SELECT DISTINCT category FROM news');
            while ($row=$statement->fetch(\PDO::FETCH_ASSOC)) {
                $categories[] = $row['category'];
            }
            return $categories;
        }

        public function getNews($category) {
            if ($category === 'all') {
                $statement = Application::$app->db->pdo->query('SELECT id, news_title, news_image FROM news');
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

                return $result;
            }

            //with $category argument;
            
            $statement = Application::$app->db->pdo->prepare("SELECT id, news_title, news_image FROM news WHERE category LIKE :category");
            $statement->execute(array(':category' => $category));
            
            if ($statement->rowCount() === 0) {
                return '<h1>Wrong category</h1>';
            } else {
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            }
        }
    }