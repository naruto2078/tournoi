<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 14:55
 */

namespace Core\Table;


use Core\DataBase\MysqlDataBase;

class Table {
    protected $table;
    protected $db;

    public function __construct(MysqlDataBase $db) {
        $this->db = $db;

        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * Récupère tous les enregistrements d'une table
     * @return mixed
     */
    public function all() {
        return $this->query('SELECT * FROM ' . $this->table);
    }


    /**
     * Effectue une requête préparée ou nom sur une table
     * @param $statement
     * @param null $attributes
     * @param bool $one vrai si on veut récupérer un seul enregistrement, faux sinon
     * @return mixed
     */
    public function query($statement, $attributes = null, $one = false) {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

    public function find($id) {
        return $this->query("SELECT * FROM {$this->table} WHERE id=?", [$id], true);
    }

    public function update($id, $fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id=?", $attributes, true);
    }

    public function create($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    public function delete($id) {
        return $this->query("DELETE FROM {$this->table} WHERE id=?", $id, true);
    }

    public function extract($key, $value) {
        $records = $this->all();
        $return = [];
        foreach ($records as $v) {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }

    public function lastInsertId(){
        return $this->db->lastInsertId();
    }
}