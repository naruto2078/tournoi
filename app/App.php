<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 16:03
 */
use Core\DataBase\MysqlDataBase;


/**
 * Class App : noyau de l'appli
 * utilise le pattern Singleton
 * @package App
 */
class App {
    public $title = 'Tournoi Volley';
    private $db_instance;
    private static $_instance;

    /**
     * @return App instance de App
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }


    /**
     * Charge la classe Autoloader
     */
    public static function load() {
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getDb() {
        $config = \Core\Config::getInstance(ROOT . '/config/config.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDataBase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

    public function getTable($name) {
        $class_name = 'App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

}