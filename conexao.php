<?php

$Servidor = "localhost";
$Usuario="root";
$Senha = "";
$Banco="financeiro";


@$conectar = mysql_connect($Servidor,$Usuario,$Senha);
mysql_select_db($Banco, $conectar );




?>

