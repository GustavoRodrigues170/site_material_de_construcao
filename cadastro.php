<?php

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    include "conexao.php";

    $conexao = conectar();

    $sql = "INSERT INTO table_usuarios(nomeUsuario, cpfUsuario, emailUsuario, senhaUsuario, enderecoUsuario, telefoneUsuario) VALUES ('$nome', '$cpf', '$email', '$senha', '$endereco', '$telefone')";
    $result = mysqli_query($conexao, $sql);

    if($result){
        desconectar($conexao);
        header('Location: login.php');
    } else {
        desconectar($conexao);
        header('Location: cadastro-usuario.php');
    }
?>