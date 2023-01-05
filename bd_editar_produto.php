<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$fornecedor = $_POST["fornecedor"];
$categoria = $_POST["categoria"];

include "conexao.php";
$conexao = conectar();

if(isset($_FILES['imagem_produto']) && !empty($_FILES["imagem_produto"]["name"])) {
    $imagem_temp = $_FILES["imagem_produto"]["tmp_name"];
    $destino = 'imagens/'.$_FILES["imagem_produto"]["name"];
    move_uploaded_file($imagem_temp, $destino);

    $nome_imagem = $_FILES["imagem_produto"]["name"];

    $sql = "UPDATE table_produtos SET nomeProduto='$nome', precoProduto='$preco', descricaoProduto='$descricao', idFornecedor=$fornecedor, idCategoria=$categoria, imagem='$nome_imagem' WHERE idProduto=$id";
} else {
    $sql = "UPDATE table_produtos SET nomeProduto='$nome', precoProduto='$preco', descricaoProduto='$descricao', idFornecedor=$fornecedor, idCategoria=$categoria WHERE idProduto=$id";
}



$result = mysqli_query($conexao, $sql);
 
desconectar($conexao);
header('Location: mercadorias.php');
?>