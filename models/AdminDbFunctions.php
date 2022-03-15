<?php
    namespace app\models;
    use app\core\Database;
    use app\core\Application;

    class AdminDbFunctions extends Database {
        public function getArticleName($id) {
            $statement = $this->prepare('SELECT news_title FROM news WHERE id=:id');
            $statement->bindValue(':id', $id);
            $statement->execute();
            
            $title = $statement->fetch(\PDO::FETCH_ASSOC);
            
            if ($title) {
                return $title['news_title'];
            } else {
                return false;
            }
        }

        public function removeArticle($id) {
            $statement = $this->prepare('DELETE FROM news WHERE id=:id');
            $statement->bindValue(':id', $id);
            $statement->execute();
            echo 'roki';
            return true;
        }

        public static function fetchNews($id): array {
            $news_model = new NewsModel;
            $id = Application::$app->request->getBody()['id'];
            $data = $news_model->getArticle($id);
            
            return $data;
        }

        public function updateArticle($data) {
            $id = $data['id'];
            $attributes = [];
            foreach ($data as $key => $value) {
                $attributes[] = $key;
            }

            unset($attributes[array_search('id', $attributes)]);

            $params = array_map(fn($attr) => "$attr=:$attr", $attributes);
            $statement = $this->prepare("UPDATE news SET " . implode(', ', $params) . " WHERE id=:id");
            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $data[$attribute]);
            }

            $statement->bindValue(':id', $id);
            $statement->execute();
            return true;
        }
    }