<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <link rel=stylesheet type="text/css" href="css/layout.css">
    <link href="css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
    <link href="css/application.css" media="screen" rel="stylesheet" type="text/css">

    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-select.css" rel="stylesheet" type="text/css">

</head>
<body>
    <table>
        <tr>
            <td><a href="home">{{ HTML::image('img/amrit-yoga-logo.gif')}}</a></td>
        </tr>
    </table>                          

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </nav>
    </div>   



    @yield('content')


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script src="js/jquery.tinysort.js" type="text/javascript"></script>
    <script src="js/jquery.quicksearch.js" type="text/javascript"></script>
    <script src="js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="js/application.js" type="text/javascript"></script>
    <script src="js/bootstrap-select.js" type="text/javascript"></script>


</body>
</html>
