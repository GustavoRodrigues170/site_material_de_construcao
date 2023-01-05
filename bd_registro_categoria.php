<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$nome = $_POST['nome'];

include "conexao.php";

$conexao = conectar();

$sql = "INSERT INTO table_categorias (nomeCategoria) VALUES ('$nome')";

$result = mysqli_query($conexao, $sql);

if($result) {
    desconectar($conexao);
    header('Location: categorias.php');
} else {
    desconectar($conexao);
    header('Location: categorias_adicionar.php');
}
?>