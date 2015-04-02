<?php
session_start();

if(!isset($_SESSION['logado']) || $_SESSION['logado'] != 1){
    unset($_SESSION);
    session_destroy();
    header("Location: ../login");
}

require_once "../functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Administrador | Projeto PHP - Code Education</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

        #editable
        {
            padding: 10px;
            float: left;
        }

    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin/">Administrativo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="visible-xs"><a href="/admin/edit?home">Home</a></li>
                <li class="visible-xs"><a href="/admin/edit?empresa">Empresa</a></li>
                <li class="visible-xs"><a href="/admin/edit?servicos">Serviços</a></li>
                <li class="visible-xs"><a href="/admin/edit?produtos">Produtos</a></li>
                <hr class="visible-xs divider">
                <li><a href="/admin/logout">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="/admin/edit?home">Home</a></li>
                <li><a href="/admin/edit?empresa">Empresa</a></li>
                <li><a href="/admin/edit?servicos">Serviços</a></li>
                <li><a href="/admin/edit?produtos">Produtos</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <?php
            $rota = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
            $paths = array_reverse(explode("/",substr($rota["path"], 1)));
            $path = $paths[0]; //$path[0] = edit E $path[1] = admin

            if(in_array($path, array("edit", "logout"))){
                include $path.".php";
            } else {
                include "home.php";
            }

            ?>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<script src="../js/ckeditor.js"></script>
<script src="../js/jquery.js"></script>
<script>

    CKEDITOR.disableAutoInline = true;

    $( document ).ready( function() {
        $( '#editor1' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
        $( '#editable' ).ckeditor(); // Use CKEDITOR.inline().
    } );

    function setValue() {
        $( '#editor1' ).val( $( 'input#val' ).val() );
    }

</script>
</body>
</html>