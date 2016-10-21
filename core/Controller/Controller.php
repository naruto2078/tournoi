<?php


namespace Core\Controller;


/**
 * Class Controller super class Controller
 * @package Core\Controller
 */
class Controller {
    /**
     * @var repertoire des vues
     */
    protected $viewPath;
    /**
     * @var repertoire des templates
     */
    protected $template;

    public function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function notFound() {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}