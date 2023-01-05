<?php
session_start();
include "conexao.php";

$email = $_POST['email'];
$senha = sha1($_POST['senha']);

$conexao = conectar();

$sql = "SELECT * FROM table_usuarios WHERE emailUsuario = '$email' AND senhaUsuario = '$senha'";

$result = mysqli_query($conexao, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['nomeUsuario'] = $row['nomeUsuario'];
        $_SESSION['emailUsuario'] = $row['emailUsuario'];
        $_SESSION['senhaUsuario'] = $row['senhaUsuario'];
    }
    desconectar($conexao);
    header('Location: perfil.php');
} else {
    desconectar($conexao);
    header('Location: login.php');
}

?>