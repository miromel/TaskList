<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\UserModel;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends BaseController
{

    /**
     * User authorization
     */
    public function actionLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

            $errors = [];
            $data = $_POST;

            if (trim($data['login']) == '') {
                $errors[] = 'Введите логин';
            }

            if (trim($data['password']) == '') {
                $errors[] = 'Введите пароль';
            }

            if (!UserModel::getUserByLoginAndPass($data)) {
                $errors[] = 'Неверный логин или пароль';
            }

            if (empty($errors)) {
                $_SESSION['signinUser'] = 'admin';
                header('Location: /');
            } else {
                $this->render('site/login', ['errors' => $errors]);
            }
        }

        $this->render('site/login');
    }


    /**
     * Logout User (Delete user session)
     */
    public function actionLogout()
    {
        unset($_SESSION['signinUser']);
        header('Location: /');
    }

}