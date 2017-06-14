<!DOCTYPE html>
<html>
<head>
    <title>
        PDA | Amcom S.A
    </title>
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet"
          type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel='stylesheet'>
    <link href="{{asset('css/style2.css')}}" rel='stylesheet'>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
</head>
<body class="fourofour bg-danger">
<!-- Login Screen -->
<div class="fourofour-container">
    <h1>
        <i class="fa fa-unlink"></i>
    </h1>
    <h2>
        Error 500!
        <br>
        Al parecer algo salió mal!
    </h2>

    <a class="btn btn-lg btn-default-outline" href="{{url('/')}}"><i class="fa fa-home"></i>Ir a la pagina principal</a>

    {{dd($e)}}

</div>

<!-- End Login Screen -->
</body>
</html>