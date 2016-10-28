<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 19/10/2016
 * Time: 11:45
 */

namespace App\Controller\Account;


use Core\HTML\BootstrapForm;

class EventsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Event');
    }

    public function myEvents() {
        $events = $this->Event->findByOrganizer($_SESSION['auth']);
        var_dump($events);
        $this->render('account.events.myEvents', compact('events'));

    }

    public function add() {
        if (!empty($_POST)) {
            $time = strtotime($_POST['date']);
            $date = date('Y-m-d',$time);
            /*$this->Event->create([
                'nom' => $_POST['nom'],
                'lieu' => $_POST['date'],
                'organisateur' => $_SESSION['auth'],
                'type_de_jeu' => $_POST['type_de_jeu'],
                'nb_tournois' => $_POST['nb_tournois']
            ]);*/
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.events.add', compact('form'));
    }


}