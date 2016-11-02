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
        return $this->query("SELECT id, nom,lieu,date,type_de_jeu,nb_tournois FROM {$this->table} WHERE organisateur=?", [$id], false);

}
/*recupere tous les evenements pour un organisateur donné

*/
public function findAllByOrganizer($id){
	return $this->query("SELECT  nom , lieu , date , type_de_jeu, nb_tournois, genre, nom_categorie from tournois T, events E WHERE E.id = T.id_event and E.id=?",[$id], false);
}
}