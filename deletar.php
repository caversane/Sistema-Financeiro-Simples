<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
echo '<title>Exclusão de Registro</title>';
include "conexao.php";

$codigo = $_REQUEST['var'];

if ($codigo <>'') {



    $SQL= "Delete from financeiro.movimento where id = " . $_REQUEST['var']  ;

    $resultado = mysql_query($SQL);

    echo ("<script>
				{	
					alert('Registro Excluido com Sucesso');
					location.href='inicio.php';
				}
			
			</script>");

} else {
    echo "Não foi selecionado nenhum registro para ser excluido";
    echo "<br><br><a href='javascript:window.history.go(-1)'>Voltar</a><br><br>";
}
?>
