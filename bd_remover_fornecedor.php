<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$id = $_GET['idFornecedor'];

include "conexao.php";

$conexao = conectar();
$sql = "DELETE FROM table_fornecedores WHERE idFornecedor = $id";

$result = mysqli_query($conexao, $sql);

if($result){
    desconectar($conexao);
    header('Location: fornecedores.php');
} else {
    desconectar($conexao);
    header('Location: fornecedores.php');
}

?>