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
            <!--<form action="" method="post">-->
            <div class="tab-pane active" id="panel1" role="tabpanel">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipe</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($poules["poule 1"] as $k => $equipe): ?>
                        <tr>
                            <td><?= $k + 1; ?></td>
                            <td><?= $equipe; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                <div class="row">
                    <?php for ($i = 0; $i < count($matches); $i++): ?>
                        <?php $match = $matches[$i];
                        if ($match->nom == "poule 1"): ?>
                            <div class="col-sm-6">
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
                                        <div class="col-xs-5">
                                            <?= $all_teams[$matches[$i]->team_id_home]; ?>
                                        </div>
                                        <div class="col-xs-2">SCORE</div>
                                        <div class="col-xs-5"><?= $all_teams[$matches[$i]->team_id_away]; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <?php for ($i = 2; $i <= $numero; $i++): ?>
                <div class="tab-pane" id="panel<?= $i; ?>" role="tabpanel">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Equipe</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($poules['poule ' . $i] as $k => $equipe): ?>
                            <tr>
                                <td><?= $k + 1; ?></td>
                                <td><?= $equipe; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <div class="row">
                        <?php for ($j = 0; $j < count($matches); $j++): ?>
                            <?php $match = $matches[$j];
                            if ($match->nom == "poule ".$i): ?>
                                <div class="col-sm-6">
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
                                            <div class="col-xs-5">
                                                <?= $all_teams[$matches[$i]->team_id_home]; ?>
                                            </div>
                                            <div class="col-xs-2">SCORE</div>
                                            <div class="col-xs-5"><?= $all_teams[$matches[$i]->team_id_away]; ?></div>
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
</div>


