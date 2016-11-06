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
        return $this->query("SELECT count(*) as nb_inscrits FROM {$this->table} WHERE tournoi_id=?", [$tournoi_id], false);
    }

}