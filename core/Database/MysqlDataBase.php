<?php
namespace Core\DataBase;

use \PDO;

class MysqlDataBase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /**
     * DataBase constructor.
     * @param $db_name string Nom de la base de données
     * @param $db_user string  Nom d'utilisateur
     * @param $db_pass string Mot de passe
     * @param $db_host string Host
     */
    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost') {
        date_default_timezone_set('Europe/Paris');
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }


    /**
     * @return PDO
     */
    private function getPDO() {
        if ($this->pdo == null) {
            $pdo = new PDO('mysql:dbname=tournoivolley;host=localhost;charset=utf8', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }


    /**
     * @param $statement string La requête à effectuer
     * @param $class_name Le nom de la classe de retour
     * @param bool $one Récuperer une ou plusieurs lignes
     * @return mixed
     */
    public function query($statement, $class_name = null, $one = false) {
        $req = $this->getPDO()->query($statement);
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false) {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);

        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }


    /**
     * @return string dernier id enregistré
     */
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
}