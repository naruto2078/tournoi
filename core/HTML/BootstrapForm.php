<?php


namespace Core\HTML;


class BootstrapForm extends Form {

    /**
     * @param $html code HTML à entourer
     * @return string
     */
    protected function surround($html) {
        return "<div class=\"md-form\"> {$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $attr = [];
        $class = isset($options['class']) ? $options['class'] : '';
        foreach ($options as $k => $v) {
            if ($k != 'type' && $k != 'class') {
                $attr[] = "$k = \"$v\"";
            }
        }
        $attr = implode(' ', $attr);
        //var_dump($attr);
        $label = '<label class="sr-only">' . $label . '</label>';
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type ="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control ' . $class . '" ' . $attr . '>';
        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options, $selected = null) {
        $label = '<label class="sr-only">' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach ($options as $k => $v) {
            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = 'selected';
            }
            if ($selected) {
                if ($k == $selected) {
                    $attributes = 'selected';
                }
            }
            $input .= "<option value ='$k' $attributes>$v</option>";
        }
        $input .= "</select>";
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit() {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }

}