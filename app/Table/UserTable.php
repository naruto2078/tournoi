<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 18:23
 */

namespace App\Table;


use Core\Table\Table;

class UserTable extends Table {

    protected $table = 'users';

    public function getInfo($username) {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }
}