<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 19/10/2016
 * Time: 13:39
 */

namespace App\Controller\Account;


class AccountController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('Event');
        $this->loadModel('Tournoi');
    }

    public function index(){
        $events = $this->Event->query("SELECT count(*) as nbEvents FROM events WHERE organisateur=?",[$_SESSION['auth']],true);
        $tournois = $this->Tournoi->query("SELECT count(*) as nbTournois FROM tournois,events WHERE tournois.id_event= events.id AND organisateur = ?",[$_SESSION['auth']],true);

        $events_en_cours = $this->Event->query("SELECT count(*) as nbEvents FROM events WHERE organisateur=? AND inscription_ouverte=1",[$_SESSION['auth']],true);
        var_dump($events);
        $this->render('account.index',compact('events','tournois','events_en_cours'));
    }

}