<?php if ($errors) : ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class=" col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-3 form login">
            <div class="form-top-line"></div>
            <form role="form" action="" method="post">
                <h3><i class="fa fa-lock" aria-hidden="true"></i>Connexion</h3>
                <div class="form-group">
                    <?= $form->input('username', 'Login', ['placeholder' => "Nom d'utilisateur"]); ?>
                </div>
                <div class="form-group">
                    <?= $form->input('password', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Mot de passe']); ?>
                </div>

                <button type="submit" class="btn  btn-primary btn-block">Connexion</button>

            </form>
        </div>
    </div>
</div>