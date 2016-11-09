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
        $this->loadModel('Type_de_jeu');
        $types = $this->Type_de_jeu->query("SELECT * FROM type_de_jeu");
        $options=[];
        foreach ($types as $type) {
            $options[$type->type]= $type->type;
        }
        if (!empty($_POST)) {
            $time = strtotime($_POST['date']);

            $date = date('Y-m-d',$time);
            $this->Event->create([
                'nom' => $_POST['nom'],
                'lieu' => $_POST['lieu'],
                'date' => $date,
                'organisateur' => $_SESSION['auth'],
                'type_de_jeu' => $_POST['type_de_jeu'],
                'nb_tournois' => $_POST['nb_tournois']
            ]);
            $event = $this->Event->lastInsertId();
            $_SESSION['event'] = $event;
            header('Location:index.php?p=account.tournois.add');
        }
        $form = new BootstrapForm($_POST);
        $this->render('account.events.add', compact('form','options'));
    }

public function AllEventByOrganizer(){

   $events= $this->Event->findByOrganizer($_SESSION['auth']);

   $this->render('account.events.AllEventByOrganizer',compact('events'));
}

    public function participations() {

    }

    public function register() {
        $current_date = date_format(new \DateTime('NOW'), 'Y-m-d');
        $events = $this->Event->query("SELECT * FROM events WHERE date >= ? ORDER BY date DESC ", [$current_date], false);
        $form = new BootstrapForm($_POST);
        $this->render('account.events.register', compact('form', 'events'));
    }

}