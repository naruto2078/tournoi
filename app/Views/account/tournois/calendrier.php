<div class="row">
    <div class="col-lg-12 " style="padding-top: 40px">
        <h3 style="color: #414C59; margin-bottom: 30px">Classement</h3>
    </div>
</div>
<hr class="extra-margins">
<div class="row">
    <div class="col-md-10">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item active">
                <a href="#panel1" class="nav-link" data-toggle="tab" role="tab">Poule 1</a>
            </li>
            <?php for ($i = 2; $i <= $numero; $i++): ?>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#panel<?= $i; ?>"
                       role="tab">Poule <?= $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
        <div class="tab-content">
            <!--<form action="" method="post">-->
            <div class="tab-pane active" id="panel1" role="tabpanel">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipe</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($poules["poule 1"] as $k => $equipe): ?>
                        <tr>
                            <td><?= $k + 1; ?></td>
                            <td><?= $equipe; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                <div class="row">
                    <?php for ($i = 0; $i < count($matches); $i++): ?>
                        <?php $match = $matches[$i];
                        if ($match->nom == "poule 1"): ?>
                            <div class="col-sm-9">
                                <div class="card  text-xs-center ">
                                    <div class="card-block">
                                        <div class="row card-text">
                                            <div class="col-xs-4">
                                                <div><i class="fa fa-calendar fa"></i></div>
                                                <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                                <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                            </div>
                                            <div class="col-xs-4 float-xs-right">
                                                <div>
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>
                                                <div>Stade</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-xs-5">
                                        <?php
                                        if ( empty($all_score[$match->id][0]) || empty($all_score[0][$match->id])){
                                            $scoreH ="NR";
                                            $scoreA = "NR";
                                        }
                                        else 
                                        {
                                            $scoreH =$all_score[$match->id][0];
                                            $scoreA = $all_score[0][$match->id];
                                        }
                                        ?>
                                            <?= $all_teams[$matches[$i]->team_id_home]; ?>
                                            <div class="col-xs-4"> <input type="text" name="scorehome$j" value='<?=$scoreH?>'  disabled=false></div>
                                        </div>
                                        <div class="col-xs-2">SCORE</div>
                                        <div class="col-xs-5"><?= $all_teams[$matches[$i]->team_id_away]; ?>
                                            <div class="col-xs-4"> <input type="text" name="scoreaway$j" value='<?=$scoreA?>' disabled=false></div>
                                        </div> 

                                        <div>
                                        <button type="button" class="btn btn-info" name="button$j" onclick=dialog('<?= $all_teams[$matches[$i]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>') >Ajouter le score
                                        </button>
                                        <button type="button" class="btn btn-info" name="button$j" onclick=dialog2('<?= $all_teams[$matches[$i]->team_id_home]; ?>','<?= $all_teams[$matches[$i]->team_id_away]; ?>','<?= $match->id ?>') >Modifier le score
                                        </button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                       
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </div>
            <?php for ($i = 2; $i <= $numero; $i++): ?>
                <div class="tab-pane" id="panel<?= $i; ?>" role="tabpanel">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Equipe</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($poules['poule ' . $i] as $k => $equipe): ?>
                            <tr>
                                <td><?= $k + 1; ?></td>
                                <td><?= $equipe; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <div class="row">
                        <?php for ($j = 0; $j < count($matches); $j++): ?>
                            <?php $match = $matches[$j];
                            if ($match->nom == "poule ".$i): ?>
                                <div class="col-sm-9">
                                    <div class="card  text-xs-center ">
                                        <div class="card-block">
                                            <div class="row card-text">
                                                <div class="col-xs-4">
                                                    <div><i class="fa fa-calendar fa"></i></div>
                                                    <div><?= date_format(new DateTime($match->date), 'd-M'); ?></div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                                    <div><?= date_format(new DateTime($match->date), 'H:i'); ?></div>
                                                </div>
                                                <div class="col-xs-4 float-xs-right">
                                                    <div>
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    </div>
                                                    <div>Stade</div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="card-footer">
                                        <div class="col-xs-5">
                                        <?php
                                        if ( empty($all_score[$match->id][0]) || empty($all_score[0][$match->id])){
                                            $scoreH ="NR";
                                            $scoreA = "NR";
                                        }
                                        else 
                                        {
                                            $scoreH =$all_score[$match->id][0];
                                            $scoreA = $all_score[0][$match->id];
                                        }
                                        ?>
                                            <?= $all_teams[$matches[$j]->team_id_home]; ?>
                                            <div class="col-xs-4"> <input type="text" name="scorehome$jbis" value='<?=$scoreH?>'  disabled=false></div>
                                        </div>
                                        <div class="col-xs-2">SCORE</div>
                                        <div class="col-xs-5"><?= $all_teams[$matches[$j]->team_id_away]; ?>
                                            <div class="col-xs-4"> <input type="text" name="scoreaway$jbis" value='<?=$scoreA?>' disabled=false></div>
                                        </div> 

                                        <div>
                                        <button type="button" class="btn btn-info" name="button$jbis" onclick=dialog('<?= $all_teams[$matches[$j]->team_id_home]; ?>','<?= $all_teams[$matches[$j]->team_id_away]; ?>','<?= $match->id ?>') >Ajouter le score
                                        </button>
                                        <button type="button" class="btn btn-info" name="button$jbisM" onclick=dialog2('<?= $all_teams[$matches[$j]->team_id_home]; ?>','<?= $all_teams[$matches[$j]->team_id_away]; ?>','<?= $match->id ?>') >Modifier le score
                                        </button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>

                               
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endfor; ?>


            <!--</form>-->
        </div>
    </div>
