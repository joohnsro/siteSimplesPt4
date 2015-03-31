<?php
require_once "conexaoDB.php";
$conn = conexaoDB();

$sql = "Select * from paginas where conteudo like :s AND nome NOT IN ('contato','busca');";
$stmt = $conn->prepare($sql);
$stmt->bindValue('s', '%'.$_GET['s'].'%');
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Resultados da busca <br />
    <small>Você buscou por: <strong><?php echo (isset($_GET['s'])) ? $_GET['s'] : null; ?></strong></strong></small>
</h1>
<p>Páginas que possuem a palavra-chave desejada:</p>
<?php

foreach($res as $result){
    echo "<a href='{$result['nome']}'>".$result['nome']."</a><br>";
}
