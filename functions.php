<?php

function Erro404(){

    header("HTTP/1.0 404 Not Found");
    if (file_exists("404.php")){

        require_once "404.php";
    } else {

        echo "<h1>Página não encontrada!</h1>";
    }
}
function rota(){

    $rota = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
    $path = (strlen($sub = substr($rota["path"], 1)) == 0) ? "home" : $sub;

    require_once "conexaoDB.php";
    $conn = conexaoDB();

    $sql = "Select * from paginas where nome = :path;";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue('path', $path);
    $stmt->execute();

    if($res = $stmt->fetch(PDO::FETCH_ASSOC)){

        if($res['conteudo'] != ""){
            echo $res['conteudo'];
        } else {
            if (file_exists($path.".php")){
                require_once $path.".php";
            } else {
                Erro404();
            }
        }
    } else {

        Erro404();
    }

}