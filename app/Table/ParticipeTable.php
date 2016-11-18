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
        return $this->query("SELECT count(*) as nb_inscrits FROM {$this->table} WHERE tournoi_id=?", [$tournoi_id], true);
    }
    public function participants($tournoi_id){
        return $this->query("SELECT * FROM teams,participe,clubs WHERE teams.id = participe.team_id AND participe.tournoi_id=? AND clubs.id=idClub",[$tournoi_id]);
    }

}