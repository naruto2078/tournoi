<div class="row" style="padding-top: 100px">

    <div class="col-sm-5 ">
        <div class="panel panel-default event-panel">
            <div class="panel-heading">
                <div class="row header">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>
                            <h3><?= $team->name; ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row content">
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
                                <td style="width: 50%;"><?= $nbPlayers->nbplayers; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div style="margin-bottom: 10px"><a href="<?=$team->addPlayerUrl();?>"><button class="btn btn-success btn-block"><span style="color: #ffffff">Ajouter un joueur</span></button></a></div>
        <button class="btn btn-danger btn-block">Supprimer un joueur</button>
    </div>
</div>