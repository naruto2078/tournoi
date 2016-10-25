<?php
if(!isset($_SESSION['auth']) || $_GET['id'] != $_SESSION['auth']) {
    header('HTTP/1.0 404 Not Found');
    die('Page introuvable');
}
?>
<div class="container">
    <div class="row">
        <div class=" col-md-4 col-md-offset-3">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Renseignez le nom de l'équipe</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="" method="post">
                        <fieldset>
                            <div class="form-group">
                                <?= $form->input('name', 'Nom équipe', ['placeholder' => "Nom de l'équipe"]); ?>
                            </div>

                            <button type="submit" class="btn btn-lg btn-success btn-block">Se connecter</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>