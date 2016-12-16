<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3 style="color: #414C59; margin-bottom: 30px">Classement</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">
    <div class="col-md-10">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item active">
                <a href="#phase_poule" class="nav-link" data-toggle="tab" role="tab">
                    <button class="btn btn-success">Phase de poules</button>
                </a>
            </li>
            <li class="nav-item">
                <a href="#phase_qualif" class="nav-link" data-toggle="tab" role="tab">
                    <button class="btn btn-success">Phases à élimination directe</button>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!--matches phase de poules-->
            <div class="tab-pane active" id="phase_poule" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a href="#panel1" class="nav-link" data-toggle="tab" role="tab">Poule 1</a>
                    </li>
                    <?php for ($i = 2; $i <= $numero; $i++): ?>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#panel<?= $i; ?>"
                               role="tab">Poule <?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="panel1" role="tabpanel">
                        <button type="button" class="btn btn-info" name="buttonPoule$i"
                                onclick=dialogPoule('<?= $all_poule_id['poule 1'][$_GET['tournoi_id']]; ?>')>
                            Preciser Nombre de
                            Set et Nombre de point pour la Poule 1
                        </button>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Equipe</th>
                                <th>Matchs Gagnés</th>
                                <th>Matchs perdus</th>
                                <th>Quotient Set</th>
                                <th>Quotient Set</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $idT=  $all_poule_id['poule 1'][$_GET['tournoi_id']];  ?>
                            <?php
                            foreach ($poules["poule 1"] as $k => $equipe): ?>
                                <?php $ind =$k + 1; ?>
                                <tr>
                                    <?php
                                    if (empty($all_classement[$idT][$k + 1][4])){
                                        $quotientset='NR';
                                    }
                                    else{
                                        if ($all_classement[$idT][$k + 1][4]<0 ){
                                            $quotientset='NR';
                                        }else
                                        {
                                            $quotientset=$all_classement[$idT][$k + 1][4];
                                        }
                                    }

                                    if (!empty($all_classement[  $idT ][$k + 1 ][1] )){
                                        $teamname=$all_classement[  $idT ][$k + 1 ][1] ;
                                    }else {
                                        $teamname='NR';
                                    }

                                    if (!empty($all_classement[  $idT ][$k + 1 ][2] )){
                                        $matchWin=$all_classement[  $idT ][$k + 1 ][2] ;
                                    }else {
                                        $matchWin='NR';
                                    }

                                    if (!empty($all_classement[  $idT ][$k + 1 ][3] )){
                                        $matchLoose=$all_classement[  $idT ][$k + 1 ][3] ;
                                    }else {
                                        $matchLoose='NR';
                                    }
                                    if (!empty($all_classement[  $idT ][$k + 1 ][5] )){
                                        $quotientPoint=$all_classement[  $idT ][$k + 1 ][5] ;
                                    }else {
                                        $quotientPoint='NR';
                                    }


                                    ?>
                                    <td><?= $k + 1; ?></td>
                                    <td><?= $teamname; ?></td>
                                    <td><?= $matchWin; ?></td>
                                    <td><?= $matchLoose;?></td>
                                    <td><?= $quotientset; ?></td>
                                    <td><?= $quotientPoint; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>

                        </table>
                        <div class="row">
                            <?php for ($i = 0; $i < count($matches); $i++): ?>
                                <?php $match = $matches[$i];
                                if ($match->nom == "poule 1"): ?>
                                    <div class="col-sm-9">
                                        <div class="card  text-xs-center ">
                                            <div class="card-block">
                                                <div class="row card-text">
                                                    <div class="col-xs-4">
                                                        <div><i class="fa fa-calendar fa"></i></div>
                                                        <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                                        <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                                    </div>
                                                    <div class="col-xs-4 float-xs-right">
                                                        <div>
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        </div>
                                                        <div>Stade</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="col-xs-11">
                                                    <?php
                                                    if (empty($tousLesSetParMatches[$match->id])) {
                                                        $scoreH = "NR";
                                                        $scoreA = "NR";
                                                    } else {
                                                        $scoreH = $tousLesSetParMatches[$match->id][0];
                                                        $scoreA = $all_score[0][$match->id];
                                                    }
                                                    ?>

                                                    <?php $nb_set_score = $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>
                                                    <table class="table event-table card-text">
                                                        <?php $p = 1; ?>
                                                        <?php while (!isset($all_set_by_team_match[$p][$match->id][$match->team_id_home]) && $p <= count($all_set_by_team_match)) {
                                                            $p++;
                                                        }
                                                        if ($p > count($all_set_by_team_match)) {
                                                            $p = -1;
                                                        } $h = $p; $a=$p?>

                                                        <tbody>
                                                        <tr>

                                                            <td class="text-left"><?= $all_teams[$matches[$i]->team_id_home]; ?></td>
                                                            <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>

                                                                <td><?= isset($all_set_by_team_match[$h][$match->id][$match->team_id_home]) ? $all_set_by_team_match[$h][$match->id][$match->team_id_home] : "NR"; $h++;?></td>
                                                            <?php endfor; ?>

                                                        </tr>
                                                        <tr>
                                                            <td class="text-left"><?= $all_teams[$matches[$i]->team_id_away]; ?></td>
                                                            <?php for ($k = 1; $k <= $nb_set_score; $k++): ?>
                                                                <td><?= isset($all_set_by_team_match[$a][$match->id][$matches[$i]->team_id_away]) ? $all_set_by_team_match[$a][$match->id][$matches[$i]->team_id_away] : "NR"; $a++;?></td>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div>
                                                        <button type="button" class="btn btn-info" name="button$j"
                                                                onclick=dialog('<?= $all_teams[$matches[$i]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                            Ajouter le score
                                                        </button>
                                                        <button type="button" class="btn btn-info" name="button$j"
                                                                onclick=dialog2('<?= $all_teams[$matches[$i]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                            Modifier le score
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php for ($i = 2; $i <= $numero; $i++): ?>

                        <div class="tab-pane" id="panel<?= $i; ?>" role="tabpanel">
                            <button type="button" class="btn btn-info" name="buttonPoule$i"
                                    onclick=dialogPoule('<?= $all_poule_id["poule $i"][$_GET['tournoi_id']]; ?>')>
                                Preciser
                                Nombre de Set et Nombre de point pour la Poule<?= $i ?>
                            </button>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Equipe</th>
                                    <th>Matchs Gagnés</th>
                                    <th>Matchs perdus</th>
                                    <th>Quotient Set</th>
                                    <th>Quotient Set</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $idT=  $all_poule_id['poule ' . $i][$_GET['tournoi_id']];  ?>
                                <?php
                                foreach ($poules['poule ' . $i] as $k => $equipe): ?>
                                    <?php $ind =$k + 1; ?>
                                    <tr>
                                        <?php
                                        if (empty($all_classement[$idT][$k + 1][4])){
                                            $quotientset='NR';
                                        }
                                        else{
                                            if ($all_classement[$idT][$k + 1][4]<0  ){
                                                $quotientset='NR';
                                            }else
                                            {
                                                $quotientset=$all_classement[$idT][$k + 1][4];
                                            }
                                        }

                                        if (!empty($all_classement[  $idT ][$k + 1 ][1] )){
                                            $teamname=$all_classement[  $idT ][$k + 1 ][1] ;
                                        }else {
                                            $teamname='NR';
                                        }

                                        if (!empty($all_classement[  $idT ][$k + 1 ][2] )){
                                            $matchWin=$all_classement[  $idT ][$k + 1 ][2] ;
                                        }else {
                                            $matchWin='NR';
                                        }

                                        if (!empty($all_classement[  $idT ][$k + 1 ][3] )){
                                            $matchLoose=$all_classement[  $idT ][$k + 1 ][3] ;
                                        }else {
                                            $matchLoose='NR';
                                        }
                                        if (!empty($all_classement[  $idT ][$k + 1 ][5] )){
                                            $quotientPoint=$all_classement[  $idT ][$k + 1 ][5] ;
                                        }else {
                                            $quotientPoint='NR';
                                        }


                                        ?>
                                        <td><?= $k + 1; ?></td>
                                        <td><?= $teamname; ?></td>
                                        <td><?= $matchWin; ?></td>
                                        <td><?= $matchLoose;?></td>
                                        <td><?= $quotientset; ?></td>
                                        <td><?= $quotientPoint; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>

                            </table>
                            <div class="row">
                                <?php for ($j = 0; $j < count($matches); $j++): ?>
                                    <?php $match = $matches[$j];

                                    if ($match->nom == "poule " . $i): ?>
                                        <div class="col-sm-9">

                                            <div class="card  text-xs-center ">
                                                <div class="card-block">
                                                    <div class="row card-text">
                                                        <div class="col-xs-4">
                                                            <div><i class="fa fa-calendar fa"></i></div>
                                                            <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            </div>
                                                            <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                                        </div>
                                                        <div class="col-xs-4 float-xs-right">
                                                            <div>
                                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            </div>
                                                            <div>Stade</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-footer">
                                                    <div class="col-xs-11">
                                                        <?php
                                                        if (empty($all_score[$match->id][0]) || empty($all_score[0][$match->id])) {
                                                            $scoreH = "NR";
                                                            $scoreA = "NR";
                                                        } else {
                                                            $scoreH = $all_score[$match->id][0];
                                                            $scoreA = $all_score[0][$match->id];
                                                        }
                                                        ?>

                                                        <?php $nb_set_score = $all_nb_set["poule $i"][$_GET['tournoi_id']]; ?>
                                                        <table class="table event-table card-text">
                                                            <?php $p = 1; ?>
                                                            <?php while (!isset($all_set_by_team_match[$p][$match->id][$match->team_id_home]) && $p <= count($all_set_by_team_match)) {
                                                                $p++;
                                                            }
                                                            if ($p > count($all_set_by_team_match)) {
                                                                $p = -1;
                                                            } $h = $p; $a = $p; ?>

                                                            <tbody>
                                                            <tr>
                                                                <td class="text-left"><?= $all_teams[$matches[$j]->team_id_home]; ?></td>
                                                                <?php

                                                                for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                    <td><?= isset($all_set_by_team_match[$h][$match->id][$match->team_id_home]) ? $all_set_by_team_match[$h][$match->id][$match->team_id_home] : "NR"; $h++;?></td>
                                                                <?php endfor; ?>

                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><?= $all_teams[$matches[$j]->team_id_away]; ?></td>
                                                                <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                    <td><?= isset($all_set_by_team_match[$a][$match->id][$matches[$j]->team_id_away]) ? $all_set_by_team_match[$a][$match->id][$matches[$j]->team_id_away] : "NR"; $a++; ?></td>
                                                                <?php endfor; ?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <button type="button" class="btn btn-info"
                                                                name="button$jbis"
                                                                onclick=dialog('<?= $all_teams[$matches[$j]->team_id_home]; ?>','<?= $all_teams[$matches[$j]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set["poule $i"][$_GET['tournoi_id']]; ?>')>
                                                            Ajouter le score
                                                        </button>
                                                        <button type="button" class="btn btn-info"
                                                                name="button$jbisM"
                                                                onclick=dialog2('<?= $all_teams[$matches[$j]->team_id_home]; ?>','<?= $all_teams[$matches[$j]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set["poule $i"][$_GET['tournoi_id']]; ?>')>
                                                            Modifier le score
                                                        </button>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>


                    <!--</form>-->
                </div>
            </div>
            <!--matches phase de poules-->

            <!--matches phase à élimination directe-->

            <div class="tab-pane " id="phase_qualif" role="tabpanel">
                <?php if ($nbScdTour): ?>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active">
                            <a href="#panel_elem0" class="nav-link" data-toggle="tab"
                               role="tab"><?= $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0]; ?></a>
                        </li>
                        <?php for ($i = 1; $i < $nbPhases_[$nbScdTour]; $i++): ?>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#panel_elem<?= $i; ?>"
                                   role="tab"> <?= $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i]; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="panel_elem0" role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item active">
                                    <a href="#panel_elem_d0" class="nav-link" data-toggle="tab" role="tab">
                                        <?= $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0] . ' ' . 1; ?>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i < $equipesParPhase[$lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0]]; $i++): ?>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#panel_elem_d<?= $i; ?>"
                                           role="tab"><?= $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0] . ' ' . ($i + 1); ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="panel_elem_d0">
                                    <?php $eq = $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0] . ' ' . 1; ?>
                                    <button type="button" class="btn btn-info" name="button<?= $eq; ?>"
                                            onclick=dialogPoule('<?= $all_poule_id["$eq"][$_GET['tournoi_id']]; ?>')>
                                        Preciser Nombre de
                                        Set et Nombre de point pour <?= $eq; ?>
                                    </button>
                                    <div class="row">
                                        <?php for ($i = 0; $i < count($matches); $i++): ?>
                                            <?php $match = $matches[$i];
                                            if ($match->nom == $eq): ?>
                                                <div class="col-sm-9">
                                                    <div class="card  text-xs-center ">
                                                        <div class="card-block">
                                                            <div class="row card-text">
                                                                <div class="col-xs-4">
                                                                    <div><i class="fa fa-calendar fa"></i></div>
                                                                    <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <div><i class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                                                </div>
                                                                <div class="col-xs-4 float-xs-right">
                                                                    <div>
                                                                        <i class="fa fa-map-marker"
                                                                           aria-hidden="true"></i>
                                                                    </div>
                                                                    <div>Stade</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="col-xs-11">
                                                                <?php
                                                                if (empty($all_score[$match->id][0]) || empty($all_score[0][$match->id])) {
                                                                    $scoreH = "NR";
                                                                    $scoreA = "NR";
                                                                } else {
                                                                    $scoreH = $all_score[$match->id][0];
                                                                    $scoreA = $all_score[0][$match->id];
                                                                }
                                                                ?>

                                                                <?php $nb_set_score = $all_nb_set[$eq][$_GET['tournoi_id']]; ?>
                                                                <table class="table event-table card-text">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="text-left"><?= $all_teams[$matches[$i]->team_id_home]; ?></td>
                                                                        <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                            <td><?= isset($all_set_by_team_match[$match->id][$matches[$i]->team_id_home][$z]) ? $all_set_by_team_match[$match->id][$matches[$i]->team_id_home][$z] : "NR"; ?></td>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-left"><?= $all_teams[$matches[$i]->team_id_away]; ?></td>
                                                                        <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                            <td><?= isset($all_set_by_team_match[$match->id][$matches[$i]->team_id_away][$z]) ? $all_set_by_team_match[$match->id][$matches[$i]->team_id_away][$z] : "NR"; ?></td>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php if ($organisateur->organisateur == $_SESSION['auth']): ?>

                                                                <div>
                                                                    <button type="button" class="btn btn-info"
                                                                            name="button$j"
                                                                            onclick=dialog('<?= $all_teams[$matches[$i]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                                        Ajouter le score
                                                                    </button>
                                                                    <button type="button" class="btn btn-info"
                                                                            name="button$j"
                                                                            onclick=dialog2('<?= $all_teams[$matches[$i]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                                        Modifier le score
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <?php for ($i = 1; $i < $equipesParPhase[$lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0]]; $i++): ?>
                                    <?php $eq = $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + 0] . ' ' . ($i + 1); ?>
                                    <div class="tab-pane" id="panel_elem_d<?= $i; ?>">
                                        <button type="button" class="btn btn-info" name="button<?= $eq; ?>"
                                                onclick=dialogPoule('<?= $all_poule_id["$eq"][$_GET['tournoi_id']]; ?>')>
                                            Preciser Nombre de
                                            Set et Nombre de point pour <?= $eq; ?>
                                        </button>
                                        <div class="row">
                                            <?php for ($j = 0; $j < count($matches); $j++): ?>
                                                <?php $match = $matches[$j];
                                                if ($match->nom == $eq): ?>
                                                    <div class="col-sm-9">

                                                        <div class="card  text-xs-center ">
                                                            <div class="card-block">
                                                                <div class="row card-text">
                                                                    <div class="col-xs-4">
                                                                        <div><i class="fa fa-calendar fa"></i></div>
                                                                        <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-4">
                                                                        <div><i class="fa fa-clock-o"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-4 float-xs-right">
                                                                        <div>
                                                                            <i class="fa fa-map-marker"
                                                                               aria-hidden="true"></i>
                                                                        </div>
                                                                        <div>Stade</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer">
                                                                <?php
                                                                if (empty($all_score[$match->id][0]) || empty($all_score[0][$match->id])) {
                                                                    $scoreH = "NR";
                                                                    $scoreA = "NR";
                                                                } else {
                                                                    $scoreH = $all_score[$match->id][0];
                                                                    $scoreA = $all_score[0][$match->id];
                                                                }
                                                                ?>
                                                                <?php $nb_set_score = $all_nb_set[$eq][$_GET['tournoi_id']]; ?>
                                                                <table class="table event-table card-text">
                                                                    <?php $p = 1; ?>
                                                                    <?php while (!isset($all_set_by_team_match[$p][$match->id][$match->team_id_home]) && $p <= count($all_set_by_team_match)) {
                                                                        $p++;
                                                                    }
                                                                    if ($p > count($all_set_by_team_match)) {
                                                                        $p = -1;
                                                                    } $h = $p; $a = $p; ?>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="text-left"><?= $all_teams[$matches[$j]->team_id_home]; ?></td>
                                                                        <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                            <td><?= isset($all_set_by_team_match[$h][$match->id][$match->team_id_home]) ? $all_set_by_team_match[$h][$match->id][$match->team_id_home] : "NR"; $h++;?></td>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-left"><?= $all_teams[$matches[$j]->team_id_away]; ?></td>
                                                                        <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                            <td><?= isset($all_set_by_team_match[$a][$match->id][$match->team_id_away]) ? $all_set_by_team_match[$a][$match->id][$match->team_id_away] : "NR"; $a++?></td>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php if ($organisateur->organisateur == $_SESSION['auth']): ?>
                                                                    <div>
                                                                        <button type="button" class="btn btn-info"
                                                                                name="button$j"
                                                                                onclick=dialog('<?= $all_teams[$matches[$j]->team_id_home]; ?>','<?= $all_teams[$matches[$j]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                                            Ajouter le score
                                                                        </button>
                                                                        <button type="button" class="btn btn-info"
                                                                                name="button$j"
                                                                                onclick=dialog2('<?= $all_teams[$matches[$j]->team_id_home]; ?>','<?= $all_teams[$matches[$j]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                                            Modifier le score
                                                                        </button>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <?php for ($i = 1; $i < $nbPhases_[$nbScdTour]; $i++): ?>
                            <div class="tab-pane" id="panel_elem<?= $i ?>" role="tabpanel">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item active">
                                        <a href="#panel_elem_d<?= $i ?>0" class="nav-link" data-toggle="tab" role="tab">
                                            <?php if ($lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i] == "Finale") {
                                                echo $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i];
                                            } else {
                                                echo $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i] . ' ' . 1;
                                            } ?>
                                        </a>
                                    </li>
                                    <?php for ($j = 1; $j < $equipesParPhase[$lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i]]; $j++): ?>
                                        <li class="nav-item">
                                            <a class="nav-link " data-toggle="tab" href="#panel_elem_d<?= $i . $j; ?>"
                                               role="tab"><?= $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i] . ' ' . ($j + 1); ?></a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="panel_elem_d<?= $i ?>0">
                                        <?php if ($lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i] == "Finale") {
                                            $eq = $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i];
                                        } else {
                                            $eq = $lesPhases[count($lesPhases) - $nbPhases_[$nbScdTour] + $i] . ' ' . 1;
                                        } ?>
                                        <?php if (isset($all_poule_id["$eq"][$_GET['tournoi_id']])): ?>
                                            <button type="button" class="btn btn-info" name="button<?= $eq; ?>"
                                                    onclick=dialogPoule('<?= $all_poule_id["$eq"][$_GET['tournoi_id']]; ?>')>
                                                Preciser Nombre de
                                                Set et Nombre de point pour <?= $eq; ?>
                                            </button>
                                        <?php endif; ?>
                                        <div class="row">
                                            <?php for ($k = 0; $k < count($matches); $k++): ?>
                                                <?php $match = $matches[$k];
                                                if ($match->nom == $eq): ?>
                                                    <div class="col-sm-9">
                                                        <div class="card  text-xs-center ">
                                                            <div class="card-block">
                                                                <div class="row card-text">
                                                                    <div class="col-xs-4">
                                                                        <div><i class="fa fa-calendar fa"></i></div>
                                                                        <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-4">
                                                                        <div><i class="fa fa-clock-o"
                                                                                aria-hidden="true"></i>
                                                                        </div>
                                                                        <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                                                    </div>
                                                                    <div class="col-xs-4 float-xs-right">
                                                                        <div>
                                                                            <i class="fa fa-map-marker"
                                                                               aria-hidden="true"></i>
                                                                        </div>
                                                                        <div>Stade</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <?php
                                                                if (empty($all_score[$match->id][0]) || empty($all_score[0][$match->id])) {
                                                                    $scoreH = "NR";
                                                                    $scoreA = "NR";
                                                                } else {
                                                                    $scoreH = $all_score[$match->id][0];
                                                                    $scoreA = $all_score[0][$match->id];
                                                                }
                                                                ?>
                                                                <?php $nb_set_score = $all_nb_set[$eq][$_GET['tournoi_id']]; ?>
                                                                <table class="table event-table card-text">
                                                                    <?php $p = 1; ?>
                                                                    <?php while (!isset($all_set_by_team_match[$p][$match->id][$match->team_id_home]) && $p <= count($all_set_by_team_match)) {
                                                                        $p++;
                                                                    }
                                                                    if ($p > count($all_set_by_team_match)) {
                                                                        $p = -1;
                                                                    } $h = $p; $a = $p; ?>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="text-left"><?= $all_teams[$matches[$k]->team_id_home]; ?></td>
                                                                        <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                            <td><?= isset($all_set_by_team_match[$h][$match->id][$match->team_id_home]) ? $all_set_by_team_match[$h][$match->id][$match->team_id_home] : "NR";$h++; ?></td>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-left"><?= $all_teams[$matches[$k]->team_id_away]; ?></td>
                                                                        <?php for ($z = 1; $z <= $nb_set_score; $z++): ?>
                                                                            <td><?= isset($all_set_by_team_match[$a][$match->id][$match->team_id_away]) ? $all_set_by_team_match[$a][$match->id][$match->team_id_away] : "NR";$a++; ?></td>
                                                                        <?php endfor; ?>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php if ($organisateur->organisateur == $_SESSION['auth']): ?>

                                                                    <div>
                                                                        <button type="button" class="btn btn-info"
                                                                                name="button$j"
                                                                                onclick=dialog('<?= $all_teams[$matches[$k]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                                            Ajouter le score
                                                                        </button>
                                                                        <button type="button" class="btn btn-info"
                                                                                name="button$j"
                                                                                onclick=dialog2('<?= $all_teams[$matches[$k]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>','<?= $all_nb_set['poule 1'][$_GET['tournoi_id']]; ?>')>
                                                                            Modifier le score
                                                                        </button>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!--matches phase à élimination directe-->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel" value=""></h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="row-multistep">
                                <form id="form1" action="" method="post">


                                    <div class="col-xs-5">
                                        <input type="hidden" name="idMatch" id="idMatch" value="">

                                    </div>


                                    <div class="f1-buttons">
                                        <button type="submit" class="btn btn-success">Ajouter Score</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                            </button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>


            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel" value=""></h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="row-multistep">
                                <form id="form1" action="" method="post">


                                </form>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                            </button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>

            <!--Modal Ajout set et point pour une poule-->


            <div class="modal fade" id="myModalPoule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel" value=""></h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="row multistep">
                                <form action="" method="post">


                                    <div class="col-xs-7">
                                        Nombre de set:

                                    </div>
                                    <div class="col-xs-3"><input type="text" name="nombreSet" id="nombreSet" value="">
                                        <input type="hidden" name="idPoule" id="idPoule" value="">
                                    </div>


                                    <div class="col-xs-7">
                                        Nombre de point :

                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="nombrePoint" id="nombrePoint" value="">
                                    </div>


                                    <div class="f1-buttons">
                                        <button type="submit" class="btn btn-success">Valider</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                            </button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>


            <script type="text/javascript">

                function dialog(home, away, idMatch, nbset) {
                    //alert("Equipe Dom " + home + "Equipe Ext " + away + "idMatch " + idMatch + "nb Set " + nbset);
//document.getElementById("toto").data-target="#myModal";


                    $('#myModal').modal();
//$('#myModal').find('.modal-title').val(home + away+idMatch);
                    $(".modal-body #id3").val(home + away + idMatch);
                    $(".modal-body #idHome").val(home);
                    $(".modal-body #idAway").val(away);
                    $(".modal-body #idMatch").val(idMatch);
                    var maxField = nbset;
                    var container = $('#myModal .row-multistep #form1');
                    var inputHtml = '<div class="f1-buttons"><button type="submit" class="btn btn-success">Ajouter Score</button> </div>';

                    $(container).empty();
                    var x = 1;
                    for (x; x <= maxField; x++) {
                        var fieldhtml = '<div class="col-xs-7"> <div class="col-xs-5"> <input type="hidden" name="idMatch' + x + '" id ="idMatch' + x + '" value="' + idMatch + '" > <input type="hidden" name="setNb' + x + '" id ="setNb' + x + '" value="' + nbset + '" > <input type="hidden" name="numeroSet' + x + '" id ="numeroSet' + x + '" value="' + x + '" > <input type="text" name="idHome' + x + '" id ="idHome' + x + '" value="' + home + '" disabled=false></div> <div class="col-xs-3"><input type="text" name="idScoreH' + x + '" id ="idScoreH' + x + '" value=""></div></div> <div class="col-xs-7"> <div class="col-xs-5"><input type="text" name="idAway' + x + '" id ="idAway' + x + '" value="' + away + '" disabled=false></div><div class="col-xs-3"><input type="text" name="idScoreA' + x + '" id ="idScoreA' + x + '" value=""> ' + x + ' Set</div>'
                        $(container).append(fieldhtml);

                    }
                    $(container).append(inputHtml);
                }

                function dialog2(home, away, idMatch, nbset) {
////alert(home + away + idMatch);
//document.getElementById("toto").data-target="#myModal";

                    //alert("MODIFIER :Equipe Dom " + home + "Equipe Ext " + away + "idMacth " + idMatch + "nb Set " + nbset);
                    $('#myModal2').modal();
//$('#myModal2').find('.modal-title').val(home + away+idMatch);
                    $(".modal-body #id3").val(home + away + idMatch);
                    $(".modal-body #idHome2").val(home);
                    $(".modal-body #idAway2").val(away);
                    $(".modal-body #idMatch2").val(idMatch);

                    var maxField = nbset;
                    var container = $('#myModal2 .row-multistep #form1');
                    var inputHtml = '<div class="f1-buttons"><button type="submit" class="btn btn-success">Modifier Score</button> </div>';

                    $(container).empty();
                    var x = 1;
                    for (x; x <= maxField; x++) {
                        var fieldhtml = '<div class="col-xs-7"> <div class="col-xs-5"> <input type="hidden" name="idMatchMod' + x + '" id ="idMatchMod' + x + '" value="' + idMatch + '" > <input type="hidden" name="setNbMod' + x + '" id ="setNbMod' + x + '" value="' + nbset + '" >  <input type="hidden" name="numeroSetMod' + x + '" id ="numeroSetMod' + x + '" value="' + x + '" ><input type="text" name="idHomeMod' + x + '" id ="idHomeMod' + x + '" value="' + home + '" disabled=false></div> <div class="col-xs-3"><input type="text" name="idScoreHMod' + x + '" id ="idScoreHMod' + x + '" value=""></div></div> <div class="col-xs-7"> <div class="col-xs-5"><input type="text" name="idAwayMod' + x + '" id ="idAwayMod' + x + '" value="' + away + '" disabled=false></div><div class="col-xs-3"><input type="text" name="idScoreAMod' + x + '" id ="idScoreAMod' + x + '" value=""> ' + x + ' Set</div>'
                        $(container).append(fieldhtml);

                    }
                    $(container).append(inputHtml);

                }


                function dialogPoule(idPoule) {
                    //alert(idPoule);
                    $('#myModalPoule').modal();
                    $(".modal-body #idPoule").val(idPoule);
                    /* var maxField=10;
                     var container =$('.modal-body ');
                     var fieldhtml =    '<div class="col-xs-7">Nombre de set:</div><div class="col-xs-3">  <input type="text" name="nombreSet" id ="nombreSet" value="" ><input type="hidden" name="idPoule" id ="idPoule" value="" ></div><div class="col-xs-7">Nombre de point :</div><div class="col-xs-3"> <input type="text" name="nombrePoint" id ="nombrePoint" value=""></div>';
                     var x =1;
                     for (x;x<maxField;x++){
                     $(container).append(fieldhtml);
                     }*/

                }
                function desactiver(i) {
////alert("desactiver");
                    document.getElementById('prix' + i).disabled = true;
                    document.getElementById('prix' + i).value = "0";

                }
            </script>