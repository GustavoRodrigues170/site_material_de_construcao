<?php
    session_start();
?>

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
    
        <main>
            <div id="carousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/slide1.png" class="d-block w-100" alt="Slide 1">
                    </div>

                    <div class="carousel-item">
                        <img src="img/slide2.png" class="d-block w-100" alt="Slide 2">
                    </div>

                    <div class="carousel-item">
                        <img src="img/slide3.png" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

        
        <!-- PRODUTOS COM PROMOÇÃO -->

        <div class="container">
            <h3 class="title-mv"> Todos os Produtos </h3>
            <div class="row index-box">

            <?php
                    include 'conexao.php';

                    $conexao = conectar();

                    $sql = "SELECT * FROM table_produtos ORDER BY nomeProduto";
                    $result = mysqli_query($conexao, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='col-6 col-md-3 botao-vermais'>
                            <div id='border-produto'>
                                <a href='detalhe-item.php?idProduto=".$row['idProduto']."'>
                                    <img src='imagens/".$row['imagem']."' alt='tinta' class='img-fluid imagem-produtos'>
                                    <p class='nome-produtos'>".$row['nomeProduto']."</p>
                                    <p class='preco-descontado'>".$row['precoProduto']."</p>
                                    <button type='button' class='btn botao-vermais' > Ver mais </button>
                                </a>
                            </div>
                        </div>";
                        }
                    } else {
                        echo "<p class='nome-categoria'> Nenhum produto cadastrado <p>";
                    }

                    desconectar($conexao);
                ?>
            
            </div>
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