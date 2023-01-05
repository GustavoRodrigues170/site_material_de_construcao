<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$nome = $_POST['nome'];

include "conexao.php";

$conexao = conectar();

$sql = "INSERT INTO table_fornecedores (nomeFornecedor) VALUES ('$nome')";

$result = mysqli_query($conexao, $sql);

if($result) {
    desconectar($conexao);
    header('Location: fornecedores.php');
} else {
    desconectar($conexao);
    header('Location: fornecedores_adicionar.php');
}
?>