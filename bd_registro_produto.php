<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$fornecedor = $_POST['fornecedor'];

if(isset($_FILES['imagem_produto']) && !empty($_FILES["imagem_produto"]["name"])) {
    $imagem_temp = $_FILES["imagem_produto"]["tmp_name"];
    $destino = 'imagens/'.$_FILES["imagem_produto"]["name"];
    move_uploaded_file($imagem_temp, $destino);

    $nome_imagem = $_FILES["imagem_produto"]["name"];
} else {
    $nome_imagem = "sem_imagem.png";
}

include "conexao.php";

$conexao = conectar();

$sql = "INSERT INTO table_produtos (nomeProduto, precoProduto, descricaoProduto, idFornecedor, idCategoria, imagem) VALUES ('$nome', '$preco', '$descricao','$fornecedor', '$categoria', '$nome_imagem')";
$result = mysqli_query($conexao, $sql);

desconectar($conexao);
header('Location: mercadorias.php');

?>