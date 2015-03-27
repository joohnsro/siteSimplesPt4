<?php
$rota = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
$path = substr($rota["path"], 1);
if($path == ""){
    $path = "home";
}
$argRoutes = ["home", "empresa", "produtos", "servicos", "contato"];

function validaRota($pathExist, $routeAdd, $path)
{
    if($pathExist == "no" || $routeAdd == "no"){
        header("HTTP/1.0 404 Not Found");
        return $pathOk = "404.php";
    } else {
        return $pathOk = $path.".php";
    }
}
function pathExist($path){
    if(!file_exists($path.".php")){
        return "no";
    }
}

function routeAdd($path, $argRoutes){
    if(!in_array($path, $argRoutes)){
        return "no";
    }
}
$pathOk = validaRota(pathExist($path), routeAdd($path, $argRoutes), $path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>1º Projeto PHP - Code Education</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <?php
    require_once($pathOk);
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