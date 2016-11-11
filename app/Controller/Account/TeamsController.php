<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 24/10/2016
 * Time: 15:22
 */

namespace App\Controller\Account;


use Core\HTML\BootstrapForm;

class TeamsController extends AppController {
    public function __construct() {
        parent::__construct();
        $this->loadModel('Team');
        $this->loadModel('Player');
        $this->loadModel('Club');

    }

    public function add() {
        $errors = false;
        if (!empty($_POST)) {
            if ($this->Club->clubExist($_POST['nomClub'])) {
                $errors = true;
            } else {
                $this->Club->create([
                    'nom' => $_POST['nomClub'],
                    'idUser' => $_SESSION['auth']
                ]);
            }
            var_dump($id = $this->Club->getid($_POST['nomClub']));
            $this->Team->create([
                'name' => $_POST['nomTeam'],
                'idClub' => $id->id
            ]);
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.teams.add', compact('form', 'errors'));
    }

    public function myteams() {
        $teams = $this->Team->query("SELECT * FROM teams, clubs WHERE idClub = clubs.id AND idClub IN (SELECT id FROM clubs WHERE idUser =?)", [$_SESSION['auth']], false);
        $nbPlayers = $this->Player->query("SELECT team_id, count(*) as nbplayers FROM players WHERE team_id IN 
                                            (SELECT teams.id FROM teams WHERE idClub IN (SELECT id FROM clubs WHERE idUser =?))
                                            GROUP BY team_id", [$_SESSION['auth']], true);
        var_dump($teams, $nbPlayers);
        $this->render('account.teams.myteams', compact('teams', 'nbPlayers'));

    }

    public function gerer() {
        $team = $this->Team->query("SELECT * FROM teams, clubs WHERE idClub = clubs.id AND teams.id=?", [$_GET['team_id']], true);
        $nbPlayers = $this->Player->query("SELECT count(*) as nbplayers FROM players WHERE team_id = ?", [$_GET['team_id']], true);
        $this->render('account.teams.gerer', compact('team', 'nbPlayers'));
    }


    public function addPlayer() {
        $this->loadModel('Level');
        $req = $this->Level->query("SELECT * FROM levels", null);
        $levels = [];
        foreach ($req as $level) {
            $levels[$level->name] = $level->name;
        }
        if (!empty($_POST)) {
            $this->Player->create([
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'player_level' => $_POST['player_level'],
                'team_id' => $_GET['team_id']
            ]);

            $lvl = $this->getTeamLevel($_GET['team_id']);
            $this->Team->update($_GET['team_id'], ['level' => $lvl]);
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.teams.addPlayer', compact('form', 'levels'));
    }

    public function getPlayer($id) {
        $req = $this->Player->query("SELECT * FROM players, levels WHERE team_id = ? AND player_level = levels.name", [$id], false);
        return $req;
    }

    public function getTeamLevel($id) {
        $players = $this->getPlayer($id);
        $lvl = 0;
        foreach ($players as $player) {
            $lvl += intval($player->value);
        }
        return round($lvl / count($players));
    }
}