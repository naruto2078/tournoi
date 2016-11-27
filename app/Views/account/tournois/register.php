<div class="row">
    <div class="col-lg-12 text-xs-center" style="padding-top: 40px">
        <h3>Inscription à un tournoi: Choisissez le tournoi</h3>
    </div>
</div>
<hr class="extra-margins">

<div class="row">
    <?php foreach ($tournois as $tournoi) : ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="view overlay hm-white-slight">
                    <div class="col-xs-3 float-xs-left" style="padding-top: 30px">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 float-xs-right" style="padding-left: 138px; padding-top: 66px">
                        <h3><?= $tournoi->nom; ?></h3>
                    </div>
                </div>
                <div class="card-block event-card">
                    <div class="col-md-12">
                        <table class="table event-table">
                            <tbody>
                                <tr>
                                    <td class="text-left">Genre</td>
                                    <td style="width: 50%;"> <?= $tournoi->genre; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Catégorie</td>
                                    <td style="width: 50%;"><?= $tournoi->nom_categorie; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row text-xs-center">
                            <form action="" method="post">
                                <?=$form->select('team','Equipe',$teams);?>
                                <input type="hidden" name="id" value="<?= $tournoi->id; ?>">
                                <button type="submit" class="btn btn-success">Participer</button>
                            </form>
                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal" style="text-transform: none">
                                Participer
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Participation au tournoi <?= $tournoi->nom; ?> </h4>
                                </div>
                                <!--Body-->
                                <div class="modal-body">
                                    <div class="row multistep">
                                        <form action="" method="post">
                                           <div class="col-xs-7">
                                            <?=$form->select('team','Equipe',$teams);?>
                                            <input type="hidden" name="id" value="<?= $tournoi->id; ?>">
                                        </div>



                                        <div class="form-group">
                                            <div class="col-xs-7">
                                                <input id="carteBleu" type="radio" name="typeCarte" value="carteBleu" /> Carte Bleu
                                                <input id="visa" type="radio" name="typeCarte" value="visa" /> Visa
                                                <input id="mastercard" type="radio" name="typeCarte" value="mastercard" /> Mastercard
                                                <input id="mastercard" type="radio" name="typeCarte" value="mastercard" /> American Express

                                            </div>                            

                                            <div class="col-xs-7">
                                                <?= $form->input('numCarte', 'numCarte', ['placeholder' => 'Numero de Carte', 'id' => 'numCarte']); ?>
                                            </div>

                                            <div class="col-xs-7">
                                                Date d'exipiration 
                                                <div class="col-xs-3"> <?= $form->input('moisCarte', 'moisCarte', ['placeholder' => 'mm', 'id' => 'moisCarte']); ?></div>
                                                <div class="col-xs-3"> <?= $form->input('anneeCarte', 'anneeCarte', ['placeholder' => 'aa', 'id' => 'anneeCarte']); ?></div>
                                            </div>

                                            <div class="col-xs-7">
                                                Cryptogramme visuel 
                                                <div class="col-xs-3"> <?= $form->input('cryptogrammeCarte', 'cryptogrammeCarte', ['placeholder' => '', 'id' => 'cryptogrammeCarte']); ?></div>
                                            </div>

                                        </div>

                                        <div class="f1-buttons">
                                            <button type="submit" class="btn btn-success">Participer</button>
                                        </div>

                                    </form>

                                </div>

                                <!--Footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                                </button>
                            </div>
                        </div>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered" style="margin-top: 100px;">
            <thead>

                <tr>
                    <th>Evènement</th>
                    <th>Genre</th>
                    <th>Categorie</th>
                    <th>Participer</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($tournois as $tournoi) :?>

                <tr>
                    <th scope="row"><?= $tournoi->nom; ?></th>
                    <td><?= $tournoi->genre; ?></td>
                    <td><?= $tournoi->nom_categorie; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $tournoi->id; ?>">
                            <button type="submit" class="btn btn-primary">Participer</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>