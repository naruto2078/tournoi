<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 14/12/2016
 * Time: 00:36
 */

namespace App\Table;


use Core\Table\Table;

class TerrainTable extends Table {
    protected $table = 'terrains';

    public function terrainParVille($ville){
        return $this->query("SELECT * FROM terrains WHERE ville = ? AND dispo = 1",[$ville],false);
    }

}