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
        $this->loadModel('Match');
        $this->loadModel('Results');
        $this->loadModel('Setmatch');
    }

    public function add() {
        $this->loadModel('Categorie');
        $nb_tournois = $this->Event->query("SELECT nb_tournois FROM events WHERE id = ?", [$_SESSION['event']], true);

        $nb_tournois = $nb_tournois->nb_tournois;
        $req = $this->Categorie->query("SELECT * FROM categories", null);
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

                if (!empty($_POST['prix' . $i])) {
                    $prixDef = $_POST['prix' . $i];
                } else {
                    $prixDef = 0;
                }

                if (!empty($_POST["prix"])) {
                    $prixDef = $_POST["prix"];
                } else {
                    $prixDef = 0;
                }

                if (!empty($_POST)) {

                    $this->Tournoi->create([
                        'nom_categorie' => $_POST["nom_categorie$i"],
                        'genre' => $_POST["genre$i"],
                        'id_event' => $_SESSION['event'],

                        'typeTarif' => $_POST["typetarif$i"],
                        'prix' => $prixDef

                        /*'typeTarif' => $_POST["typetarif"],
                        'prix' => $prixDef*/

                    ]);
                }

                header('Location:index.php?p=account.index&user=' . $_SESSION['user']);

            }
            $form = new BootstrapForm($_POST);
            $this->render('account.tournois.add', compact('form', 'nb_tournois', 'categories', 'genres'));

            $_SESSION['width'] = 100 / intval($nb_tournois);
        }

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

        $req = $this->Team->query("SELECT DISTINCT teams.id, teams.name, teams.level,teams.idClub,team_id,tournoi_id,tour,poule_id,a_paye,clubs.nom FROM teams,participe,clubs WHERE teams.id = team_id AND idClub = clubs.id AND tournoi_id=? AND tour=1", [$_GET['tournoi_id']]);
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
        $divs = $initSerpentin->getDiviseurs(count($teams_i));
        $diviseurs = [];
        foreach ($divs as $k => $v) {
            $diviseurs[$v] = $v . ' groupes';
        }
        $done = false;
        if (!empty($_POST['formule'])) {
            $poules = $initSerpentin->repartition(intval($_POST['formule']));
            $done = true;
            $numero = intval($_POST['formule']);
        }
        $groupesCrees = false;
        if (isset($_POST['create'])) {
            $groupesCrees = true;
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

            $pouleId = $this->Participe->query("SELECT * FROM participe", false);
            foreach ($pouleId as $item) {
                for ($i = 1; $i <= $numero; $i++)
                    $all_poule_id[$item->tournoi_id][$i] = $item->poule_id;

            }

            header('Location:index.php?p=account.tournois.etablircalendrier&event_id=' . $_GET['event_id'] . '&tournoi_id=' . $_GET['tournoi_id']);


        }

        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.participants', compact('participants', 'estOuvert', 'form', 'diviseurs', 'done', 'numero', 'poules', 'options', 'groupesCrees', 'matches', 'all_teams', 'all_poule_id'));
    }

    public function etablircalendrier() {
        $participants = $this->Participe->participantsEtPoules($_GET['tournoi_id']);
        $poules = [];
        $equipes = [];
        $equipes_id = [];
        $poules_id = [];
        foreach ($participants as $participant) {
            $equipes[$participant->name] = $participant->nom;
            $equipes_id[$participant->name] = $participant->team_id;
            $poules_id[$participant->nom] = $participant->poule_id;
        }
        asort($equipes);

        foreach ($equipes as $poule) {
            $poules[$poule] = [];
        }

        foreach ($equipes as $k => $v) {
            array_push($poules[$v], $k);
            $nbJournees = count($poules[$v]) - 1;
        }
        $numero = count($poules);

        $rencontres = [];

        $indice = 1;

        foreach ($poules as $poule) {
            $nbJournees = count($poule) - 1;
            $rencontres["poule $indice"] = [];
            $journees = [];
            for ($i = 0; $i < $nbJournees; $i++) {
                $journees[$i] = [];
            }
            $cpt = 0;
            for ($j = 0; $j < $nbJournees; $j++) {

                for ($k = $j + 1; $k < $nbJournees + 1; $k++) {
                    array_push($journees[$cpt], [$poule[$j], $poule[$k]]);

                    if ($cpt < $nbJournees - 1) {
                        $cpt++;
                    } else {
                        $cpt = 0;
                    }

                }
            }
            //petit probleme au niveau d'une equipe qui se repete deux fois à la 1ere et a la derniere journee
            $m1 = $journees[0][count($journees[0]) - 1];

            $journees[0][count($journees[0]) - 1] = $journees[count($journees) - 1][count($journees[count($journees) - 1]) - 1];
            $journees[count($journees) - 1][count($journees[count($journees) - 1]) - 1] = $m1;

            foreach ($journees as $k => $journee) {
                foreach ($journee as $match) {
                    $this->Match->create([
                        'group_id' => $poules_id["poule $indice"],
                        'team_id_home' => $equipes_id[$match[0]],
                        'team_id_away' => $equipes_id[$match[1]]
                    ]);
                }
            }
            array_push($rencontres["poule $indice"], $journees);
            $indice++;

        }
        $matches = $this->Match->matchesTournoi($_GET['tournoi_id']);
        var_dump($_POST, $matches);
        $equipes_ = $this->Team->query("SELECT * FROM teams WHERE id IN (SELECT team_id FROM participe WHERE tournoi_id=?)", [$_GET['tournoi_id']], false);
        $all_teams = [];
        foreach ($equipes_ as $item) {
            $all_teams[$item->id] = $item->name;
        }
        if (!empty($_POST)) {
            for ($i = 0; $i < count($matches); $i++) {
                $time_aux = $_POST['date' . $matches[$i]->id];
                $time_aux = $time_aux . ' ' . $_POST['heure' . $matches[$i]->id] . ':' . $_POST['minute' . $matches[$i]->id] . ':00';
                $time = strtotime($time_aux);
                $date = date('Y-m-d H:i:s', $time);
                $this->Match->update($matches[$i]->id, [
                    'date' => $date
                ]);
            }
        }
        var_dump($date);
        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.etablircalendrier', compact('form', 'matches', 'all_teams'));

    }

    public function calendrier() {
        $participants = $this->Participe->participantsEtPoulesParTour($_GET['tournoi_id'], 1);
        $organisateur = $this->Participe->query("SELECT organisateur FROM events WHERE events.id = ? ",[$_GET['event_id']],true);
        $poules = [];
        $equipes = [];
        $equipes_id = [];
        foreach ($participants as $participant) {
            $equipes[$participant->name] = $participant->nom;
            $equipes_id[$participant->nom] = $participant->team_id;

        }
        asort($equipes);


        foreach ($equipes as $poule) {
            $poules[$poule] = [];
        }

        foreach ($equipes as $k => $v) {
            array_push($poules[$v], $k);
        }
        $numero = count($poules);

        $matches = $this->Match->matchesTournoi($_GET['tournoi_id']);
        $equipes_ = $this->Team->query("SELECT * FROM teams WHERE id IN (SELECT team_id FROM participe WHERE tournoi_id=?)", [$_GET['tournoi_id']], false);
        $score = $this->Results->query("SELECT *  FROM results", false);
        $all_teams = [];

        foreach ($equipes_ as $item) {
            $all_teams[$item->id] = $item->name;
        }


        foreach ($score as $item) {
            $all_score[$item->match_id][0] = $item->score_home;
            $all_score[0][$item->match_id] = $item->score_away;
        }

//var_dump($all_score);
        if (!empty($_POST['idMatch1'])) {

            $dejascrorer = $this->Results->query("SELECT count(*) AS nb_set FROM results ,setmatch WHERE results.id = setmatch.id_results AND results.match_id=? GROUP BY results.match_id", [$_POST['idMatch1']]);//verifie que le score de ce match a déja été inserer

            foreach ($dejascrorer as $item) {
                $nbsetDansData = $item->nb_set;
            }

            //recupere l'id du resultat du match
            $identifiantRes = $this->Results->query("SELECT * FROM results WHERE match_id=?", [$_POST['idMatch1']]);
            foreach ($identifiantRes as $tuple) {
                $idRes = $tuple->id;
            }
            //recuperer le nombre de set

            $nombreSet = $_POST['setNb1'];
            //recuperer l'id des equipes dun match
            $getIdHomeAway = $this->Results->query("SELECT * FROM results, matches WHERE results.match_id= matches.id AND matches.id=?", [$_POST['idMatch1']]);
            foreach ($getIdHomeAway as $tuple) {
                $teamHome = $tuple->team_id_home;
                $teamAway = $tuple->team_id_away;
            }
            if (isset($nbsetDansData)) {
                if ($nbsetDansData == $nombreSet) {
                    var_dump("deja validé");
                } else {
                    var_dump($nbsetDansData, $nombreSet);
                    for ($i = 1; $i <= $nombreSet; $i++) {

                        if ($_POST["idScoreH$i"] > $_POST["idScoreA$i"]) {
                            $teamWinner = $teamHome;
                        } else {
                            $teamWinner = $teamAway;
                        }

                        $this->Setmatch->create([

                            'id_results' => $idRes,
                            'score_home' => $_POST["idScoreH$i"],
                            'score_away' => $_POST["idScoreA$i"],
                            'id_gagnant' => $teamWinner
                        ]);
                    }
                }

            } else {

                var_dump("nbsetDansData est null");
            }


        }

        if (!empty($_POST['idMatchMod1'])) {
            //recupere l'id du resultat du match
            $identifiantRes = $this->Results->query("SELECT * FROM results WHERE match_id=?", [$_POST['idMatchMod1']]);
            foreach ($identifiantRes as $tuple) {
                $idRes = $tuple->id;
            }

//recuperer le nombre de set

            $nombreSet = $_POST['setNbMod1'];

//recuperer l'id des equipes dun match
            $getIdHomeAway = $this->Results->query("SELECT * FROM results, matches WHERE results.match_id= matches.id AND matches.id=?", [$_POST['idMatchMod1']]);
            foreach ($getIdHomeAway as $tuple) {
                $teamHome = $tuple->team_id_home;
                $teamAway = $tuple->team_id_away;
            }


            $dejascrorer = $this->Results->query("SELECT count(*) AS nb_set FROM results ,setmatch WHERE results.id = setmatch.id_results AND results.match_id=? GROUP BY results.match_id", [$_POST['idMatchMod1']]);//verifie que le score de ce match a déja été inserer

            foreach ($dejascrorer as $item) {
                $nbsetDansData = $item->nb_set;
            }

            if (isset($nbsetDansData)) {
                if ($nbsetDansData == $nombreSet) {
                    var_dump($nombreSet, $nbsetDansData);

                    for ($i = 1; $i <= $nombreSet; $i++) {

                        if ($_POST["idScoreHMod$i"] > $_POST["idScoreAMod$i"]) {
                            $teamWinner = $teamHome;
                        } else {
                            $teamWinner = $teamAway;
                        }

                        $this->Setmatch->query("UPDATE setmatch SET score_home=?,score_away=? ,id_gagnant=? WHERE id_results=?", [$_POST["idScoreHMod$i"], $_POST["idScoreAMod$i"], $teamWinner, $idRes]);


                    }
                } else {
                    var_dump("ajouter le score d'abord");
                }
            } else {
                var_dump("nbsetDansData est null");
            }

        }

        /*if (!empty($_POST['idMatch2']) && !empty($_POST['idScoreH2']) && !empty($_POST['idScoreA2'])) {
            $scoreExistant = $this->Results->query("SELECT * FROM results WHERE match_id =?", [$_POST['idMatch2']]);//teste si le score a déja ete ajoute

            if ($scoreExistant) {
                $this->Results->query("UPDATE results SET score_home=?,score_away=? WHERE match_id=?", [$_POST['idScoreH2'], $_POST['idScoreA2'], $_POST['idMatch2']]);
            }

        }*/
        //$this->render('account.tournois.calendrier', compact('participants', 'numero', 'poules','matches','all_teams','all_score'));

        /*var_dump($all_teams);*/
        //var_dump($matches);
        //var_dump($equipes);

        if (!empty($_POST['idPoule']) && !empty($_POST['nombreSet']) && !empty($_POST['nombrePoint'])) {
            $setPointExistant = $this->Poule->query("SELECT nb_set, nb_point FROM poules WHERE id =?", [$_POST['idPoule']]); //teste si les sets et les points sont deja saisi
            foreach ($setPointExistant as $tuple) {
                if ($tuple->nb_set != 0 && $tuple->nb_point != 0) {
                    $set = $tuple->nb_set;
                    $point = $tuple->nb_point;
                } else {
                    $set = 0;
                    $point = 0;
                }
            }

            if ($set == 0 && $point == 0) {
                //var_dump($setPointExistant->nb_set);
                $this->Poule->query("UPDATE poules SET nb_set=?,nb_point=? WHERE id =?", [$_POST['nombreSet'], $_POST['nombrePoint'], $_POST['idPoule']]);
            } else {
                var_dump("dejaInsere");
            }
        }


        $equipes_tmp = $this->Team->query("SELECT teams.id, teams.name, poule_id,poules.nom FROM teams,poules,participe WHERE participe.poule_id = poules.id AND participe.team_id = teams.id AND participe.tournoi_id=?", [$_GET['tournoi_id']], false);
        $lesPoules = [];
        foreach ($equipes_tmp as $item) {
            $all_teams_poule[$item->name] = $item->nom;
            $lesPoules[$item->nom] = $item->nom;
        }

        $pouleId = $this->Participe->query("SELECT * FROM participe P,poules po WHERE P.poule_id = po.id AND P.tournoi_id = ?", [$_GET['tournoi_id']], false);
        //   var_dump($pouleId);

        foreach ($pouleId as $item) {

            $all_poule_id[$item->nom][$item->tournoi_id] = $item->id;
            $all_nb_set[$item->nom][$item->tournoi_id] = $item->nb_set;

        }
        $querySetByTeamAndMatch = $this->Results->query("SELECT * FROM results, matches,setmatch WHERE results.match_id= matches.id AND results.id=setmatch.id_results");
        $compt = 1;
        foreach ($querySetByTeamAndMatch as $tuple) {
            $all_set_by_team_match[$compt][$tuple->match_id][$tuple->team_id_home] = $tuple->score_home;
            $all_set_by_team_match[$compt][$tuple->match_id][$tuple->team_id_away] = $tuple->score_away;
            $compt++;
        }
        //var_dump($all_set_by_team_match);


        $this->render('account.tournois.calendrier', compact('organisateur','participants', 'numero', 'poules', 'matches', 'all_teams', 'all_teams_poule', 'lesPoules', 'all_score', 'all_poule_id', 'all_nb_set'));
    }

    public function actualiser() {

        $tour = $this->Participe->query("SELECT MAX(tour) AS tour_max FROM participe WHERE tournoi_id=?", [$_GET['tournoi_id']], true);
        //var_dump($tour);
        $participants = $this->Participe->participantsEtPoulesParTour($_GET['tournoi_id'], $tour->tour_max);
        //var_dump($participants);

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
        $numero = count($poules);

        $equipes_ = $this->Team->query("SELECT * FROM teams WHERE id IN (SELECT team_id FROM participe WHERE tournoi_id=? AND tour=?)", [$_GET['tournoi_id'], $tour->tour_max], false);
        $all_teams = [];
        $all_teams_id = [];
        $all_teams_reverse = [];
        foreach ($equipes_ as $item) {
            $all_teams[$item->id] = $item->name;
            $all_teams_reverse[$item->name] = $item->id;
        }
        $equipes_tmp = $this->Team->query("SELECT teams.id, teams.name, poule_id,poules.nom FROM teams,poules,participe WHERE participe.poule_id = poules.id AND participe.team_id = teams.id AND participe.tournoi_id=? AND tour=?", [$_GET['tournoi_id'], $tour->tour_max], false);
        $lesPoules = [];
        foreach ($equipes_tmp as $item) {
            $all_teams_poule[$item->name] = $item->nom;
            $lesPoules[$item->nom] = $item->nom;
        }


        /*Mise en place des matches du prochain tour*/
        $done = false;
        $options = [];
        if (isset($_POST["btn1"])) {
            $equipes_prochainTour = [];
            $nbEq = 0;
            foreach ($lesPoules as $lapoule) {
                $nbEq += count($_POST[str_replace(" ", "_", $lapoule)]);
            }

            for ($i = 0; $i < $nbEq; $i++) {
                foreach ($lesPoules as $lapoule) {

                }
            }
            foreach ($lesPoules as $lapoule) {
                foreach ($_POST[str_replace(" ", "_", $lapoule)] as $item) {
                    $equipes_prochainTour[] = $item;
                    $options[$all_teams_reverse[$item]] = $item;
                }

            }
            //var_dump($equipes_prochainTour);
            $rencontres = $this->tirage($equipes_prochainTour);
            $_SESSION["rencontres"] = $rencontres;
            /*for ($i = 0; $i < count($rencontres); $i++) {
                printf('%s vs %s<br />%s', $rencontres[$i], $rencontres[++$i], PHP_EOL);
            }*/
            $done = true;

        }
        $phases = [32 => "16e", 16 => "Huitièmes", 8 => "Quarts", 4 => "Demi-finales", 2 => "Finale"];

        if (isset($_POST["btn2"])) {
            $rencontres = $_SESSION["rencontres"];
            var_dump($rencontres);
            for ($i = 0; $i < count($rencontres) / 2; $i++) {
                $home = $_POST[$phases[count($rencontres)] . 'home' . $i];
                $away = $_POST[$phases[count($rencontres)] . 'away' . $i];
                $val = $i + 1;
                $this->Poule->create([
                    'nom' => $phases[count($rencontres)] . ' ' . $val,
                ]);
                $poule_id = $this->Poule->lastInsertId();
                $time_aux = $_POST['date' . $i];
                $time_aux = $time_aux . ' ' . $_POST['heure' . $i] . ':' . $_POST['minute' . $i] . ':00';
                $time = strtotime($time_aux);
                $date = date('Y-m-d H:i:s', $time);

                $this->Participe->create([
                    'team_id' => $home,
                    'tournoi_id' => $_GET['tournoi_id'],
                    'tour' => intval($tour->tour_max) + 1,
                    'poule_id' => $poule_id,
                    'a_paye' => 1
                ]);
                $this->Participe->create([
                    'team_id' => $away,
                    'tournoi_id' => $_GET['tournoi_id'],
                    'tour' => intval($tour->tour_max) + 1,
                    'poule_id' => $poule_id,
                    'a_paye' => 1
                ]);
                $this->Match->create([
                    'date' => $date,
                    'group_id' => $poule_id,
                    'team_id_home' => $home,
                    'team_id_away' => $away
                ]);
                //var_dump($home, $away, $date);
            }
        }

        //CONSOLANTE
        if (isset($_POST['option_consolante'])) {
            if (isset($_POST['consolante'])) {
                $teams = [];
                $i = 0;
                foreach ($_POST['consolante'] as $team_consolante) {
                    $teams[++$i] = $team_consolante;
                }
                $serpentin = new Serpentin($teams);
                $consolante = $serpentin->repartition(1);
                //créer le tournoi consolante
                $infos = $this->Tournoi->allbyEvent($_GET['event_id']);

                /*$this->Tournoi->create([
                    'genre' => $infos->genre,
                    'nom_categorie' => $infos->nom_categorie,
                    'id_event' => $infos->id_event
                ]);
                //$this->Poule->create([
                  //  'nom' => 'consolante'
                //]);
                foreach ($consolante as $item) {
                    foreach ($item as $value) {
                        $this->Participe->create([
                            'team_id' => $all_teams_reverse[$value],
                            'tournoi_id' => $this->Tournoi->lastInsertId(),
                            'tour' => 1,
                            //'poule_id' => $this->Poule->lastInsertId(),
                            'a_paye' => 1
                        ]);
                    }
                }
                */
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('account.tournois.actualiser', compact('form', 'participants', 'numero', 'poules', 'all_teams', 'lesPoules', 'all_teams_poule', 'rencontres', 'phases', 'done', 'options', 'all_teams_reverse', 'tour'));
    }

    private function tirage($teams) {

        $count = count($teams);

        // Order players.
        for ($i = 0; $i < log($count / 2, 2); $i++) {
            $out = array();

            foreach ($teams as $team) {
                $splice = pow(2, $i);

                $out = array_merge($out, array_splice($teams, 0, $splice));

                $out = array_merge($out, array_splice($teams, -$splice));
            }

            $teams = $out;
        }

        // Print match list.
        /*for ($i = 0; $i < $count; $i++) {
            printf('%s vs %s<br />%s', $teams[$i], $teams[++$i], PHP_EOL);
        }*/
        return $teams;

    }


}
