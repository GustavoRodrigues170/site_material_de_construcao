<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$id = $_GET['idCategoria'];

include "conexao.php";

$conexao = conectar();
$sql = "DELETE FROM table_categorias WHERE idCategoria = $id";

$result = mysqli_query($conexao, $sql);

if($result){
    desconectar($conexao);
    header('Location: categorias.php');
} else {
    desconectar($conexao);
    header('Location: categorias.php');
}

?>