<div class="row">
    <div class="col-lg-12 text-xs-center" style="padding-top: 40px">
        <h3>Inscription à un tournoi: Choisissez l'évènement</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">
    <?php foreach ($events as $event) : ?>

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
                        <tr>
                            <td class="text-left">Statut</td>
                            <td style="width: 50%; color: #30CFC0;font-weight: 600;">
                                <?php if ($event->inscription_ouverte) {
                                    echo "Inscriptions ouverte";
                                } else {
                                    echo "Inscriptions closes";
                                } ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php if ($event->inscription_ouverte): ?>
                        <a href="<?= $event->Url(); ?>" class="btn btn-primary">Détails</a>
                    <?php endif; ?>
                </div>
                <!--card content-->
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" style="margin-top: 100px">
            <thead>

            <tr>
                <th>Nom</th>
                <th>Lieu</th>
                <th>Date</th>
                <th>Type de Jeu</th>
                <th>Nombres de tournois</th>

            </tr>
            </thead>

            <tbody>
            <?php
            foreach ($events as $event) :?>

                <tr>
                    <th scope="row"><a href="<?= $event->Url(); ?>"><?= $event->nom; ?></a></th>
                    <td><?= $event->lieu; ?></td>
                    <td><?= date_format(new DateTime($event->date), 'd-m-Y'); ?></td>
                    <td><?= $event->type_de_jeu; ?></td>
                    <td><?= $event->nb_tournois; ?></td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</diV>
</div>
