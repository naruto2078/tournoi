<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3>Gestion des tournois</h3>
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
                            <a href="<?= $tournoi->adminUrl(); ?>">
                                <button class="btn btn-primary">Gérer</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
