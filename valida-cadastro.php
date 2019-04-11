<?php

//CONEXÃO
require_once 'connection.php';

//SESSÃO
session_start();

//BOTÃO CADASTRAR
if(isset($_POST['btn-cadastrar'])):
	$erros = array();
	$email     = strip_tags(mysqli_escape_string($connect, $_POST['email1']));
    $nome      = strip_tags(mysqli_escape_string($connect, $_POST['nome1']));
	$senha     = strip_tags(mysqli_escape_string($connect, $_POST['senha']));
    $senha2    = strip_tags(mysqli_escape_string($connect, $_POST['senha2']));
    $termos    = $_POST['termos'];

    $valida = 1;

    if(!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)):
        $valida = 0; 
        $erros[0] = "E-mail invalido";
    else:
        //VERIFICA SE E-MAIL JÁ ESTÁ CADASTRADO
        $sql2 = "SELECT id FROM usuario WHERE email = '$email'";
        $result = mysqli_query($connect, $sql2);
        $rowcount = mysqli_num_rows($result);
        
        if($rowcount > 0):
            $valida = 0;
            $erros[1] = "E-mail ja cadastrado";
        endif;
    endif;

    if(!isset($nome) || !is_string($nome) || strlen($nome) <= 4):
        $valida = 0; 
        $erros[2] = "Nome invalido";
    else:
        //PRIMEIRA LETRA EM MAIUSCULO
        $nome = ucwords($nome);
    endif;

    if(!isset($senha) || strlen($senha) <= 4):
        $valida = 0; 
        $erros[3] = "Senha invalida";
    endif;
    
    if($senha <> $senha2):
        $valida = 0; 
        $erros[4] = "Senhas não coincidem";
    else:
        $senha = md5($senha);
    endif;

    if(!$termos==true):
        $valida = 0; 
        $erros[5] = "Não aceitou os termos";
    endif;

    //IF PARA TESTAR A VALIDACAO
    if($valida==true):
        
        $sql = "INSERT INTO usuario (email, nome, senha) VALUES ('$email', '$nome', '$senha')";
        
        if(mysqli_query($connect, $sql)):
           
            $sql1 = "SELECT id FROM usuario WHERE email = '$email' AND senha = '$senha'";
			$result = mysqli_query($connect, $sql1);
            $dados = mysqli_fetch_array($result);
            
            $_SESSION['logado'] = true;
            $_SESSION['id_usuario'] = $dados['id'];
            header("Location:painel.php");
        endif;
    else:
        echo "Não passou na validação<br>";
        foreach ($erros as $erro) {
            echo $erro.'<br>';
        }
    endif;

endif;