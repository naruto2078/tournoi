<div class="row" style="padding-top: 100px">

    <?php
    foreach ($tournois as $tournoi) : ?>
        <div class="col-sm-5 col">
            <div class="panel panel-default event-panel">
                <div class="panel-heading">
                    <div class="row header">
                        <div class="col-xs-3">
                            <i class="fa fa-trophy fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>
                                <h3><?= $tournoi->nom; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row content">
                        <div class="col-md-12">
                            <table class="table event-table">
                                <tbody>
                                <tr>
                                    <td class="text-left">Genre</td>
                                    <td style="width: 50%;"> <?= $tournoi->genre; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Catégorie</td>
                                    <td style="width: 50%;"><?= $tournoi->nom_categorie; ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $tournoi->id; ?>">
                                <button type="submit" class="btn btn-primary btn-block">Participer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered" style="margin-top: 100px;">
            <thead>

            <tr>
                <th>Evènement</th>
                <th>Genre</th>
                <th>Categorie</th>
                <th>Participer</th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($tournois as $tournoi) :?>

                <tr>
                    <th scope="row"><?= $tournoi->nom; ?></th>
                    <td><?= $tournoi->genre; ?></td>
                    <td><?= $tournoi->nom_categorie; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $tournoi->id; ?>">
                            <button type="submit" class="btn btn-primary">Participer</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>