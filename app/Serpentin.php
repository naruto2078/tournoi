<?php
/**
 * Created by PhpStorm.
 * User: Raoul
 * Date: 18/11/2016
 * Time: 23:47
 */

namespace App;

/**
 * Class Serpentin : implémente la méthode du serpentin (création des poules)
 * @package App
 */
class Serpentin {

    public $teams = [];

    public function __construct($teams) {
        arsort($teams);
        $teams_aux = $teams;
        foreach ($teams_aux as $team) {
            $this->teams[] = $team;
        }

    }

    public function getDiviseurs($n) {
        $diviseurs = [];
        $deuxEstFacteur = false;
        if ($n % 2 == 0) {
            $deuxEstFacteur = true;
        }
        for ($i = 2; $i <= $n - 1; $i++) {
            if ($n % $i == 0) {
                if (($deuxEstFacteur && $i != $n / 2) || !$deuxEstFacteur) {
                    $diviseurs[] = $i;
                }
            }
        }
        return empty($diviseurs) ? $this->getDiviseurs($n + 1) : $diviseurs;
    }

    public function repartition($nbGroup) {
        $groups = [];
        //initialiser les groupes
        for ($i = 0; $i < $nbGroup; $i++) {
            $groups[$i] = [];

        }


        $k = 0;
        $i = 0;
        $j = 0;
        while ($k < count($this->teams)) {
            if ($i == 0) {
                while ($j <= count($groups) - 1) {
                    if (isset($this->teams[$k])) {
                        array_push($groups[$j], $this->teams[$k]);
                    }
                    $j++;
                    $k++;
                }
                $j -= 1;
                $i = count($groups) - 1;
                $k--;
            } else {
                while ($j >= 0) {
                    if (isset($this->teams[$k])) {
                        array_push($groups[$j], $this->teams[$k]);
                    }

                    $k++;
                    $j--;
                }
                $j = 0;
                $k--;
                $i = 0;
            }

            $k++;
        }

        /*Si le nombre d'équipes par poules est impair, il faut alors alterner la dernière ligne. Ce système de la table de Berger permet de préserver les têtes de séries en les faisant
        rencontrer les moins forts en premiers.*/
        $lastline = [];
        for ($i = count($groups) - 1; $i >= 0; $i--) {
            $lastline[] = $groups[$i][count($groups[$i]) - 1];
        }
        if (count($groups[0]) % 2 != 0) {
            for ($i = 0; $i <= count($groups) - 1; $i++) {
                $groups[$i][count($groups[$i]) - 1] = $lastline[$i];
            }
        }
        if ($nbGroup == 2) {
            if (count($groups[0]) != count($groups[1])) {
                $derniere = $groups[1][count($groups[1]) - 1];
                array_push($groups[0], $derniere);
                array_pop($groups[1]);
            }
        }

        return $groups;
    }

    public function serpentin() {
        $nbCombinaisons = $this->getDiviseurs(count($this->teams));
        $combinaisons = [];
        foreach ($nbCombinaisons as $nb) {
            $combinaison[$nb] = $this->repartition($nb);
            array_push($combinaisons, $combinaison);
        }

        return $combinaisons;

    }
}