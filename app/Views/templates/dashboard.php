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
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">

    <!-- DatePicker-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">

    <!--Font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    <!--custom css-->
    <link rel="stylesheet" href="/css/sidebar.css">

    <!--Formulaire multistep-->
    <link rel="stylesheet" href="/css/form-elements.css">
    <link rel="stylesheet" href="/css/style.css">
    <![endif]-->
    <style>
        html, body, .main {
            height: 100%;
        }
    </style>
    <style>
        /*.f1-step{width: 25%};*/
        <?= '.f1-step{width:'.$_SESSION['width'].'%';?>
    </style>
</head>
<body>
<header>
    <nav class="navbar white">
        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapse">
            <i class="fa fa-bars"></i>
        </button>
        <div class="container-fluid">
            <div id="collapseEx2">
                <!--logo-->
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">Mon projet</a>
                </div>
                <!--Menu item-->
                <div>
                    <ul class="nav navbar-nav">
                        <li class="nav-item sidebar-toggle">
                            <a class="nav-link" href="#"><i class="fa fa-bars" id="menu-toggle"></i> </a>
                        </li>

                    </ul>
                    <div class="nav navbar-nav navbar-toggleable-xs float-xs-right" id="collapse">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown"
                               aria-haspopup="true">
                                <i class="fa fa-user"></i> <?= $_SESSION['user']; ?> </a>
                            <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="#dropdown">
                                <li><a class="dropown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i>Réglages</a>
                                </li>
                                <li><a class="dropown-item" href="index.php?p=logout"><i class="fa fa-sign-out"
                                                                                         aria-hidden="true"></i>Déconnexion</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div id="wrapper" class="menuDisplayed">
    <!--Sidebar-->
    <div id="sidebar-wrapper">
        <a href="?p=account.events.add">
            <button class="btn btn-default sidebar-text ">Créer un évènement</button>
        </a>
        <ul class="sidebar-nav">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i>
                    <span class="sidebar-text ">Tableau de bord</i></span>
                </a>
            </li>
            <li>
                <a href="index.php?p=account.events.AllEventByOrganizer"><i class="fa fa-trophy"></i>
                    <span class="sidebar-text ">Mes évènements</span>
                </a>
            </li>
            <li>
                <a href="#equipes" data-toggle="collapse" data-parent=".sidebar-nav" aria-expanded="false"
                   aria-controls="equipes"><i class="fa fa-users"></i>
                    <span class="sidebar-text ">Equipes<i class=" icon fa fa-angle-right float-xs-right"
                                                          aria-hidden="true"></i></span></a>
                <ul class="sub-menu collapse" id="equipes">
                    <li><a href="?p=account.teams.myteams"><i></i>Mes équipes</a></li>
                    <li><a href="?p=account.teams.add"><i></i>Ajouter une équipe</a></li>
                </ul>
            </li>

            <li>
                <a href="#participations" data-toggle="collapse" data-parent=".sidebar-nav" aria-expanded="false"
                   aria-controls="participations">
                    <i class="fa fa-trophy"></i>
                    <span class="sidebar-text ">
                    Participations
                <i class="icon fa fa-angle-right float-xs-right" aria-hidden="true"></i>
                </span>
                </a>
                <ul class="sub-menu collapse " id="participations">
                    <li><a href="index.php?p=account.events.participations"><i></i>Mes participations</a></li>
                    <li><a href="index.php?p=account.events.register"><i></i>Participer à un tournoi</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!--Page content-->
    <div id="page-content-wrapper">
        <div class="container-fluid content">

            <?= $content; ?>

        </div>
    </div>
</div>

<script>window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<!--Menu-toggle script-->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("menuDisplayed");
        $(".sidebar-text").toggleClass("hide");
    });
    $(".sidebar-nav li a").click(function (e) {
        //e.preventDefault();
        $("a").removeClass("active");
        $(this).addClass("active");

        //changer l'icone lorsqu'on deroule le menu
        $(this).parent().find("i.icon").toggleClass("fa-angle-right")
        $(this).parent().find("i.icon").toggleClass("fa-angle-down")
    });
    $("#sidebar-wrapper").height($(".container-fluid.content").height());
    //$("#page-content-wrapper").height($(".container-fluid.content").height());
</script>
<!--Formulaire multi step -->
<script src="/js/jquery.backstretch.min.js"></script>
<script src="/js/scripts.js"></script>
<!--Date picker-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.fr.min.js"></script>
<script src="/js/jquery.backstretch.min.js"></script>
<script>
    $(document).ready(function () {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.container form').length > 0 ? $('.container form').parent() : "body";
        var options = {
            format: 'dd-mm-yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: new Date(),
            language: 'fr'
        };
        date_input.datepicker(options);
    })
</script>
</body>