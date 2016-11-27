<!-- Top content -->
<main class="main">
    <div class="row multistep">
        <div class="offset-md-3 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
            <div class="card wow fadeInRight">
                <div class="card-block">
                    <form role="form" action="" method="post" class="f1 events">

                        <h3>Créez votre évènement</h3>
                        <p>Veuillez remplir le formulaire suivant</p>
                        <div class="f1-steps ">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="25" data-number-of-steps="2"
                                     style="width: 25%;"></div>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-info"></i></div>
                                <p>A propos</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-trophy"></i></div>
                                <p>Tournois</p>
                            </div>
                        </div>

                        <fieldset>
                            <h4>Intitulé, lieu et date:</h4>
                            <div class="md-form">
                                <?= $form->input('nom', 'Intitule', ['placeholder' => 'Intitulé du tournoi...', 'id' => 'nom']); ?>
                            </div>
                            <div class="md-form">
                                <?= $form->input('lieu', 'Lieu', ['placeholder' => 'Lieu...', 'id' => 'lieu']); ?>

                            </div>
                            <div class="md-form">
                                <?= $form->input('date', 'Date', ['placeholder' => 'Date du tournoi...', 'id' => 'date']); ?>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-next">Suivant</button>
                            </div>
                        </fieldset>

                        <fieldset>
                            <h4>Type de jeu et nombre de tournois initiaux:</h4>
                            <div class="md-form">
                                <?= $form->select('type_de_jeu', 'Type de jeu', $options); ?>

                            </div>
                            <div class="md-form">
                                <?= $form->input('nb_tournois', 'Nombre de tournois', ['type' => 'number', 'placeholder' => 'Nombre de tournois...', 'id' => 'nb_tournois']); ?>

                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-previous">Précédent</button>
                                <button type="submit" class="btn btn-submit">Valider</button>
                            </div>
                        </fieldset>
                        

                    </form>
                </div>
            </div>

        </div>
    </div>
</main>




