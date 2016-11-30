<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3 style="color: #414C59; margin-bottom: 30px">Tournoi <?= $tournoi->nom_categorie; ?></h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">

    <div class="col-sm-4">
        <div class="card card-primary card-inverse text-xs-center">
            <div class="card-block">
                <div class="row card-text">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 float-xs-right" style="padding-top: 10px;padding-left: 100px">
                        <div style="font-size: 33px; margin-left: -70px;"><?= $inscrits->nb_inscrits; ?></div>
                        <div>Participants</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="card-link" href="<?= $tournoi->listeParticipants(); ?>">
                    <span class="float-xs-left">Voir les participants</span>
                    <span class="float-xs-right"><i class="fa fa-arrow-right"></i></span>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-warning card-inverse text-xs-center ">
            <div class="card-block">
                <div class="row card-text">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 float-xs-right" style="padding-top: 10px;padding-left: 100px">
                        <div style="font-size: 33px; margin-left: -28px;">Matches</div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="card-link" href="<?= $tournoi->calendrier(); ?>">
                    <span class="float-xs-left">Voir le calendrier et les résultats</span>
                    <span class="float-xs-right"><i class="fa fa-arrow-right"></i></span>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-success card-inverse text-xs-center ">
            <div class="card-block">
                <div class="row card-text">
                    <div class="col-xs-3">
                        <i class="fa fa-trophy fa-5x"></i>
                    </div>
                    <div class="col-xs-9 float-xs-right" style="padding-top: 10px;padding-left: 10px">
                        <div style="font-size: 33px;">Gestion</div>
                        <div style="font-size: 12px; margin-left: 55px;">scores,formule prochain tour...</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span class="float-xs-left">Gérer le tournoi</span>
                <span class="float-xs-right"><i class="fa fa-arrow-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div style="padding: 0 0 23px;"></div>
