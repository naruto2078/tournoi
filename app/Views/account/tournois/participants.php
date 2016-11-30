<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3 style="color: #414C59; margin-bottom: 30px">Les participants</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">
    <div class="col-md-10">
        <?php if ($estOuvert->inscription_ouverte == '1'): ?>

            <!-- Button trigger modal -->
            <div class="text-xs-center">
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal"
                        style="text-transform: none">
                    Clôturer les inscriptions
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Choix de la formule du 1er tour</h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="row multistep">
                                <form action="" method="post" class="md-form offset-md-1 col-md-10">
                                    <?= $form->select('formule', 'Formule', $diviseurs); ?>

                                    <button type="submit" class="btn btn-primary" name="btn1"
                                            style="text-transform: none">Valider
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                            </button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>

            <?php if ($done): ?>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a href="#panel1" class="nav-link" data-toggle="tab" role="tab">Poule 1</a>
                    </li>
                    <?php for ($i = 2; $i <= $numero; $i++): ?>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#panel<?= $i; ?>"
                               role="tab">Poule <?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
                <form action="" method="post">
                    <div class="tab-content">
                        <!--<form action="" method="post">-->
                        <div class="tab-pane active" id="panel1" role="tabpanel">
                            <ul>
                                <?php foreach ($poules[0] as $k => $equipe): ?>
                                    <li>
                                        <?= $form->select("poule-1-$k", "Poule 1", $options, $equipe); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php for ($i = 2; $i <= $numero; $i++): ?>
                            <div class="tab-pane" id="panel<?= $i; ?>" role="tabpanel">
                                <ul>
                                    <?php foreach ($poules[$i - 1] as $k => $equipe): ?>
                                        <li>
                                            <?= $form->select("poule-$i-$k", "Poule $i", $options, $equipe); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endfor; ?>


                        <!--</form>-->
                    </div>
                    <div class="text-xs-right">
                        <input type="hidden" name="formule" value="<?= $numero; ?>">
                        <button type="submit" name="create" class="btn btn-secondary" style="text-transform: none">Créer
                            les groupes
                        </button>
                    </div>
                </form>
            <?php endif; ?>

        <?php endif; ?>

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


    </div>
</div>
<script type="text/javascript">

    function activer(i) {
        document.getElementById('prix' + i).disabled = false;

    }

    function desactiver(i) {
        document.getElementById('prix' + i).disabled = true;
        //document.getElementById('prix' + i).value = "0";

    }
</script>