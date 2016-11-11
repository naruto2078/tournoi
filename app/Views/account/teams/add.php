<!-- Top content -->
<?php if ($errors) : ?>
    <div class="alert alert-danger">
        Un club avec ce même nom existe déjà
    </div>
<?php endif; ?>
<div class="row multistep">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
        <form role="form" action="" method="post" class="f1 events">

            <h3>Inscription d'une Equipe</h3>
            <p>Veuillez remplir le formulaire suivant</p>
            <div class="f1-steps ">
                <div class="f1-progress">
                    <div class="f1-progress-line" data-now-value="25" data-number-of-steps="2"
                         style="width: 25%;"></div>
                </div>
                <div class="f1-step active">
                    <div class="f1-step-icon"><i class="fa fa-info"></i></div>
                    <p>Club</p>
                </div>
                <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-trophy"></i></div>
                    <p>Equipe</p>
                </div>
            </div>

            <fieldset>
                <h4>Nom du Club:</h4>
                <div class="form-group">
                    <?= $form->input('nomClub', 'Intitule', ['placeholder' => 'Nom Club...', 'id' => 'nom']); ?>
                </div>

                <div class="f1-buttons">
                    <button type="button" class="btn btn-next">Suivant</button>
                </div>
            </fieldset>

            <fieldset>
                <h4>Nom de l'équipe:</h4>

                <div class="form-group">
                    <?= $form->input('nomTeam', 'Nom Equipe', ['placeholder' => 'Nom de l\'équipe']); ?>
                    <!--<label class="sr-only" for="f1-password">Password</label>
                    <input type="password" name="f1-password" placeholder="Password..."
                           class="f1-password form-control" id="f1-password">-->
                </div>

                <!--<div class="form-group">
                form->input('levelTeam', 'Niveau Equipe', ['placeholder' => 'Niveau de l\'équipe']);-
                </div>-->
                <div class="f1-buttons">
                    <button type="button" class="btn btn-previous">Précédent</button>
                    <button type="submit" class="btn btn-submit">Valider</button>
                </div>
            </fieldset>


        </form>
    </div>
</div>





