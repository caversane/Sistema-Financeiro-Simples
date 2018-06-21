

<?php



$cat = $_REQUEST["select"];
$val =  $_REQUEST["val"];
$desk = $_REQUEST["txtdescricao"];
$day = $_REQUEST ["d"];
$mes = $_REQUEST["m"];
$ano = $_REQUEST["a"];


$tipo = $_POST['tipo'];
if ($tipo == "1") {
    $val = 0 + $val;
}
else {
    $val = 0 - $val;
}



include ("conexao.php");

$SQL = "INSERT INTO movimento (cat,val,desk,day,mes,ano) VALUES('$cat','$val','$desk','$day','$mes','$ano')";

$resultado = mysql_query($SQL);


echo ("<script>
				{	
					alert('Registro  com Sucesso');
					location.href='inicio.php';
				}
			
			</script>");



?>

