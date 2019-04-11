<?php
//conexÃo
require_once 'connection.php';

//sessÃo
session_start();

//botÃo entrar
if(isset($_POST['btn-entrar'])):
	/*$erros = array();*/
	$email = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);
	$senha = md5($senha);
	if(empty($email) or empty($senha)):
		echo "O Campo E-mail ou Senha precisa ser preenchido";
	else:
		$sql = "SELECT email FROM usuario WHERE email = '$email'";
		$result = mysqli_query($connect, $sql);
		//mysqli_close($connect);

		if(mysqli_num_rows($result) > 0):

			$sql = "SELECT id FROM usuario WHERE email = '$email' AND senha = '$senha'";
			$result = mysqli_query($connect, $sql);
			//mysqli_close($connect);

			if(mysqli_num_rows($result) == 1):
				$dados = mysqli_fetch_array($result);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: painel.php');
				mysqli_close($connect);
			else:
                //Senha Errada
                header('Location: Index.php?i=1');
			endif;

		else:
            //E-mail não encontrado
			header('Location: Index.php?i=2');
		endif;

	endif;
else:
	echo "Não clicou";
endif;