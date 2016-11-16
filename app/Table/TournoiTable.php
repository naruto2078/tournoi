<?php


namespace App\Table;


use Core\Table\Table;

/**
 * Class TournoiTable modélise la table tournoi
 * @package App\Table
 */
class TournoiTable extends Table {
    protected $table = 'tournois';

    public function tournoiByEvent($id) {
        return $this->query("SELECT T.id, E.nom, genre, nom_categorie,id_event from tournois T, events E WHERE E.id = T.id_event and E.id=? and E.organisateur=?", [$id,$_SESSION['auth']], false);

    }

    public  function allByEvent($id){
        return $this->query("SELECT T.id, E.nom, genre, nom_categorie,id_event from tournois T, events E WHERE E.id = T.id_event AND E.id=?" ,[$id], false);
    }

}