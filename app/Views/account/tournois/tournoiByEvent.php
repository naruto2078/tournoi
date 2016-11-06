<div class="row">
    <table class="table" style="margin-top: 100px;">
        <thead>

        <tr>
            <th>Nom</th>
            <th>Genre</th>
            <th>Categorie</th>
            <th>Gestion</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($tournois as $tournoi) :?>

            <tr>
                <th scope="row"><?= $tournoi->nom; ?></th>
                <td><?= $tournoi->genre; ?></td>
                <td><?= $tournoi->nom_categorie; ?></td>
                <td><a href="<?= $tournoi->getUrl(); ?>">
                        <button class="btn btn-primary">Gérer</button>
                    </a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>