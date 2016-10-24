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

    }

    public function add() {
        if (!empty($_POST)) {
            $this->Team->create([
                'name' => $_POST['name'],
                'lvl' => 0
            ]);
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.teams.add', compact('form'));
    }

    public function addPlayer($id){
        if(!empty($_POST)) {
            $this->Player->create([
                'nom' => $_POST['nom'],
                'prenom'=> $_POST['prenom'],
                'player_level' => $_POST['player_level'],
                'team_id' => $id
            ]);
        }
    }

    public function getPlayer($id) {
        return $this->Player->query("SELECT * FROM players WHERE team_id = ?", [$id], false);
    }

    public function getTeamLevel($id) {
        $players = $this->getPlayer($id);
        $lvl = 0;
        foreach ($players as $player) {
            $lvl += intval($player->player_level);
        }
        return $lvl / count($players);
    }

}