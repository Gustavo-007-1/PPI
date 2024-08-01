<?php
//configura��es para acesso ao BD
define('BD_USER', 'root'); // USE O TEU USU�RIO DE BANCO DE DADOS
define('BD_PASS', 'usbw'); // USE A TUA SENHA DO BANCO DE DADOS
define('BD_NAME', 'nexum'); // USE O NOME DO TEU BANCO DE DADOS

$conexao = mysqli_connect('localhost', BD_USER, BD_PASS);
mysqli_select_db($conexao, BD_NAME);
?>