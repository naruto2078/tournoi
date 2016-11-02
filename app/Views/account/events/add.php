<!-- Top content -->

<div class="container">

    <div class="row multistep">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
            <form role="form" action="" method="post" class="f1 events">

                <h3>Créez votre évènement</h3>
                <p>Veuillez remplir le formulaire suivant</p>
                <div class="f1-steps " >
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
                    <!-- <div class="f1-step">
                         <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                         <p>social</p>
                     </div>-->
                </div>

                <fieldset>
                    <h4>Intitulé, lieu et date:</h4>
                    <div class="form-group">
                        <?= $form->input('nom', 'Intitule', ['placeholder' => 'Intitulé du tournoi...', 'id' => 'nom']); ?>
                        <!--<label class="sr-only" for="f1-first-name">First name</label>

                        <input type="text" name="f1-first-name" placeholder="First name..."
                               class="f1-first-name form-control" id="f1-first-name">-->
                    </div>
                    <div class="form-group">
                        <?= $form->input('lieu', 'Lieu', ['placeholder' => 'Lieu...', 'id' => 'lieu']); ?>
                        <!--<label class="sr-only" for="f1-last-name">Last name</label>
                        <input type="text" name="f1-last-name" placeholder="Last name..."
                               class="f1-last-name form-control" id="f1-last-name">-->
                    </div>
                    <div class="form-group">
                        <?= $form->input('date', 'Date', ['placeholder' => 'Date du tournoi...', 'id' => 'date']); ?>
                        <!--<label class="sr-only" for="f1-about-yourself">About yourself</label>
                        <textarea name="f1-about-yourself" placeholder="About yourself..."
                                  class="f1-about-yourself form-control" id="f1-about-yourself"></textarea>-->
                    </div>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-next">Suivant</button>
                    </div>
                </fieldset>

                <fieldset>
                    <h4>Type de jeu et nombre de tournois initiaux:</h4>
                    <div class="form-group">
                        <?= $form->select('type_de_jeu', 'Type de jeu', $options); ?>
                        <!--<label class="sr-only" for="f1-email">Email</label>
                        <input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control"
                               id="f1-email">-->
                    </div>
                    <div class="form-group">
                        <?= $form->input('nb_tournois', 'Nombre de tournois', ['type' => 'number', 'placeholder' => 'Nombre de tournois...', 'id' => 'nb_tournois']); ?>
                        <!--<label class="sr-only" for="f1-password">Password</label>
                        <input type="password" name="f1-password" placeholder="Password..."
                               class="f1-password form-control" id="f1-password">-->
                    </div>

                    <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Précédent</button>
                        <button type="submit" class="btn btn-submit">Valider</button>
                    </div>
                </fieldset>

                <!--  <fieldset>
                      <h4>Social media profiles:</h4>
                      <div class="form-group">
                          <label class="sr-only" for="f1-facebook">Facebook</label>
                          <input type="text" name="f1-facebook" placeholder="Facebook..." class="f1-facebook form-control"
                                 id="f1-facebook">
                      </div>
                      <div class="form-group">
                          <label class="sr-only" for="f1-twitter">Twitter</label>
                          <input type="text" name="f1-twitter" placeholder="Twitter..." class="f1-twitter form-control"
                                 id="f1-twitter">
                      </div>
                      <div class="form-group">
                          <label class="sr-only" for="f1-google-plus">Google plus</label>
                          <input type="text" name="f1-google-plus" placeholder="Google plus..."
                                 class="f1-google-plus form-control" id="f1-google-plus">
                      </div>
                      <div class="f1-buttons">
                          <button type="button" class="btn btn-previous">Previous</button>
                          <button type="submit" class="btn btn-submit">Submit</button>
                      </div>
                  </fieldset>-->

            </form>
        </div>
    </div>
</div>





