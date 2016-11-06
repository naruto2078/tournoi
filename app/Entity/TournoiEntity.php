<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 19/10/2016
 * Time: 12:21
 */

namespace App\Entity;


use Core\Entity\Entity;

class TournoiEntity extends Entity {

    public function getUrl(){
        return 'index.php?p=account.tournois.gerer&event_id=2&tournoi_id='.$this->id;
    }
}