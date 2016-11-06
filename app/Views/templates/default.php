<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.paper.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/app.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    <![endif]-->
</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../../index.php">Mon projet</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Accueil</a></li>
                <li><a href="#about">A propos</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?p=users.register">S'inscrire</a></li>
                <li><a href="index.php?p=users.login">Se connecter</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <?= $content; ?>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });
    // fields validation
    $('form button.btn').on('click',function () {
        var parent_fieldset = $(this).parents('fieldset');
        parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
            if( $(this).val() == "" ) {
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
    })

</script>
</body>
</html>
