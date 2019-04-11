<?php

//conexÃo
require_once 'connection.php';

//sessÃo
session_start();

//verificaçÃo
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
else:
    $id_global = $_SESSION['id_usuario'];
endif;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

		<!--Fonts-->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!--CSS Person-->
		<link rel="stylesheet" href="css/especializati.css">
		<link rel="stylesheet" href="css/especializati-reset.css">

		<!--Favicon-->
		<link rel="icon" type="image/png" href="imgs/favicon.png">
        
        <!--jQuery-->
        <script src="js/jquery-3.1.1.min.js"></script>

        <script src="bootstrap/js/popper.min.js"></script>
        <!-- jS Bootstrap -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
          $('.dropdown-toggle').dropdown()
        </script>
	</head>
    
    <body>
        
        <!--MENU-->
        <section class="menu">

            <div class="logo">
                <img src="imgs/icone-especializati.png" alt="EspecializaTi" class="logo-painel">
            </div>

            <div class="list-menu">
                <ul class="menu-list">
                    <li>
                        <a href="?pag=home">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>

                    <!--<li>
                        <a href="?pag=list">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            Listagem
                        </a>
                    </li>

                    <li>
                        <a href="?pag=forms">
                            <i class="fa fa-fort-awesome" aria-hidden="true"></i>
                            Forms
                        </a>
                    </li>-->
                    
                    <li>
                        <a href="?pag=list">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            Usuário
                        </a>
                    </li>

                    <li>
                        <a href="?pag=immobile">
                            <i class="fa fa-building" aria-hidden="true"></i>
                            Imóvel
                        </a>
                    </li>

                    <li>
                        <a href="logout.php">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>

        </section><!--End Menu-->
        <?php
            $sql = "SELECT nome FROM usuario WHERE id = '$id_global'";
            $result = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($result);
        ?>
        <section class="content">
            <div class="top-dashboard">

                <div class="user-dash">
                    <div id="dropDownCuston" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="imgs/user-carlos-ferreira.png" alt="Carlos Ferreira" class="user-dashboard img-circle rounded">

                        <button type="button" class="btn btn-light btn-user"><?php echo strip_tags($dados['nome']); ?></button>

                    </div>
                </div>
            </div>



            <!--Top Dashboard-->

               <?php

                if(!isset($_GET['pag']))
                    /*include 'pags/home.php';*/
                    include 'pags/register.php';
                elseif(file_exists("pags/{$_GET['pag']}.php"))
                    include "pags/{$_GET['pag']}.php";
                else
                    include 'pags/404.php';

                ?>


            </div>

        </section>



        
    </body>
</html>