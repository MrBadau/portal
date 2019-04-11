
<html>
    <head>
        <link href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styleform.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    </head>
    <body id="LoginForm">
        <div class="container">
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>Registrar</h2>
                        <p>Please enter your email and password</p>
                    </div>
                    <form id="Login" action="action/createuser.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nome" placeholder=" Nome Completo">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="Email" placeholder=" Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder=" Senha">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_cadastrar">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>