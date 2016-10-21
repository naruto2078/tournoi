<?php

namespace Core\Auth;


use Core\DataBase\MysqlDataBase;

/**
 * Class DbAuth gère l'authentification par base de données (login, mot de passe...)
 * @package Core\Auth
 */
class DbAuth {

    private $db;

    public function __construct(MysqlDataBase $db) {
        $this->db = $db;
    }

    public function getUserId() {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
        return false;
    }

    public function login($username, $password) {
        $user = $this->db->prepare("SELECT * FROM users WHERE username =?", [$username], null, true);
        if ($user) {
            if ($user->password === md5($password)) {
                $_SESSION['auth'] = $user->id;
                $_SESSION['user'] = $user->username;
                return true;
            }
        }
        return false;
    }

    public function logged() {
        return isset($_SESSION['auth']);
    }

    public function checklogin($username) {
        $user = $this->db->prepare("SELECT * FROM users WHERE username =?", [$username], null, true);
        if (!$user) {
            return true;
        }
        return false;
    }

    public function checkpassword($password, $password_confirm) {
        return $password == $password_confirm;
    }
}