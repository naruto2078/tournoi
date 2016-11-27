<div class="container">
    <div class="row multistep">
        <div class="offset-md-3 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
            <div class="card wow fadeInRight">
                <div class="card-block">
                    <form role="form" action="" method="post" class="f1 events">

                        <h3>Date et heure des matches</h3>
                        <p>Veuillez remplir le formulaire suivant</p>
                        <?php for ($i = 0; $i < count($matches); $i++): ?>
                            <fieldset>
                                <p> <?= $all_teams[$matches[$i]->team_id_home]; ?>
                                    VS <?= $all_teams[$matches[$i]->team_id_away]; ?></p>

                                <div class="md-form">
                                    <?= $form->input('date' . $matches[$i]->id, 'Date', ['placeholder' => 'Date du match...', 'class' => 'date']); ?>
                                </div>
                                <div class="md-form">
                                    <?= $form->input('heure' . $matches[$i]->id, 'Heure', ['placeholder' => 'Heure match', 'type' => 'number']); ?>
                                </div>
                                <div class="md-form">
                                    <?= $form->input('minute' . $matches[$i]->id, 'Minute', ['placeholder' => 'Minute match', 'type' => 'number']); ?>
                                </div>
                                <div class="f1-buttons">
                                    <?php if ($i < count($matches) - 1) { ?>
                                        <button type="button" class="btn btn-previous">Précédent
                                        </button>
                                        <button type="button" class="btn btn-next">Suivant</button>
                                    <?php } elseif ($i == count($matches) - 1) { ?>
                                        <button type="button" class="btn btn-previous">Précédent
                                        </button>
                                        <button type="submit" class="btn btn-submit">Valider</button>
                                    <?php } ?>
                                </div>
                            </fieldset>
                        <?php endfor; ?>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
