<?php

namespace Core\HTML;


/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 * @package core\HTML
 */
class Form {

    /**
     * @var array Données utilisées par le formulaire
     */
    private $data;

    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * Form constructor.
     * @param array $data
     */
    public function __construct($data = array()) {
        $this->data = $data;
    }

    /**
     * @param $html code HTML à entourer
     * @return string
     */
    protected function surround($html) {
        return "<{$this->surround}>{$html}</{$this->surround}";
    }

    /**
     * @param $index string Index de la valeur à récupérer
     * @return string
     */
    protected function getValue($index) {
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<label>'.$label.'</label><input type ="'.$type.'" name="' . $name . '" value="' . $this->getValue($name) . '">');
    }



    /**
     * @return string
     */
    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}