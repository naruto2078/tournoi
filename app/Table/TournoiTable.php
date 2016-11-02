<?php


namespace App\Table;


use Core\Table\Table;

/**
 * Class TournoiTable modélise la table tournoi
 * @package App\Table
 */
class TournoiTable extends Table  {
    protected $table = 'tournois';

public function tournoiByEvent($id) {
        return $this->query("SELECT E.nom, genre, nom_categorie from tournois T, events E WHERE E.id = T.id_event and E.id=?", [$id], false);

}


}