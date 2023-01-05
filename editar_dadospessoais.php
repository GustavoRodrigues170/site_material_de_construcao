<?php

session_start();
if(!isset($_SESSION['emailUsuario'])) {
    header('Location: login.php');
}

include "conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];

$conexao = conectar();

$sql = "UPDATE table_usuarios SET nomeUsuario='$nome', cpfUsuario='$cpf', emailUsuario='$email',
senhaUsuario='$senha', enderecoUsuario='$endereco', telefoneUsuario='$telefone'
                 WHERE idUsuario=$id";

$result = mysqli_query($conexao, $sql);

if($result){
    desconectar($conexao);
    header('Location: perfil.php');
} else {
    desconectar($conexao);
    header('Location: perfil-dadospessoais.php');
}
?>