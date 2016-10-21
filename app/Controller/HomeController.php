<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 19:33
 */

namespace App\Controller;


class HomeController extends AppController {

    public function index() {
        $this->render('home.index');
    }
}