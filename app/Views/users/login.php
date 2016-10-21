<?php if ($errors) : ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class=" col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Connectez-vous</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <?= $form->input('username', 'Login', ['placeholder' => "Nom d'utilisateur"]); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->input('password', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Mot de passe']); ?>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Se connecter</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>