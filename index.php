<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/newlogin.css">
        
        <!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        
        <!--Fonts-->
		<link rel="stylesheet" href="css/font-awesome.min.css">

    </head>
    <body class="text-center">
        <form class="form-signin" id="form-login" style="display:block;" action="valida-login.php" method="POST">
            <img class="mb-4 logo-login" src="imgs/logo.png" alt="">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <a class="btn btn-block btn-facebook"><i class="fa fa-facebook-square icon-facebook"></i> Entrar com Facebook</a>
            <label for="inputEmail" class="sr-only">E-mail</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
            <!--<div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>-->
            <button class="btn btn-lg btn-primary btn-block" name="btn-entrar" type="submit">Entrar</button>
            <div class="container">
                <div class="row cadastrar">
                    <a class="col-md-5" id="cadastrar" href="#">Cadastre-se</a>
                    <a class="col-md-7" id="esquecer" href="#">Esqueceu sua senha?</a>
                </div>
            </div>
        </form>
        
        <form class="form-signin" style="display:none;" id="form-cadastrar" method="POST" action="valida-cadastro.php">
            <img class="mb-4" src="imgs/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Cadastrar</h1>
            <label for="inputEmail2" class="sr-only">E-mail</label>
            <input type="email" id="email1" name="email1" class="form-control" placeholder="E-mail" autofocus>
            <label for="inputEmail2" class="sr-only">Nome</label>
            <input type="text" id="nome1" name="nome1" class="form-control" placeholder="Nome Completo" autofocus>
            <label for="senha" class="sr-only">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
            <label for="senha2" class="sr-only">Confirme a Senha</label>
            <input type="password" id="senha2" name="senha2" class="form-control" placeholder="Confirme a Senha">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="termos"> Termos de uso
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name="btn-cadastrar" type="submit">Cadastrar</button>
            <div class="container">
                <div class="row cadastrar">
                    <a class="col-md-12" id="voltar" href="#"><i class="fa fa-arrow-left"></i> Voltar</a>
                    
                </div>
            </div>
        </form>
        
        <form class="form-signin" style="display:none;" id="form-recuperar" action="" method="POST">
            <img class="mb-4" src="imgs/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Recuperar Senha</h1>
            <label for="inputEmail3" class="sr-only">E-mail</label>
            <input type="email" id="inputEmail3" name="email2" class="form-control" placeholder="E-mail" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" name="btn-enviar" type="submit">Enviar</button>
            <div class="container">
                <div class="row cadastrar">
                    <a class="col-md-12" id="voltar2" href="#"><i class="fa fa-arrow-left"></i> Voltar</a>
                    
                    
                </div>
            </div>
        </form>
        
    </body>
</html>

<!--jQuery-->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/additional-methods.min.js"></script>
<script src="js/localization/messages_pt_BR.js"></script>
<script src="js/java-login.js"></script>