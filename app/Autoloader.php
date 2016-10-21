<?php

namespace App;
/**
 * Class Autoloader
 */
class Autoloader {

    /**
     * Enregistre notre autoloader
     */
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class) {
        //Charger seulement les classes du "sous-namespace"
        if (strpos($class, __NAMESPACE__ . DIRECTORY_SEPARATOR) === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
            require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
        }
    }
}