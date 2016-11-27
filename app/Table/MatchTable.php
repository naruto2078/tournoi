<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 25/11/2016
 * Time: 10:51
 */

namespace App\Table;


use Core\Table\Table;

class MatchTable extends Table {

    protected $table = 'matches';


    public function matchesTournoi($id) {
        return $this->query("SELECT DISTINCT matches.id, matches.date,group_id,team_id_home,team_id_away, tournoi_id,poules.nom FROM matches,participe,poules WHERE group_id=participe.poule_id AND matches.group_id = poules.id AND tournoi_id=? ", [$id], false);
    }
}