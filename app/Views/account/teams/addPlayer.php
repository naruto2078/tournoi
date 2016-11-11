<div class="row multistep">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
        <form role="form" action="" method="post" class="f1 events">

            <h3>Ajout d'un joueur</h3>
            <p>Veuillez remplir le formulaire suivant</p>

            <fieldset>
                <h4>Nom, prénom et niveau du joueur</h4>
                <div class="form-group">
                    <?= $form->input('nom', 'Nom', ['placeholder' => 'Nom ...', 'id' => 'nom']); ?>
                </div>
                <div class="form-group">
                    <?= $form->input('prenom', 'Prénom', ['placeholder' => 'Prénom ...', 'id' => 'prenom']); ?>
                </div>
                <div class="form-group">
                    <?= $form->select('player_level', 'Niveau', $levels); ?>
                </div>
                <div class="f1-buttons">
                    <button type="submit" class="btn btn-submit">Valider</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
