<?php if ($_GET['user'] != $_SESSION['user']) {
    header('HTTP/1.0 404 Not Found');
    die('Page introuvable');
} ?>
<hr class="extra-margins">

<div class="row">
    <div class="col-md-12">
        <h2>Bonjour <?= $_SESSION['user']; ?></h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4 text">
        <div class="card card-primary card-inverse">
            <div class="card-header">
                <div class="card-text">
                    Nombre d'évènements créés
                </div>
            </div>
            <div class="card-block">
                <div class="row card-text text-xs-center">
                    <div class="offset-sm-5"
                         style="font-size: 30px; border: 1px solid;border-radius: 50%;width: 50px;">
                        <a href="index.php?p=account.events.AllEventByOrganizer" class="card-link">
                            <?= $events->nbEvents; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text">
        <div class="card card-warning card-inverse">
            <div class="card-header">
                <div class="card-text">
                    Nombre de tournois
                </div>
            </div>
            <div class="card-block">
                <div class="row card-text text-xs-center">
                    <div class="offset-sm-5"
                         style="font-size: 30px; border: 1px solid;border-radius: 50%;width: 50px;">
                        <?= $tournois->nbTournois; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text">
        <div class="card card-success card-inverse">
            <div class="card-header">
                <div class="card-text">
                    Evènements en cours
                </div>
            </div>
            <div class="card-block">
                <div class="row card-text text-xs-center">
                    <div class="offset-sm-5"
                         style="font-size: 30px; border: 1px solid;border-radius: 50%;width: 50px;">
                        <?= $events_en_cours->nbEvents; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>