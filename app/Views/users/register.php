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

<main class="main">

    <div class="row">

        <div class="offset-md-4 col-md-5">
            <div class="form-top-line"></div>
            <!--Form-->
            <div class="card wow fadeInRight">
                <div class="card-block">
                    <!--Header-->
                    <div class="text-xs-center">
                        <h3><i class="fa fa-user"></i> Connexion </h3>
                        <br>
                    </div>

                    <!--Body-->
                    <form action="" method="post">
                        <div class="md-form">
                            <?= $form->input('nom', 'Nom', ['placeholder' => 'Nom']); ?>
                        </div>
                        <div class="md-form">
                            <?= $form->input('prenom', 'Prenom', ['placeholder' => 'Prénom']); ?>
                        </div>
                        <div class="md-form">
                            <?= $form->input('username', 'Login', ['placeholder' => 'Login']); ?>
                        </div>
                        <div class="md-form">
                            <?= $form->input('password', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Mot de passe', 'onsubmit' => "reset('password','password_confirm')", 'id' => 'password']); ?>
                        </div>
                        <div class="md-form">
                            <?= $form->input('password_confirm', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Confirmer Mot de passe', 'onsubmit' => "zero(this.value)", 'id' => 'password_confirm']); ?>
                        </div>
                        <div class="text-xs-center">
                            <button type="submit" class="btn  btn-primary btn-lg">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.Form-->
        </div>
    </div>
</main>
