<?php
    namespace app\controllers;
    use app\core\Controller;
    use app\core\Request;
    use app\core\Response;
    use app\models\LoginForm;
    use app\core\Application;

    class AuthController extends Controller {
        
        public function login(Request $request, Response $response) {
            $loginForm = new LoginForm();

            if ($request->isPost()) {
                $loginForm->loadData($request->getBody());
                
                if ($loginForm->login()) {
                    $response->redirect('/');
                    return;
                }
            }

            /**
             * @params = \app\models\LoginForm->login_errors
             */
            $params = $loginForm->login_errors;
            $this->setLayout('auth');
            return $this->render('login', $params);
        }

        public function logout(Request $request, Response $response) {
            Application::$app->logout();
            $response->redirect('/');
        }

        
    }