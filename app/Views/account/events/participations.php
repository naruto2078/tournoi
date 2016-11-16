<div class="row">
    <div class="col-lg-12 text-xs-center" style="padding-top: 40px">
        <h3>Mes participations</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">
    <?php foreach ($participations as $event) : ?>

        <div class="col-md-4">
            <div class="card">
                <!--image-->
                <div class="view overlay hm-white-slight">
                    <img src="/img/rio_2016_olympics_volleyball-wallpaper-960x540.jpg" alt="" class="img-fluid">
                    <a href="#">
                        <div class="mask"></div>
                    </a>
                </div>
                <!--image-->
                <!--card content-->
                <div class="card-block event-card">
                    <table class="table event-table card-text">
                        <tbody>
                        <tr>
                            <td class="text-left">Evènement</td>
                            <td style="width: 50%;"> <?= $event->nom; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Lieu</td>
                            <td style="width: 50%;"> <?= $event->lieu; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Date</td>
                            <td style="width: 50%;"><?= date_format(new DateTime($event->date), 'd-m-Y'); ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Nombre de tournois</td>
                            <td style="width: 50%;"><?= $event->nb_tournois; ?> tournois</td>
                        </tr>
                        <tr>
                            <td class="text-left">Type de jeu</td>
                            <td style="width: 50%;"><?= $event->type_de_jeu; ?>x<?= $event->type_de_jeu; ?> joueurs
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="<?= $event->details(); ?>" class="btn btn-primary">Détails</a>
                </div>
                <!--card content-->
            </div>
        </div>
    <?php endforeach; ?>
</div>

