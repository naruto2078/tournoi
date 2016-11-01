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
        $this->loadModel('Categorie');
        $nb_tournois = $this->Event->query("SELECT nb_tournois FROM events WHERE id = ?",[$_SESSION['event']],true);

        $nb_tournois = $nb_tournois->nb_tournois;
        $req = $this->Categorie->query("SELECT * FROM categories",null);
        //var_dump($nb_tournois);
        $categories = [];
        foreach ($req as $categorie){
            $categories[$categorie->nom] = $categorie->nom.' ('.$categorie->description.')';
        }

        //Masculin et feminin
        $genres = [
            'Masculin' => 'Masculin',
            'Feminin' => 'Feminin'
        ];
        if (!empty($_POST)) {

            /*$this->Event->create([
                'nom_categorie' => $_POST['nom_categorie'],
                'id_event' =>  $_SESSION['event']
            ]);
            ;*/
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.add', compact('form','nb_tournois','categories','genres'));
    }

}