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

            for($i=1;$i<= intval($nb_tournois); $i++){
                $this->Tournoi->create([
                    'nom_categorie' => $_POST["nom_categorie$i"],
                    'genre'=> $_POST["genre$i"],
                    'id_event' =>  $_SESSION['event']
                ]);
            }

            header('Location:index.php?p=account.index&user='.$_SESSION['user']);

        }
        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.add', compact('form','nb_tournois','categories','genres'));

        $_SESSION['width'] = 100/intval($nb_tournois);
        var_dump($_SESSION['width']);
        //require ROOT.'/app/Views/templates/dashboard.php' ;
    }

    public function tournoiByEvent(){
$id = $_GET["event_id"];
        $tournois = $this->Tournoi->tournoiByEvent($id);
        $this->render('account.tournois.tournoiByEvent',compact('tournois'));

    }

}