<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/10/2016
 * Time: 19:33
 */

namespace App\Controller;


class HomeController extends AppController {

    public function index() {
        $this->loadModel('Event');
        $this->loadModel('Tournoi');
        $current_date = date_format(new \DateTime('NOW'), 'Y-m-d');
        $events = $this->Event->query("SELECT * FROM events WHERE date >= ? ORDER BY date DESC ", [$current_date], false);
        $this->render('home.index',compact('events'));
    }
}