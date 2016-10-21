<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 17:10
 */

namespace App\Controller;


use Core\Controller\Controller;

class AppController extends Controller {

    protected $template = 'default';

    public function __construct() {
        $this->viewPath = ROOT . '/app/Views/';
    }

    /**
     * Charge le model :la classe Table correspondante
     * @param $model_name
     */
    public function loadModel($model_name) {
        $this->$model_name = \App::getInstance()->getTable($model_name);
    }
}