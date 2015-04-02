<?php
$pageGet = array_keys($_GET);
$page = ["home", "empresa", "produtos", "servicos"];

if(!in_array($pageGet[0], $page)){
    Erro404();
    exit();
}

require_once "../conexaoDB.php";
$conn = conexaoDB();

if(isset($_POST["editor1"])){
    $sql = "Update paginas set conteudo = :conteudo where nome = :nome";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue("nome", $pageGet[0]);
    $stmt->bindValue("conteudo", $_POST["editor1"]);
    $stmt->execute();
}

$stmt = $conn->prepare("Select * from paginas where nome = :page");
$stmt->bindValue("page", $pageGet[0]);
$stmt->execute();
?>

<?php
if($res = $stmt->fetch(PDO::FETCH_ASSOC)){

?>
    <h1><?php echo $res['nome']; ?> <small>/editar</small></h1>
    <hr />
    <form action="#" method="post">

        <div class="form-group">
            <textarea cols="80" id="editor1" name="editor1" rows="10">
                <?php echo $res['conteudo']; ?>
            </textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>
    </form>

<?php
} else {
    echo "Página não existe";
    exit();
}
?>