<?php
function conectar() {
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "projetoconstructor";

    $conexao = mysqli_connect ($db_host, $db_username, $db_password, $db_name);

    if(!$conexao){
        die("Erro: ". mysqli_connect_error());
    } 
        
    return $conexao;
}

function desconectar($conexao){
    mysqli_close($conexao);
}
?>