<?php

date_default_timezone_set('America/Sao_Paulo');

$server = "localhost";
$user = "root";
$password = "";
$db_name = "sistema";

$connect = mysqli_connect($server, $user, $password, $db_name);

mysqli_set_charset($connect,"utf8");

if(mysqli_connect_error()):
	echo "Falha na conexão ".mysqli_connect_error();
endif;