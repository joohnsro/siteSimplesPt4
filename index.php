<?php
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Projeto PHP - Code Education</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        /*
         * Header do label busca
         */
        .header-label {
            line-height: 30px;
            margin-bottom: 0;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php require_once("menu.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="busca" method="get" role="form" class="">
                <div class="form-group">
                    <label for="s" class="col-lg-2 col-md-2 col-sm-3 hidden-xs header-label">Faça uma busca:</label>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                        <input type="text" id="s" name="s" class="form-control" placeholder="Digite uma palavra-chave..." required="required">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                        <input type="submit" class="btn btn-primary form-control" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr />
</div>

<div class="container">
    <?php
    rota();
    ?>

    <hr>
    <p class="text-center">
        Todos os direitos reservados -
        <?php
        date_default_timezone_set("America/Sao_Paulo");
        echo date("Y"); ?>
    </p>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>