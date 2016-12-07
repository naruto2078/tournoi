<div class="container">
    <div class="row multistep">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
            <form role="form" action="" method="post" class="f1 tournois">
                <h3>Renseignement sur les différents tournois</h3>
                <p></p>
                <div class="f1-steps">
                    <div class="f1-progress">
                        <div class="f1-progress-line" data-now-value="<?= 100 / intval($nb_tournois) / 2; ?>"
                             data-number-of-steps="<?= intval($nb_tournois); ?>"
                             style="width: <?= 100 / intval($nb_tournois) / 2; ?>%;"></div>
                    </div>
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-trophy"></i></div>
                        <p>1er tournoi</p>
                    </div>
                    <?php for ($i = 2; $i <= intval($nb_tournois); $i++): ?>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-trophy"></i></div>
                            <p><?= $i; ?>e tournoi</p>
                        </div>
                    <?php endfor; ?>
                </div>
                <?php for ($i = 1; $i <= intval($nb_tournois); $i++): ?>
                    <fieldset>
                        <div class="form-group">
                            <?= $form->select("genre$i", 'genre', $genres); ?>
                        </div>
                        <div class="form-group">
                            <?= $form->select("nom_categorie$i", 'nom_categorie', $categories); ?>
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                                <input id="gratuit" type="radio" name=<?php echo "typetarif".$i ;?> value="gratuit" onclick="desactiver(<?php echo $i ;?>)"/> Gratuit
                                <input id="payant" type="radio" name=<?php echo "typetarif".$i ;?> value="payant" onclick="activer(<?php echo $i ;?>)"/> Payant
                            </div>
=======
                            <input id="gratuit" type="radio" name="typetarif" value="gratuit"
                                   onclick="desactiver(<?php echo $i; ?>)"/> Gratuit
                            <input id="payant" type="radio" name="typetarif" value="payant"
                                   onclick="activer(<?php echo $i; ?>)"/> Payant
                        </div>
>>>>>>> 8a3fa56398fc0fbd4ad2d455da12bfac5363f356
                        <div class="form-group">
                            <?= $form->input('prix', 'prix', ['type' => 'number', 'placeholder' => 'Prix', 'id' => 'prix' . $i, 'disabled' => 'true']); ?>

                        </div>
                        <div class="f1-buttons">
                            <?php if ($i < intval($nb_tournois)) { ?>
                                <button type="button" class="btn btn-next">Suivant</button>
                            <?php } elseif ($i == intval($nb_tournois)) { ?>
                                <button type="button" class="btn btn-previous">Précédent</button>
                                <button type="submit" class="btn btn-submit">Valider</button>
                            <?php } ?>
                        </div>
                    </fieldset>
                <?php endfor; ?>
            </form>
        </div>
    </div>
    <script type="text/javascript">

        function activer(i) {
//alert("activer");
            document.getElementById('prix' + i).disabled = false;

        }

<<<<<<< HEAD
  function desactiver(i) {
alert(i);
document.getElementById('prix'+i).disabled=true;
document.getElementById('prix'+i).value="0";
=======
        function desactiver(i) {
//alert("desactiver");
            document.getElementById('prix' + i).disabled = true;
            document.getElementById('prix' + i).value = "0";
>>>>>>> 8a3fa56398fc0fbd4ad2d455da12bfac5363f356

        }
    </script>