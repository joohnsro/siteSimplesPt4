<?php

require_once "conexaoDB.php";

echo "#### Executando Fixture ####\n";

$conn = conexaoDB();

echo "Removendo tabela";
$conn->query("DROP TABLE IF EXISTS administradores;");
$conn->query("DROP TABLE IF EXISTS clientes;");
$conn->query("DROP TABLE IF EXISTS paginas;");
echo " - OK \n";

echo "Criando tabelas";
$conn->query("CREATE TABLE administradores (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL);");
$conn->query("CREATE TABLE clientes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL);");
$conn->query("CREATE TABLE paginas (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    conteudo LONGTEXT NOT NULL);");
echo " - OK\n";

echo "Inserindo dados";
$usuario = "admin";
$senha = password_hash("admin", PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO administradores (usuario, senha) VALUES (:usuario, :senha)");
$stmt->bindValue("usuario", $usuario);
$stmt->bindValue("senha", $senha);
$stmt->execute();

$clientes = array(
    array(
        'nome' => 'Jonathan',
        'email' => 'jonathansroliveira@gmail.com'
    ),
    array(
         'nome' => 'Tamara',
         'email' => 'tamara.fernandescampos@gmail.com'
    ),
);
foreach($clientes as $cliente){

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email) VALUES (:nome, :email)");
    $stmt->bindValue("nome", $cliente['nome']);
    $stmt->bindValue("email", $cliente['email']);
    $stmt->execute();
}
$paginas = array(
    array( 'nome' => 'home', 'conteudo' => '<h1>Home</h1><p>Esta é a home do meu site para estudo.</p>' ),
    array( 'nome' => 'empresa', 'conteudo' => '<h1>Empresa</h1><p>Página falando sobre a história da empresa.</p>' ),
    array( 'nome' => 'produtos', 'conteudo' => '<h1>Produtos</h1><p>Aqui listamos todos os produtos.</p>' ),
    array( 'nome' => 'servicos', 'conteudo' => '<h1>Serviços</h1><p>Os serviços serão colocados aqui detalhadamente.</p>' ),
    array( 'nome' => 'contato', 'conteudo' => ''),
    array( 'nome' => 'busca', 'conteudo' => ''),
    array( 'nome' => 'login', 'conteudo' => '')
);

foreach($paginas as $pagina){

    $stmt = $conn->prepare("INSERT INTO paginas (nome, conteudo) VALUES (:nome, :conteudo)");
    $stmt->bindValue("nome", $pagina['nome']);
    $stmt->bindValue("conteudo", $pagina['conteudo']);
    $stmt->execute();
}

echo " - OK\n";

echo "#### Concluído ####\n";