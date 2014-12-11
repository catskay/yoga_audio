<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <link href="css/welcome.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    

</head>
<body>
    <div class="row">
        <div class="top-container">
            <div class="col-md-4">
                {{ HTML::image('img/amrit-yoga-logo.gif') }}
            </div>
            <div class="col-md-4">
                <h2> Yoga Nidra <br> <h4> This site provides a Yoga Nidra <br> experience based on your health needs </h4> </h2>
            </div>
            <div class="col-md-4">
                <a href="#login" style="float:right" role="button" class="btn-link" data-toggle="modal">Sign In</a></p>
            </div>
        </div>
    </div>

    <div class="page-container">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <a href="category">  <button type="button" class="btn btn-red" style="float:right">First Time User?</button> </a>
                    <br><br>
                </div>
                <div class="panel-centered">
                    {{ HTML::image('img/yoga.png') }}
                </div>
                <div class="panel panel-centered">
                    <p><b>Imagine</b> your life unfolding as you always wanted.</p>
                    <p><b>See yourself</b> letting go of the past.</p>
                    <p><b>Envision yourself</b> free of worries about the present or frustrations about the future.</p>
                    <p><b>Picture a life of relaxed acceptance</b> and fulfillment beyond your wildest dreams.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <br><br>
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="loginLabel">Please sign in</h4>
                    </div>
                    <div class="modal-body">
                        {{ Form::open(array('url' => 'home')) }}
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" value="Login" class="btn btn-lg btn-red btn-block">
                            </fieldset>
                            {{Form::hidden('from','home')}}
                            {{ Form::close() }}
                        </form>
                        <p>
                            {{ $errors->first('email') }}
                            {{ $errors->first('password') }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<script src="js/jquery.tinysort.js" type="text/javascript"></script>
<script src="js/jquery.quicksearch.js" type="text/javascript"></script>
<script src="js/jquery.multi-select.js" type="text/javascript"></script>
<script src="js/application.js" type="text/javascript"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').dataTable();
});
</script>

</body>
</html>
