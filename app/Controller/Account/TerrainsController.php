<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 14/12/2016
 * Time: 00:40
 */

namespace App\Controller\Account;


use Core\HTML\BootstrapForm;

class TerrainsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Terrain');
    }

    public function add() {
        if (!empty($_POST)) {
            $this->Terrain->create([
                'nom' => $_POST['nom'],
                'ville' => $_POST['ville']
            ]);
        }

        $form = new BootstrapForm($_POST);
        $this->render("account.terrains.add",compact('form'));
    }
}