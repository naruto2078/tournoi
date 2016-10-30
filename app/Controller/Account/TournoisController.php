<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 29/10/2016
 * Time: 17:08
 */

namespace App\Controller\Account;


use Core\HTML\BootstrapForm;

class TournoisController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Tournoi');
        $this->loadModel('Event');
    }

    public function add() {
        if (!empty($_POST)) {

            /*$this->Event->create([
                'nom_categorie' => $_POST['nom_categorie'],
                'id_event' =>  $_GET['event']
            ]);
            ;*/
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.events.add', compact('form'));
    }

}