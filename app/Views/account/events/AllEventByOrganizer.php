<div class="row">
    <div>
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
                    <th scope="row"><a href="<?= $event->getUrl(); ?>"><?= $event->nom; ?></a></th>
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
