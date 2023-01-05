<?php
session_start();

if(!isset($_SESSION["nomeUsuario"])) {  
    header('Location: login.php');
}

$id = $_GET['idProduto'];
include "conexao.php";

$conexao = conectar();
$sql = "SELECT * FROM table_produtos WHERE idProduto = $id";

$result = mysqli_query($conexao, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $nome = $row['nomeProduto'];
        $preco = $row['precoProduto'];
        $imagem = $row['imagem'];
        $descricao = $row['descricaoProduto'];
        $categoria = $row['idCategoria'];
        $fornecedor = $row['idFornecedor'];
    }
} else {
        desconectar($conexao);
        header('Location: mercadorias.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Constructor - Compre online </title>
</head>
<body>
<!DOCTYPE html>
<html>
    <head>
        <title> Constructor - Compre online </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style/estilo.css">
    </head>

    <body>

        <!-- MENU -->

        <header>
        <nav class="navbar navbar-expand-lg" id="nav">
                <div class="container-fluid">
                    
                    <a class="navbar-brand" href="index.php" id="name-nav"> <img src="img/logo.png" alt="Logo da Constructor" class="logo"></a>

                    <button id="botao" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                    </button>
    
                    <div class="collapse navbar-collapse justify-content-end " id="navbar">
    
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"> HOME </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="lista-itens.php"> PRODUTOS </a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link" href="perfil.php"> PERFIL </a>
                            </li>
                            
                            <li class="nav-item">
                                <?php
                                    if(!isset($_SESSION['emailUsuario'])) {
                                        echo "<a class='nav-link' href='login.php'> LOGIN </a>";
                                    } 
                                ?>
                            </li>
                            
                            <li class="nav-item" >  
                                <?php
                                    if (isset($_SESSION['emailUsuario'])){
                                        echo "<a class='nav-link' href='desconectar.php'> LOGOUT </a>";
                                    }
                                ?> 
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
    
            <div class="container-fluid">
                <div class="row">

                    <div class="col-4 col-md categorias-box">
                        <p> Tintas <i class="bi bi-paint-bucket"></i></p>
                    </div>
    
                    <div class="col-4 col-md categorias-box">
                        <p> Iluminação <i class="bi bi-lightbulb"></i> </p>
                    </div>
    
                    <div class="col-4 col-md categorias-box">
                        <p> Ferramentas <i class="bi bi-wrench"></i> </p>
                    </div>
    
                    <div class="col-6 col-md categorias-box">
                        <p> Construção <i class="bi bi-bricks"></i> </p>
                    </div>
    
                    <div class="col-6 col-md categorias-box">
                        <p> Decoração <i class="bi bi-flower1"></i> </p>
                    </div>
                </div>

            </div>
        </header>

        <!-- BARRINHA -->

        <div class="container">
            <div class="row title">
                <div class="col-12">
                    <h3> EDITAR PRODUTO </h3>
                </div>
            </div>

            <div class="row caminho-barra">
                <div class="col-12">
                <p><a href="index.php"> Home </a> | <a href="perfil.php"> Perfil </a> |<a href="produtos.php"> Produtos </a> | <a href="mercadorias.php"> Estoque </a> | Editar Produto </p>
                </div>
            </div> 
        </div>

        <div class="container form">
            <form method="post" action="bd_editar_produto.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <label for="nome"><h6> Nome do Produto: </h6></label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $nome;?>" id="nome">
                    </div>

                    <div class="col-6">
                        <label for="preco"><h6> Preço do Produto: </h6></label>
                        <input type="text" name="preco" class="form-control" value="<?php echo $preco;?>" id="preco">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 img-editar">
                        <p> Imagem Atual: <img src="imagens/<?php echo $imagem; ?>" alt="Imagem de <?php echo $nomeProduto; ?>"></p>
                        <p><label> Selecione uma nova imagem: <input type="file" name="imagem_produto"></label></p>
                    </div>

                    <div class="col-6">
                        <label for="descricao"><h6> Descrição do Produto: </h6></label>
                        <textarea rows="3" cols="60" name="descricao" id="descricao"> <?php echo $descricao;?>  </textarea> 
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                <div class="row">
                    <?php
                        echo "<div class='col-6'>";
                        echo "<h6 class='label-produto'> Selecione a categoria: </h6>";
                        $sql = "SELECT * FROM table_categorias ORDER BY nomeCategoria";
                        $result = mysqli_query($conexao, $sql);
                        
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<p class='radio'><label><input type='radio' name='categoria' value='".$row['idCategoria']."'";
                                if($row['idCategoria'] == $categoria) {
                                    echo "checked";
                                }
                                echo "> ".$row['nomeCategoria']."</label></p>";   
                            }
                        } else {
                            echo "<p> Nenhuma categoria cadastrada </p>";
                            
                        }
                        echo "</div>";


                        echo "<div class='col-6'>";
                        echo "<h6 class='label-produto'> Selecione o fornecedor: </h6>";
                        $sql = "SELECT * FROM table_fornecedores ORDER BY nomeFornecedor";
                        $result = mysqli_query($conexao, $sql);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<p class='radio'><label><input type='radio' name='fornecedor' value='".$row['idFornecedor']."'";
                                if($row['idFornecedor'] == $fornecedor) {
                                    echo "checked";
                                }
                                echo "> ".$row['nomeFornecedor']."</label></p>";   
                            }
                        } else {
                            echo "<p> Nenhum fornecedor cadastrado </p>";

                        }
                        echo "</div>";

                        desconectar($conexao);
                        ?>
                </div>

                <p><input class="btn btn-primary button-geral" type="submit" value="Atualizar"></p>

            </form>
        </div>

         <!-- RODAPÉ -->
     
         <footer>
            <div class="container-fluid" id="contact-area">
                <div class="row">
                    <div class="col-6" id="name-footer"> <img src="img/logo.png" alt="Logo da Constructor" class="logo"> </div>
                    <div class="col-6 contact-box">
                        <p><span class="contact-title"> <i class="bi bi-telephone"></i> Telefone: <br></span> (84) 99999-9999</p>
                        <p><span class="contact-title"> <i class="bi bi-envelope"></i> E-mail: <br></span> contructorcontato@gmail.com</p>
                        <p><span class="contact-title">  Desenvolvido por: <br></span> Agenilton de Holanda e Luiz Gustavo</p>
                        <a href="https://www.facebook.com"> <i class="bi bi-facebook"></i> </a>
                        <a href="https://www.instagram.com"> <i class="bi bi-instagram"></i> </a>
                        <a href="https://twitter.com"> <i class="bi bi-twitter"></i> </a>
                    </div>
                </div>
            </div>
        </footer>
     
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    </body>
</html>

</body>
</html>