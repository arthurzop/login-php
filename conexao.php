<?php

$usuario = 'root';
$senha = '';
$db = "login";
$host = "localhost";

$mysql = new mysqli($host, $usuario, $senha, $db);

if ($mysql -> error){
    die("Falha a conectar" . $mysql->error);
}else{
  echo "<h2>Conectado com sucesso!</h2>";    

}