</div>
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel" value=""></h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="row multistep">
                                <form action="" method="post">
                                      
                                       <div class="col-xs-7">
                                            <div class="col-xs-5">
                                            <input type="hidden" name="idMatch" id ="idMatch" value="" >
                                            <input type="text" name="idHome" id ="idHome" value="" disabled=false>
                                            </div>

                                            <div class="col-xs-3">
                                            <input type="text" name="idScoreH" id ="idScoreH" value="">
                                            </div>
                                        </div>

                                        <div class="col-xs-7">

                                            <div class="col-xs-5">
                                            <input type="text" name="idAway" id ="idAway" value="" disabled=false>
                                            </div>

                                            <div class="col-xs-3">
                                            <input type="text" name="idScoreA" id ="idScoreA" value="">
                                            </div>

                                           
                                        </div>
                                
                                     <div class="f1-buttons">
                                        <button type="submit" class="btn btn-success">Ajouter Score</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                            </button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>




             <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel" value=""></h4>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <div class="row multistep">
                                <form action="" method="post">
                                      
                                       <div class="col-xs-7">
                                            <div class="col-xs-5">
                                            <input type="hidden" name="idMatch2" id ="idMatch2" value="" >
                                            <input type="text" name="idHome2" id ="idHome2" value="" disabled=false>
                                            </div>

                                            <div class="col-xs-3">
                                            <input type="text" name="idScoreH2" id ="idScoreH2" value="">
                                            </div>
                                        </div>

                                        <div class="col-xs-7">

                                            <div class="col-xs-5">
                                            <input type="text" name="idAway2" id ="idAway2" value="" disabled=false>
                                            </div>

                                            <div class="col-xs-3">
                                            <input type="text" name="idScoreA2" id ="idScoreA2" value="">
                                            </div>

                                           
                                        </div>
                                
                                     <div class="f1-buttons">
                                        <button type="submit" class="btn btn-success">Modifier Score</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="text-transform: none">Fermer
                            </button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>

<script type="text/javascript">

    function dialog(home,away,idMatch) {
//alert(home + away + idMatch);
//document.getElementById("toto").data-target="#myModal";

  
    $('#myModal').modal();
    $('#myModal').find('.modal-title').val(home + away+idMatch);
    $(".modal-body #id3").val( home + away+idMatch);
$(".modal-body #idHome").val( home );
$(".modal-body #idAway").val( away);
$(".modal-body #idMatch").val( idMatch);



}

 function dialog2(home,away,idMatch) {
//alert(home + away + idMatch);
//document.getElementById("toto").data-target="#myModal";

  
    $('#myModal2').modal();
    $('#myModal2').find('.modal-title').val(home + away+idMatch);
    $(".modal-body #id3").val( home + away+idMatch);
$(".modal-body #idHome2").val( home );
$(".modal-body #idAway2").val( away);
$(".modal-body #idMatch2").val( idMatch);



}

function desactiver(i) {
//alert("desactiver");
document.getElementById('prix'+i).disabled=true;
document.getElementById('prix'+i).value="0";

}
</script>