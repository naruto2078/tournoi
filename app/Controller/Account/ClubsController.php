<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 24/10/2016
 * Time: 15:22
 */

namespace App\Controller\Account;


use Core\HTML\BootstrapForm;

class ClubsController extends AppController {
    public function __construct() {
        parent::__construct();
        $this->loadModel('Club');


    }

    public function addClub() {
        $this->loadModel('Club');
        if (!empty($_POST)) {
            $this->Club->create([
                'nom' => $_POST['nomClub']

            ]);
            var_dump($_POST['nomClub']);
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.teams.add', compact('form'));
    }

}