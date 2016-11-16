<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3>Gestion des équipes</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">

    <div class="col-sm-5">
        <div class="card">
            <div class="view overlay hm-white-slight">
                <div class="col-xs-3 float-xs-left" style="padding-top: 30px">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 float-xs-right" style="padding-left: 138px; padding-top: 66px">
                    <h3><?= $team->name; ?></h3>
                </div>
            </div>
            <div class="card-block event-card">
                <div class="col-md-12">
                    <table class="table event-table">
                        <tbody>
                        <tr>
                            <td class="text-left">Club</td>
                            <td style="width: 50%;"> <?= $team->nom; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Niveau</td>
                            <td style="width: 50%;"><?= $team->level; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Nombre de joueurs</td>
                            <td style="width: 50%;"><?= $nbPlayers->nbplayers ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row text-xs-center">
                        <div class="col-sm-12">
                            <a href="<?= $team->addPlayerUrl(); ?>">
                                <button class="btn btn-success "><span
                                        style="color: #ffffff">Ajouter un joueur</span>
                                </button>
                            </a>

                            <button class="btn btn-danger">Supprimer un joueur</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <h4>Liste des joueurs</h4>
        <table class="table table-bordered">
            <thead>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Niveau</th>
            </thead>
            <tbody>
            <?php foreach ($playersInfo as $player): ?>
                <tr>
                    <td><?= $player->nom; ?></td>
                    <td><?= $player->prenom; ?></td>
                    <td><?= $player->player_level; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>