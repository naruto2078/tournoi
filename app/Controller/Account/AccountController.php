<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 19/10/2016
 * Time: 13:39
 */

namespace App\Controller\Account;


class AccountController extends AppController {

    public function index(){
        $this->render('account.index');
    }
}