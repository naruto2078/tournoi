<?php if ($_GET['user'] != $_SESSION['user']) {
    header('HTTP/1.0 404 Not Found');
    die('Page introuvable');
} ?>

<div class="row">
    <div class="col-md-12">
        <h2>Bonjour <?=$_SESSION['user'];?></h2>
    </div>
</div>