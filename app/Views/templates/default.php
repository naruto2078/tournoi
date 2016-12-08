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
    <link rel="stylesheet" href="/MDB Free/css/bootstrap.min.css">
    <link rel="stylesheet" href="/MDB Free/css/mdb.min.css">
    <link rel="stylesheet" href="/css/login.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    <![endif]-->
    <style>
        html, body, .main{
            height: 100%;
        }
    </style>

</head>

<body>
<header id="accueil">
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-primary">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="index.php">Mon projet</a>
                <!--Links-->
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav float-xs-right" style="padding-top: 8px;">
                    <li class="nav-item"><a href="index.php?p=users.register">S'inscrire</a></li>
                    <li class="nav-item"><a href="index.php?p=users.login">Se connecter</a></li>
                </ul>
            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->

</header>


<?=$content;?>
<!--Footer-->
<footer class="page-footer primary-color-dark center-on-small-only">

    <!--Footer Links-->
    <div class="container">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title">Footer</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus ipsam nam ratione similique tempora!.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="title">Navigation</h5>
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#!">A propos</a></li>
                    <li><a href="#!">Contact</a></li>
                    <li><a href="index.php?p=users.register">Inscription</a></li>
                    <li><a href="index.php?p=users.login">Connexion</a></li>
                </ul>
            </div>
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2016 Copyright: Eklou Adjakly & Ismael Bakayoko
        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function () {
        $(this).removeClass('input-error');
    });
    // fields validation
    $('form button.btn').on('click', function () {
        var parent_fieldset = $(this).parents('fieldset');
        parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function () {
            if ($(this).val() == "") {
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
