<main>
    <div class="row">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"
                style="text-transform: none">
            Clôturer ce tour
        </button>
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
                        <h4 class="modal-title" id="myModalLabel">Clôturer ce tour</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <div class="row multistep">
                            <div class="col-md-10">
                                <form action="" method="post">
                                    <div class="col-md-12">
                                        <div> Les équipes participants au prochain tour</div>
                                        <?php foreach ($lesPoules as $lapoule): ?>
                                            <div class="col-md-3">
                                                <ul>
                                                    <?= ucfirst($lapoule); ?>
                                                    <?php foreach ($all_teams_poule as $k => $v): ?>
                                                        <?php if ($v == $lapoule) : ?>
                                                            <li>
                                                                <div class="md-form">
                                                                    <input type="checkbox"
                                                                           name="<?= str_replace(" ", "_", $lapoule . '[]'); ?>"
                                                                           value="<?= $k; ?>"><?= $k; ?>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php if($tour->tour_max == 1):?>
                                    <div class="col-md-12">
                                        <div>
                                            <h4><input type="checkbox" name="option_consolante" id="option_consolante">Consolante?
                                            </h4>
                                        </div>
                                        <div id="consolante-equipes">
                                            <?php foreach ($lesPoules as $lapoule): ?>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <?= ucfirst($lapoule); ?>
                                                        <?php foreach ($all_teams_poule as $k => $v): ?>
                                                            <?php if ($v == $lapoule) : ?>
                                                                <li>
                                                                    <div class="md-form">
                                                                        <input type="checkbox"
                                                                               name="consolante[]"
                                                                               value="<?= $k; ?>"><?= $k; ?>
                                                                    </div>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <button type="submit" class="btn btn-primary" name="btn1"
                                            style="text-transform: none">Valider
                                    </button>
                                </form>
                            </div>
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
    </div>
    <div class="row">
        <?php if ($done): ?>

            <div class="col-md-10">
                <form action="" method="post">
                    <div>
                        <ul>
                            <?php $tmp = 0;
                            $tmp2 = 0;

                            for ($i = 0; $i < count($rencontres); $i++): ?>
                                <li>
                                    <div class="col-sm-5">
                                        <div class="card wow fadeInRight">
                                            <div class="card-block">
                                                <div class="card-text">
                                                    <h4 class="text-xs-center">Match</h4>
                                                </div>
                                                <div class="col-sm-12">
                                                    <?= $form->select($phases[count($rencontres)] . 'home' . $tmp2, "Equipe 1", $options, $all_teams_reverse[$rencontres[$i]]); ?>
                                                    <div class="text-xs-center">VS</div>
                                                    <?= $form->select($phases[count($rencontres)] . 'away' . $tmp2, "Equipe 2", $options, $all_teams_reverse[$rencontres[++$i]]); ?>
                                                    <div class="md-form">
                                                        <?= $form->input('date' . $tmp2, 'Date', ['placeholder' => 'Date du match...', 'class' => 'date']); ?>
                                                    </div>
                                                    <div class="md-form">
                                                        <?= $form->input('heure' . $tmp2, 'Heure', ['placeholder' => 'Heure match', 'type' => 'number']); ?>
                                                    </div>
                                                    <div class="md-form">
                                                        <?= $form->input('minute' . $tmp2++, 'Minute', ['placeholder' => 'Minute match', 'type' => 'number']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
            </div>
            <div class="offset-md-4 col-md-4">
                <button type="submit" class="btn btn-primary" name="btn2">Valider
                </button>
            </div>
            </form>

        <?php endif; ?>
    </div>
</main>
<script type="text/javascript">
    $("#consolante-equipes").hide();
    $('#option_consolante').change(function () {
        if ($(this).prop('checked')) {
            $("#consolante-equipes").show();
        } else {
            $("#consolante-equipes").hide();
        }
    })
    function activer(i) {

        document.getElementById(i).disabled = false;

    }

    function desactiver(i) {
//alert("desactiver");
        document.getElementById(i).disabled = true;
        document.getElementById(i).value = "0";

    }
</script>