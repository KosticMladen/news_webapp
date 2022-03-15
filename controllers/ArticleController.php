<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\core\Response;
    use app\models\AdminDbFunctions;
    use app\core\Application;

    class ArticleController extends Controller {
        public AdminDbFunctions $adminDb;

        public function __construct() {
            $this->adminDb = new AdminDbFunctions();
        }

        public function delete(Request $request, Response $response) {
            if ($request->isPost()) {
                $id = $request->getBody()['id'];
                $this->adminDb->removeArticle($id);
                Application::$app->session->setFlash('success', 'Article Deleted successfully!');
                $response->redirect('/');
            }

            $this->setLayout('updateDelete');
            return $this->render('delete');
        }

        public function update(Request $request, Response $response) {
            if ($request->isPost()) {
                $data = $request->getBody();
                if ($data['news_title'] && $data['news_body']) {
                    $this->adminDb->updateArticle($data);
                    
                    Application::$app->session->setFlash('success', 'Article Updated successfully!');
                    $response->redirect('/');
                }
            }
            $this->setLayout('updateDelete');
            return $this->render('update');
        }
    }