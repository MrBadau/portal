<?php

//CONEXÃO
require_once 'connection.php';

//SESSÃO
session_start();

//BOTÃO CADASTRAR
if(isset($_POST['btn-cadastrar2'])):
	$erros = array();
    $id =      $_POST['id'];
	$email     = mysqli_escape_string($connect, $_POST['email']);
    $nome      = mysqli_escape_string($connect, $_POST['nome']);
	$senha     = mysqli_escape_string($connect, $_POST['senha']);
    $senha2    = mysqli_escape_string($connect, $_POST['senha2']);
    $documento = mysqli_escape_string($connect, $_POST['documento']);
    $fixo      = mysqli_escape_string($connect, $_POST['fixo']);
    $telefone  = mysqli_escape_string($connect, $_POST['telefone']);
    $endereco  = mysqli_escape_string($connect, $_POST['endereco']);
    $numero    = mysqli_escape_string($connect, $_POST['numero']);
    $complemento    = mysqli_escape_string($connect, $_POST['complemento']);
    $cep       = mysqli_escape_string($connect, $_POST['cep']);
    $cidade    = mysqli_escape_string($connect, $_POST['cidade']);
    $bairro    = mysqli_escape_string($connect, $_POST['bairro']);

    $valida = 1;

    if(!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)):
        $valida = 0; 
        $erros[0] = "E-mail invalido";
    else:
        $sql2 = "SELECT id FROM usuario WHERE email = '$email' AND id <> '$id'";
        $result = mysqli_query($connect, $sql2);
        $rowcount = mysqli_num_rows($result);
        
        if($rowcount > 0):
            $valida = 0;
            $erros[1] = "E-mail ja cadastrado";
        endif;
    endif;

    if(!isset($nome) || !is_string($nome) || strlen($nome) <= 4 || strlen($nome) >= 100):
        $valida = 0; 
        $erros[2] = "Nome invalido";
    else:
        //PRIMEIRA LETRA EM MAIUSCULO
        $nome = ucwords($nome);
    endif;

    if(!isset($senha) || strlen($senha) <= 4 || strlen($senha) >= 11):
        $valida = 0; 
        $erros[3] = "Senha invalida";
    endif;
    
    if($senha <> $senha2):
        $valida = 0; 
        $erros[4] = "Senhas não coincidem";
    else:
        $senha = md5($senha);
    endif;
    
    if(!isset($documento) || strlen($documento) <= 10 || strlen($documento) >= 12):
        $valida = 0; 
        $erros[6] = "CPF Inválido";
    endif;
    

    if(strlen($fixo) == 0 or strlen($fixo) <= 7 || strlen($fixo) >= 12):
        $valida = 0;
        $erros[7] = "Telefone Fixo Inválido";
    endif;
    
    if(!isset($telefone) || strlen($telefone) <= 7 || strlen($telefone) >= 12):
        $valida = 0; 
        $erros[8] = "Telefone Inválido";
    endif;
    
    if(!isset($endereco) || !is_string($endereco) || strlen($endereco) <= 3 || strlen($endereco) >= 200):
        $valida = 0; 
        $erros[9] = "Endereço Inválido";
    endif;
    
    if(!isset($numero) || strlen($numero) <= 1 || strlen($numero) >= 11):
        $valida = 0; 
        $erros[10] = "Número Inválido";
    endif;
    
    if(strlen($complemento) >= 101):
        $valida = 0; 
        $erros[7] = "Complemento Inválido";
    endif;
    
    if(!isset($cep) || strlen($cep) <= 7 || strlen($cep) >= 9):
        $valida = 0; 
        $erros[12] = "Cep Inválido";
    endif;
    
    if(!isset($cidade) || strlen($cidade) <= 0 || strlen($cidade) >= 2):
        $valida = 0; 
        $erros[13] = "Cidade Inválida";
    endif;
    
    if(!isset($bairro) || strlen($bairro) <= 0 || strlen($bairro) >= 4):
        $valida = 0; 
        $erros[14] = "Bairro Inválido";
    endif;

    //IF PARA TESTAR A VALIDACAO
    if($valida==true):
        
        $sql = "UPDATE usuario SET email = '$email', nome = '$nome', senha = '$senha', documento = '$documento', celular = '$fixo', telefone = '$telefone', endereco = '$endereco', numero = '$numero', complemento = '$complemento', cep = '$cep', cidade = '$cidade', bairro = '$bairro' WHERE id = '$id'";
        
        echo $sql;
        
    else:
        echo "Não passou na validação<br>";
        foreach ($erros as $erro) {
            echo $erro.'<br>';
        }
    endif;

endif;