<div class="row" style="padding-top: 100px">
    <?php
    foreach ($events as $event) : ?>
        <div class="col-sm-6">
            <div class="panel panel-default event-panel">
                <div class="panel-heading">
                    <div class="row header">
                        <div class="col-xs-3">
                            <i class="fa fa-trophy fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>
                                <h3><?= $event->nom; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row content">
                        <div class="col-md-12">
                            <table class="table event-table">
                                <tbody>
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
                                    <td style="width: 50%;"><?= $event->type_de_jeu; ?>x<?=$event->type_de_jeu; ?> joueurs
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="<?= $event->Url(); ?>">
                                <button class="btn btn-primary btn-block">Détails</button>
                            </a>
                        </div>
                    </div>
                </div>

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
    </div></diV>
</div>
