<?php

session_start();
if(!isset($_SESSION['emailUsuario'])) {
    header('Location: login.php');
}

include "conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];

$conexao = conectar();

$sql = "UPDATE table_fornecedores SET nomeFornecedor='$nome' WHERE idFornecedor='$id'";

$result = mysqli_query($conexao, $sql);

if($result){
    desconectar($conexao);
    header('Location: fornecedores.php');
} else {
    desconectar($conexao);
    header('Location: editar_fornecedor.php');
}
?>