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

    /**
     * Permet d'envoyer des variables à la vue
     * @param $view la vue à charger
     * @param array $variables les variables envoyées à la vue
     */
    public function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    /**
     *Empêche l'accès de certaines pages aux utilisateurs
     */
    protected function forbidden() {
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    /**
     *Gère l'erreur lors de l'accès à une page qui n'existe pas
     */
    protected function notFound() {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}