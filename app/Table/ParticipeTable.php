<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 05/11/2016
 * Time: 11:45
 */

namespace App\Table;


use Core\Table\Table;

class ParticipeTable extends Table {

    protected $table = 'participe';

    public function nbInscrits($tournoi_id) {
        return $this->query("SELECT count(*) as nb_inscrits FROM {$this->table} WHERE tournoi_id=? AND tour=1", [$tournoi_id], true);
    }
    public function participants($tournoi_id){
        return $this->query("SELECT * FROM teams,participe,clubs WHERE participe.tour =1 AND teams.id = participe.team_id AND participe.tournoi_id=? AND clubs.id=idClub",[$tournoi_id]);
    }
    public function participantsEtPoules($tournoi_id){
        return $this->query("SELECT * FROM teams,participe,poules WHERE teams.id = participe.team_id AND participe.tournoi_id=? AND poules.id=participe.poule_id ",[$tournoi_id]);
    }
    public function participantsEtPoulesParTour($tournoi_id,$tour){
        return $this->query("SELECT * FROM teams,participe,poules WHERE teams.id = participe.team_id AND participe.tournoi_id=? AND poules.id=participe.poule_id AND participe.tour=? ORDER BY participe.poule_id",[$tournoi_id,$tour]);
    }

    public function participantsQualifies($tournoi_id){
        return $this->query("SELECT * FROM teams,participe,poules WHERE teams.id = participe.team_id AND participe.tournoi_id=? AND poules.id=participe.poule_id AND participe.tour=? ORDER BY participe.poule_id",[$tournoi_id]);
    }

}