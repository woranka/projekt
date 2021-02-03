<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

    <title>Łasuch - słodycze z zagranicy</title>

    <link rel="shortcut icon" href="{$conf->app_url}/assets/images/ikona.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/font-awesome.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css">

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/marketing.css">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main-grid.css">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/marketing.css">
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/style.css">
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{$conf->app_url}/assets/js/html5shiv.js"></script>
    <script src="{$conf->app_url}/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="home">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                <a href="{$conf->action_root}start" class="navbar-brand"><img src="{$conf->app_url}/assets/images/lasuch.png"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="{$conf->action_root}start">START</a></li>
                    .{if count($conf->roles)>0}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">PANEL PRACOWNIKA <b class="caret"></b></a>
                            <ul class="dropdown-menu text-center" style="min-width:208.05px">
                                <li><a href="{$conf->action_root}productList">Produkty</a></li>
                                <li><a href="{$conf->action_root}orderList">Zamówienia</a></li>
                                <li class="active"><a href="{$conf->action_root}logout">WYLOGUJ</a></li>
                            </ul>
                        </li>
                    {else}	
                        <li><a href="{$conf->action_root}loginShow" class="btn">PANEL PRACOWNIKA <i class="fa fa-cogs fa-5"></i></a></li>
                    {/if}
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div> 
    <!-- /.navbar -->
               
{block name=content} Domyślna treść zawartości .... {/block}
        
                   
    <footer id="footer" class="top-space">
        <div class="footer1">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 widget">
                        <h3 class="widget-title">Kontakt</h3>
                        <div class="widget-body">
                            <p><a href="https://github.com/woranka">GitHub</a><br>
                                <a href="mailto:#">anna.woronkoo@gmail.com</a><br>
                                <br>
                                Katowice
                            </p>	
                        </div>
                    </div>

                    <div class="col-md-6 widget text-right">
                        <h3 class="widget-title">Informacje</h3>
                        <div class="widget-body">
                            <p>Projekt na zaliczenie przedmiotu Aplikacje Sieciowe.</p>
                            <p>Informatyka niestacjonarna. Semestr 5.</p>
                            <p>Anna Woronko, grupa 2.</p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">					
                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="simplenav">
                                <a href="{$conf->action_root}start">Start</a> | 
                                <b><a href="{$conf->action_root}loginShow">Panel pracownika</a></b>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Widok oparty na stylach i szablonie <a href="http://gettemplate.com/" rel="designer">gettemplate</a> 
                            </p>
                        </div>
                    </div>
                </div> <!-- /row of widgets -->
            </div>
        </div>
    </footer>	

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="{$conf->app_url}/assets/js/headroom.min.js"></script>
    <script src="{$conf->app_url}/assets/js/jQuery.headroom.min.js"></script>
    <script src="{$conf->app_url}/assets/js/template.js"></script>

</body>

