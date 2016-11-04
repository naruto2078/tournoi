<!-- Top content -->

<div class="container">

    <div class="row multistep">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
            <form role="form" action="" method="post" class="f1 events">

                <h3>Inscription d'une Equipe</h3>
                <p>Veuillez remplir le formulaire suivant</p>
                <div class="f1-steps " >
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
                    <!-- <div class="f1-step">
                         <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                         <p>social</p>
                     </div>-->
                </div>

                <fieldset>
                    <h4>Nom du Club:</h4>
                    <div class="form-group">
                        <?= $form->input('nom', 'Intitule', ['placeholder' => 'Nom Club...', 'id' => 'nom']); ?>
                        <!--<label class="sr-only" for="f1-first-name">First name</label>

                        <input type="text" name="f1-first-name" placeholder="First name..."
                               class="f1-first-name form-control" id="f1-first-name">-->
                    </div>
                 
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-next">Suivant</button>
                    </div>
                </fieldset>

                <fieldset>
                    <h4>Nom de l'équipe:</h4>
                    
                    <div class="form-group">
                        <?= $form->input('nom_teams', 'Nom Equipe', [ 'placeholder' => 'Nom de l\'équipe']); ?>
                        <!--<label class="sr-only" for="f1-password">Password</label>
                        <input type="password" name="f1-password" placeholder="Password..."
                               class="f1-password form-control" id="f1-password">-->
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





