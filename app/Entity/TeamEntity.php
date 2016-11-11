<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 24/10/2016
 * Time: 15:43
 */

namespace App\Entity;


use Core\Entity\Entity;

class TeamEntity extends Entity {

    public function adminUrl() {
        return 'index.php?p=account.teams.gerer&team_id=' . $this->id;
    }

    public function addPlayerUrl(){
        return 'index.php?p=account.teams.addPlayer&team_id=' . $this->id;
    }


}