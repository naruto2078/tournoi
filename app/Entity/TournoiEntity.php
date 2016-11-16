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

    public function adminUrl(){
        return 'index.php?p=account.tournois.gerer&event_id='.$this->id_event.'&tournoi_id='.$this->id;
    }
    public function Url(){
        return 'index.php?p=account.tournois.infos&event_id='.$this->id_event.'&tournoi_id='.$this->id;
    }
}