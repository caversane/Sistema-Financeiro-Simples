<?php 

session_start();


$u = $_POST['login'];
$s = $_POST['senha'];


include ("conexao.php");

$select = mysql_select_db("financeiro") or die("Sem acesso ao DB");


$result = mysql_query("SELECT * FROM financeiro.logar WHERE  login= '$u' AND senha= '$s'");



if(mysql_num_rows ($result) > 0 )
{
$_SESSION['login'] = $u;
$_SESSION['senha'] = $s;
header('location:inicio.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:login.php');
		

	
	
	}

?>