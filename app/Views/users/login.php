<?php if ($errors) : ?>
    <div class="alert alert-danger offset-md-3 col-md-6" style="margin-top: 60px; text-align: center">
        Identifiants incorrects
    </div>
<?php endif; ?>
<main class="main">

    <div class="row">
        <!--Second column-->

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
                        <?= $form->input('username', 'Login', ['placeholder' => "Nom d'utilisateur"]); ?>
                    </div>

                    <div class="md-form">
                        <?= $form->input('password', 'Mot de passe', ['type' => 'password', 'placeholder' => 'Mot de passe']); ?>
                    </div>

                    <div class="text-xs-center">
                        <button type="submit" class="btn btn-primary btn-lg">Connexion</button>
                    </div>
                    </form>
                </div>
            </div>
            <!--/.Form-->
        </div>
        <!--/Second column-->
    </div>
</main>