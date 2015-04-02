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

                session_start();
                if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1 && $path == 'login'){
                    header("Location: /admin");
                } else {
                    session_destroy();
                    require_once $path.".php";
                }

            } else {
                Erro404();
            }
        }
    } else {

        Erro404();
    }

}

if(isset($_GET['autentica'])){

    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : null;

    require_once "conexaoDB.php";
    $conn = conexaoDB();

    $sql = "Select * from administradores where usuario = :usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue("usuario", $usuario);
    $stmt->execute();

    if($aut = $stmt->fetch(PDO::FETCH_ASSOC)){

        if(password_verify($senha, $aut['senha'])){
            session_start();
            $_SESSION["logado"] = 1;

            header("Location: /admin");
        } else {
            header("Location: login");
        }

    } else {
        header("Location: login");
    }
}