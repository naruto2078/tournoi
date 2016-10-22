<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 17:33
 */

namespace App\Controller\Account;


use Core\Auth\DbAuth;

class AppController extends \App\Controller\AppController {
    protected $template = 'dashboard';
    public function __construct() {
        parent::__construct();
        //Auth
        $app = \App::getInstance();
        $auth = new DbAuth($app->getDb());
        if(!$auth->logged()){
            $this->forbidden();
        }
    }
}