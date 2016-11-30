<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 29/10/2016
 * Time: 17:08
 */

namespace App\Controller\Account;


use App\Serpentin;
use Core\HTML\BootstrapForm;

class TournoisController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Tournoi');
        $this->loadModel('Event');
        $this->loadModel('Team');
        $this->loadModel('Participe');
        $this->loadModel('Poule');
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

if (!empty($_POST['prix'.$i])){
    $prixDef=$_POST['prix'.$i];
}
else{
    $prixDef=0;
}

                $this->Tournoi->create([
                    'nom_categorie' => $_POST["nom_categorie$i"],
                    'genre' => $_POST["genre$i"],
                    'id_event' => $_SESSION['event'],
                    'typeTarif'=> $_POST["typetarif$i"],
                    'prix'=>$prixDef
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

    public function participants() {
        $participants = $this->Participe->participants($_GET['tournoi_id']);
        $estOuvert = $this->Event->query("SELECT inscription_ouverte FROM events WHERE id=?", [$_GET['event_id']], true);

        $req = $this->Team->query("SELECT * FROM teams,participe,clubs WHERE teams.id = team_id AND idClub = clubs.id AND tournoi_id=?", [$_GET['tournoi_id']]);
        $teams = [];
        $teams_i = [];

        $options = [];
        foreach ($req as $item) {
            $teams[$item->name] = intval($item->level);
            $teams_i[] = intval($item->level);
            $options[$item->name] = $item->name;
        }

        arsort($teams);
        $initSerpentin = new Serpentin($teams_i);
        $teamsName = array_keys($teams);
        foreach ($initSerpentin->teams as $k => $v) {
            $initSerpentin->teams[$k] = $teamsName[$k];
        }
        //$serpentin = $initSerpentin->serpentin();
        $divs = $initSerpentin->getDiviseurs(count($teams_i));
        $diviseurs = [];
        foreach ($divs as $k => $v) {
            $diviseurs[$v] = $v . ' groupes de ' . count($teams) / $v;
        }
        $done = false;
        if (!empty($_POST['formule'])) {
            $poules = $initSerpentin->repartition(intval($_POST['formule']));
            $done = true;
            //var_dump($_POST['formule'], $poules);
            $numero = intval($_POST['formule']);


        }
        if (isset($_POST['create'])) {
            $numero = intval($_POST['formule']);
            $les_poules = [];
            for ($i = 1; $i <= $numero; $i++) {
                $les_poules['poule ' . $i] = array();
            }
            foreach ($_POST as $k => $v) {
                if ($k != 'create' && $k != 'formule') {
                    $la_poule = explode('-', $k);
                    $la_poule = $la_poule[0] . ' ' . $la_poule[1];
                    array_push($les_poules[$la_poule], $v);
                }
            }
            var_dump($les_poules);
            foreach ($les_poules as $k => $v) {
                $this->Poule->create([
                    'nom' => $k
                ]);
                $poule_id = $this->Poule->lastInsertId();
                foreach ($v as $item) {
                    $id = $this->Team->query("SELECT id FROM teams WHERE name = ?", [$item], true);
                    $id = $id->id;
                    $this->Participe->query("UPDATE participe SET poule_id=? WHERE team_id=? AND tournoi_id=?", [$poule_id, $id, $_GET['tournoi_id']]);
                    $this->Event->update($_GET['event_id'], ['inscription_ouverte' => 0]);
                }

            }

            header('Location:index.php?p=account.tournois.gerer&event_id=' . $_GET['event_id'] . '&tournoi_id=' . $_GET['tournoi_id']);

        }
        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.participants', compact('participants', 'estOuvert', 'form', 'diviseurs', 'done', 'numero', 'poules', 'options'));
    }

    public function calendrier() {
        $participants = $this->Participe->participantsEtPoules($_GET['tournoi_id']);
        $poules = [];
        $equipes = [];
        foreach ($participants as $participant) {
            $equipes[$participant->name] = $participant->nom;

        }
        asort($equipes);

        foreach ($equipes as $poule) {
            $poules[$poule] = [];

        }


        foreach ($equipes as $k => $v) {
            array_push($poules[$v], $k);
        }
        //var_dump($poules);
        $numero = count($poules);
        $this->render('account.tournois.calendrier', compact('participants','numero','poules'));
    }

}