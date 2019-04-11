<?php
require_once '../conexao.php';
session_start();

/*if(isset($_POST['btn_cadastrar'])):*/
    
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha1 = mysqli_escape_string($connect, $_POST['senha1']);
    $senha2 = mysqli_escape_string($connect, $_POST['senha2']);

    

/*else:
    header('Location.login.php');
    
endif;*/

if(strlen($nome) <= 3):
    $valida = 0;
    $erro = 1;
endif;

if($senha 1 <> $senha2):
    $valida = 0;
    $erro = 2;
endif;

if($strlen($senha1) <= 4):
    $valida = 0;
    $erro = 3;
endif;