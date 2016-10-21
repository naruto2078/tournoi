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
        <div class=" col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Inscrivez-vous</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post">
                        <fieldset>
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
                                <?= $form->input('password', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Mot de passe']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->input('password_confirm', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Confirmer Mot de passe']); ?>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">S'inscire</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>