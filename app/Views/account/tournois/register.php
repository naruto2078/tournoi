<div class="row">
    <div class="col-lg-12 text-xs-center" style="padding-top: 40px">
        <h3>Inscription à un tournoi: Choisissez le tournoi</h3>
    </div>
</div>
<hr class="extra-margins">

<div class="row">
    <?php foreach ($tournois as $tournoi) : ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="view overlay hm-white-slight">
                    <div class="col-xs-3 float-xs-left" style="padding-top: 30px">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 float-xs-right" style="padding-left: 138px; padding-top: 66px">
                        <h3><?= $tournoi->nom; ?></h3>
                    </div>
                </div>
                <div class="card-block event-card">
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
                        <div class="row text-xs-center">
                            <form action="" method="post">
                                <?=$form->select('team','Equipe',$teams);?>
                                <input type="hidden" name="id" value="<?= $tournoi->id; ?>">
                                <button type="submit" class="btn btn-success">Participer</button>
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