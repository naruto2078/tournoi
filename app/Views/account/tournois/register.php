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
                        <input type="hidden" name="id" value="<?=$tournoi->id;?>">
                        <button type="submit" class="btn btn-primary">Participer</button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>