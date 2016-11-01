<?php if ($error_login) : ?>
    <div class="alert alert-danger">
        Cet identifiant existe déjà
    </div>
<?php endif; ?>
<?php if ($error_password) : ?>
    <div class="alert alert-danger">
        Les mots de passe ne correspondent pas
    </div>

<?php endif; ?>

<div class="container">
    <div class="row">
        <div class=" col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-3 form">
            <div class="form-top-line"></div>
            <form   role="form" action="" method="post">
                <h3> <i class="fa fa-pencil" aria-hidden="true"></i>Inscription</h3>
                <div class="form-group">
                    <?= $form->input('nom', 'Nom', ['placeholder' => 'Nom']); ?>
                </div>
                <div class="form-group">
                    <?= $form->input('prenom', 'Prenom', ['placeholder' => 'Prénom']); ?>
                </div>
                <div class="form-group">
                    <?= $form->input('username', 'Login', ['placeholder' => 'Login']); ?>
                </div>
                <div class="form-group">
                    <?= $form->input('password', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Mot de passe', 'onsubmit' => "reset('password','password_confirm')", 'id' => 'password']); ?>
                </div>
                <div class="form-group">
                    <?= $form->input('password_confirm', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Confirmer Mot de passe', 'onsubmit' => "zero(this.value)", 'id' => 'password_confirm']); ?>
                </div>
                <button type="submit" class="btn  btn-primary btn-block">S'inscrire</button>

            </form>
        </div>
    </div>
</div>
