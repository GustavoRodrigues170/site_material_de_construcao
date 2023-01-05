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

        <!-- BARRINHA -->

        <div class="container">
            <div class="row title">
                <div class="col-6">
                    <h3> ITENS CADASTRADOS </h3>
                </div>

                <div class="col-6 botao-cadastrar">
                        <button class="btn"> <a href="cadastrar-item.php">Cadastrar item </a></button>
                </div>
            </div>

            <div class="row caminho-barra">
                <div class="col-12">
                    <p><a href="index.php"> Home </a> / <a href="perfil.php"> Perfil </a>/ Itens Cadastrados </p>
                </div>
            </div> 

        <!-- ITENS COMPRADOS -->

            <div class="row row-barra-itens">
                <div class="col-4 col-md-3">
                    <p> ITEM </p>
                </div>

                <div class="col-4 col-md-3">
                    <p> DESCRIÇÃO </p>
                </div>

                <div class="col-4 col-md-3">
                    <p> PREÇO </p>
                </div>

                <div class="col-3">
              
                </div>
            </div> 

            <div class="row row-itens-cadastrados">
                <div class="col-4 col-md-3">
                    <img src="img/p5.jpg" alt="Produto Comprado">
                    <p> Aparador de Grama 1500W 127V Trapp <br><b> Ferramentas </b></p>
                </div>

                <div class="col-4 col-md-3 descricao-produto">
                    <p> 
                        O Aparador de grama elétrico modelo Master 1500 da Trapp possui 
                        o motor mais potente do mercado, com 1500 watts a fio de nylon. 
                        Conta com punho de sustentação com ajuste.
                    </p>
                </div>

                <div class="col-4 col-md-3 preco-margin">
                    <p> R$ 99,00 </p>
                </div>

                <div class="col-12 col-md-3">
                    <button class="btn btn-primary" type="button"> <a href="editar-item.php">  Editar </a></button> 
                    <button class="btn btn-danger" type="button"> Excluir </button>
                </div>
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
