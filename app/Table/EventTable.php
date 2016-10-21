<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 19/10/2016
 * Time: 10:24
 */

namespace App\Table;


use Core\Table\Table;

class EventTable extends Table {

    protected $table = "events";

    public function findByOrganizer($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE organisateur=?", [$id], true);
    }

}