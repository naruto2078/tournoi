<?php

namespace App\Controller;


use Core\Auth\DbAuth;
use Core\HTML\BootstrapForm;

class UsersController extends AppController {

    public function login() {
        $errors = false;
        $this->loadModel('User');
        $profile = null;
        if (!empty($_POST)) {
            $auth = new DbAuth(\App::getInstance()->getDb());
            $profile = $this->User->getInfo($_POST['username']);
            if ($auth->login($_POST['username'], $_POST['password'])) {
                header('Location:index.php?p=account.index&user=' . $profile->username);
            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors', 'profile'));
    }

    public function register() {
        $error_login = false;
        $error_password = false;
        if (!empty($_POST)) {
            $auth = new DbAuth(\App::getInstance()->getDb());
            $error_login = !$auth->checklogin($_POST['username']);
            $error_password = !$auth->checkpassword($_POST['password'], $_POST['password_confirm']);
            if (!$error_login && !$error_password) {
                $auth->register($_POST['username'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('error_login', 'error_password', 'form'));
    }
}