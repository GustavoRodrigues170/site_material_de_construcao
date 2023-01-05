<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$id = $_GET['idProduto'];

include "conexao.php";

$conexao = conectar();
$sql = "DELETE FROM table_produtos WHERE idProduto = $id";

$result = mysqli_query($conexao, $sql);

if($result){
    desconectar($conexao);
    header('Location: mercadorias.php');
} else {
    desconectar($conexao);
    header('Location: mercadorias.php');
}

?>