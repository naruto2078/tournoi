<div class="row" style="padding-top: 100px">

    <?php
    foreach ($teams as $team) : ?>
        <div class="col-sm-5 col">
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
                                </tbody>
                            </table>
                            <a href="<?= $team->adminUrl(); ?>">
                                <button class="btn btn-primary btn-block">Gérer</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>