<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3 style="color: #414C59; margin-bottom: 30px">Les participants</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">
    <div class="col-md-10">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Equipe</th>
                <th>Club</th>
                <th>Niveau</th>
                <th>A payé les droits</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($participants as $participant): ?>
                <tr>
                    <td><?= $participant->name; ?></td>
                    <td><?= $participant->nom; ?></td>
                    <td><?= $participant->level; ?></td>
                    <td><?php if ($participant->a_paye == '0') {
                            echo 'Non';
                        } else {
                            echo 'Oui';
                        } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-xs-center">
            <a href="#">
                <button class="btn btn-warning">Clôturer les inscriptions</button>
            </a>
        </div>
    </div>
</div>