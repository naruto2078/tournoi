<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 19/10/2016
 * Time: 11:45
 */

namespace App\Controller\Account;


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



}