<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 24/10/2016
 * Time: 15:18
 */

namespace App\Table;


use Core\Table\Table;

class ClubTable extends Table {
    protected $table = 'clubs';

    public function getInfo($clubname) {
        return $this->query("SELECT * FROM {$this->table} WHERE nom = ?", [$clubname], true);
    }

    public function clubExist($club_name) {
        $club = $this->query("SELECT * FROM {$this->table} WHERE nom = ?", [$club_name], true);
        if ($club) {
            return true;
        }
        return false;
    }

    public function getid($clubname_) {
        return $this->query("SELECT id FROM {$this->table} WHERE nom = ?", [$clubname_], true);
    }
}