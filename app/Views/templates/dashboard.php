<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= App::getInstance()->title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- DatePicker-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <!-- Custom CSS -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!--Formulaire multistep-->
    <link rel="stylesheet" href="/css/form-elements.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--<link href="/css/events_css.php" rel="stylesheet" type="text/css" media="all" />-->
    <!--Font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <!--Themify-->
    <link rel="stylesheet" href="/css/themify-icons/themify-icons.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /*.f1-step{width: 25%};*/
        <?= '.f1-step{width:'.$_SESSION['width'].'%';?>
    </style>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top header bg-gradient-9" role="navigation"
         style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">Mon projet</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <!--<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>-->
                    <i class="ti-user "></i> <span><?= $_SESSION['user']; ?></span> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="index.php?p=logout"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" style="height: 34px" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>

                    <li>
                        <a href="?p=account.events.add">
                            <button class="btn btn-danger form-control">Créer un évènement</button>
                        </a>
                    </li>
                    <li class="li-title">Tableau de Bord</li>
                    <li>
                        <a href="index.php?p=account.events.AllEventByOrganizer"><i class="fa fa-trophy fa-fw"></i> Mes Evenements</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Equipes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Mes Equipes</a>
                            </li>
                            <li>
                                <a href="?p=account.teams.add">Inscrire Une Equipe</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-trophy fa-fw"></i>Participations<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Mes participations</a>
                            </li>
                            <li>
                                <a href="buttons.html">Participer à un tournoi</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <!--<div class="row">-->
                <?= $content; ?>

        <!--</div>-->



        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script>window.jQuery || document.write('<script src="/js/jquery-3.1.1.min.js"><\/script>')</script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!--MetisMenu Plugin Javascript -->
<script src="/js/metisMenu.js"></script>


<!-- Custom Theme JavaScript -->
<script src="/js/dashboard.js"></script>
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

</html>
