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
        $this->loadModel('Team');
        $this->loadModel('Participe');
    }

    public function add() {
        $this->loadModel('Categorie');
        $nb_tournois = $this->Event->query("SELECT nb_tournois FROM events WHERE id = ?", [$_SESSION['event']], true);

        $nb_tournois = $nb_tournois->nb_tournois;
        $req = $this->Categorie->query("SELECT * FROM categories", null);
        //var_dump($nb_tournois);
        $categories = [];
        foreach ($req as $categorie) {
            $categories[$categorie->nom] = $categorie->nom . ' (' . $categorie->description . ')';
        }

        //Masculin et feminin
        $genres = [
            'Masculin' => 'Masculin',
            'Feminin' => 'Feminin'
        ];
        if (!empty($_POST)) {

            for ($i = 1; $i <= intval($nb_tournois); $i++) {
                $this->Tournoi->create([
                    'nom_categorie' => $_POST["nom_categorie$i"],
                    'genre' => $_POST["genre$i"],
                    'id_event' => $_SESSION['event']
                ]);
            }

            header('Location:index.php?p=account.index&user=' . $_SESSION['user']);

        }
        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.add', compact('form', 'nb_tournois', 'categories', 'genres'));

        $_SESSION['width'] = 100 / intval($nb_tournois);
        var_dump($_SESSION['width']);
        //require ROOT.'/app/Views/templates/dashboard.php' ;
    }

    public function tournoiByEvent() {
        $id = $_GET["event_id"];
        $tournois = $this->Tournoi->tournoiByEvent($id);
        $this->render('account.tournois.tournoiByEvent', compact('tournois'));

    }

    public function detailtournoi() {
        $tournois = $this->Tournoi->allByEvent($_GET['event_id']);
        $this->render('account.tournois.detailtournoi', compact('form', 'tournois', 'teams'));
    }

    public function infos() {
        $tournoi = $this->Tournoi->query("SELECT * FROM tournois WHERE id=? ", [$_GET['tournoi_id']], true);
        $this->render('account.tournois.infos', compact('tournoi'));
    }


    public function gerer() {
        $tournoi = $this->Tournoi->query("SELECT * FROM tournois WHERE id=? AND id_event IN(SELECT id FROM events WHERE organisateur=?)", [$_GET['tournoi_id'], $_SESSION['auth']], true);
        if (!$tournoi) {
            $this->notFound();
        }
        $inscrits = $this->Participe->nbInscrits($_GET['tournoi_id']);
        $this->render('account.tournois.gerer', compact('inscrits', 'tournoi'));
    }

    public function register() {
        $tournois = $this->Tournoi->allByEvent($_GET['event_id']);

        $req = $this->Team->query("SELECT teams.id, teams.name,teams.level, teams.id, clubs.nom FROM teams, clubs WHERE idClub = clubs.id AND idClub IN (SELECT id FROM clubs WHERE idUser =?)", [$_SESSION['auth']], false);
        $teams = [];
        foreach ($req as $team) {
            $teams[$team->id] = $team->name;
        }

        if (!empty($_POST)) {

            $dejainscrit = $this->Participe->query("SELECT * FROM participe WHERE team_id =?", [$_POST['team']]);//verifie que l'equipe n'est pas déja inscrite à ce tournoi
            if (!$dejainscrit) {
                $this->Participe->create([
                    'team_id' => $_POST['team'],
                    'tournoi_id' => $_POST['id']
                ]);
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.register', compact('form', 'tournois', 'teams'));
    }

    public function participants(){
        $participants = $this->Participe->participants($_GET['tournoi_id']);

        $this->render('account.tournois.participants',compact('participants'));
    }

}