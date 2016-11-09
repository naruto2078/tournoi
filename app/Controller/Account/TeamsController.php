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
            
            if($this->Club->clubExist($_POST['nomClub'])){
                $errors=true;

            }
            else{
            $this->Club->create([
                'nom' => $_POST['nomClub'],
                'idUser' => $_SESSION['auth']
                
            ]);
            
            }
var_dump($id=$this->Club->getid($_POST['nomClub']));

            $this->Team->create([
                'name' => $_POST['nomTeam'],
                'level' => $_POST['levelTeam'],

                'idClub' => $id->id
            ]);   
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.teams.add', compact('form','errors'));
    }

 public function addClub() {
        
        if (!empty($_POST)) {
            echo "pas de post";
            var_dump($_POST['nomClub']);
            $this->Club->create([
                'nom' => $_POST['nomClub'],

                
            ]);
            var_dump($_POST['nomClub']);
        }
        else{
            echo "pas de post";
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