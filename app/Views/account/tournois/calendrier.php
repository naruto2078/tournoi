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
                            <td><?=$k+1;?></td>
                            <td><?=$equipe;?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
            <?php for ($i = 1; $i < $numero; $i++): ?>
                <div class="tab-pane" id="panel<?= $i+1; ?>" role="tabpanel">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Equipe</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($poules['poule '.$i] as $k => $equipe): ?>
                            <tr>
                                <td><?=$k+1;?></td>
                                <td><?=$equipe;?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            <?php endfor; ?>


            <!--</form>-->
        </div>
    </div>
</div>


