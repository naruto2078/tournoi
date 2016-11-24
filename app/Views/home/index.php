<main>

    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row">
            <div class="col-md-7">
                <!--Featured image -->
                <div class="view overlay hm-white-light z-depth-1-half">
                    <img src="/img/Wonderful-Beach-volleyball-Wallpaper.jpg"
                         class="img-fluid " alt="">
                    <div class="mask">
                    </div>
                </div>
                <br>
            </div>


            <!--Main information-->
            <div class="col-md-5">
                <h2 class="h2-responsive">Bienvenue sur tournoi.local</h2>
                <hr>
                <p><h4>Le site qui facilite la création de vos évènements de volley et de leurs différents tournois
                    ainsi que leur gestion!<br>Nous nous occupons de la préinscription des équipes en ligne, de la mise
                    en place des poules,saisie des scores...</h4></p>
                <a href="#infos" class="btn btn-primary">En savoir plus!</a>
            </div>

        </div>
        <!--/.First row-->

        <hr class="extra-margins">
        <!--Second row-->
        <div class="row" id="infos">
            <!--First columnn-->
            <div class="col-md-4">
                <!--Card-->
                <div class="card">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <div class=" offset-xs-4 col-xs-3 " style="padding-top: 30px">
                            <i class="fa fa-users fa-5x" style="color:#0D47A1"></i>
                        </div>

                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title">Inscription des équipes</h4>
                        <!--Text-->
                        <p class="card-text">
                            Chaque équipe peut se préinscrire à votre tournoi à partir du site. Ensuite elle aura accès
                            au planning et saura où et quand elle devra jouer.
                        </p>

                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <!--First columnn-->

            <!--Second columnn-->
            <div class="col-md-4">
                <!--Card-->
                <div class="card">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <div class=" offset-xs-4 col-xs-3 " style="padding-top: 30px">
                            <i class="fa fa-trophy fa-5x" style="color:#0D47A1"></i>
                        </div>

                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title">Création des poules</h4>
                        <!--Text-->
                        <p class="card-text">
                            En fonction du nombre d'inscrits nous vous proposons plusieurs formules sportives et c'est à
                            vous de choisir celle qui vous convient.
                            <br>
                            La répartition des équipes dans les poules est faite automatiquement par la méthode du
                            serpentin.
                        </p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <!--Second columnn-->

            <!--Third columnn-->
            <div class="col-md-4">
                <!--Card-->
                <div class="card">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <div class=" offset-xs-4 col-xs-3 " style="padding-top: 30px">
                            <i class="fa fa-pencil fa-5x" style="color:#0D47A1"></i>
                        </div>

                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title">Saisie des scores</h4>
                        <!--Text-->
                        <p class="card-text">
                            Après chaque rencontre, vous entrez directement les scores sur le site.
                            <br>
                            Le classement des équipes est ainsi mis à jour automatiquement.
                        </p>

                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <!--Third columnn-->
        </div>
        <!--/.Second row-->
        <hr class="extra-margins">
        <!--third row-->
        <div class="row">
            <div class="col-md-8">
                <h2>Les derniers évènements</h2>
                <ul class="list-group">
                    <?php foreach ($events as $event) : ?>
                        <li class="list-group-item">
                            <span>
                                <i class="fa fa-trophy" style="color:#0D47A1"></i>
                                <?= $event->nom; ?> <?= date_format(new DateTime($event->date), 'd-m-Y'); ?><br>
                                <?= $event->lieu; ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--third row-->
    </div>
    <!--/.Main layout-->
</main>