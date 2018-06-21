
<?php

session_start();

include ("conexao.php");

include ("function.php");


if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:login.php');
}

$logado = $_SESSION['login'];




if (isset($_REQUEST['mes']))
	$mes_hoje = $_GET['mes'];
else
	$mes_hoje = date('m');

if (isset($_REQUEST['ano']))
	$ano_hoje = $_GET['ano'];
else
	$ano_hoje = date('Y');




header("Content-Type: text/html; charset=ISO-8859-1", true);

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR">

	<head>
											<title> Gerenciador financeiro </title>

		<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />


		<link href="estilo.css" rel="stylesheet" type="text/css" />



		<script language="javascript" type="text/javascript">
			function validar() {


				var txtdescricao = form1.txtdescricao.value;
				var val = form1.val.value;

				
				if (txtdescricao == "") {
					alert('"Preencha o Campo Descrição"');
					form1.txtdescricao.focus();
					return false;
				}

				if (val == "") {
					alert('"Preencha o campo Valor"');
					form1.val.focus();
					return false;
				}


			}


			document.getElementById('autoForm').submit();

		</script>



	</head>


	<body>

	
	<table border="5" cellpadding="" cellspacing=""  width="1200" align="center" style="background-color:rgba(2, 7, 8, 0.16)">

		<!--/*****************************TOPO************************/-->

		<tr bgcolor="black">

						<td height="50" width="1200" colspan="3" align="center">
							
							<table border="0" width="1000" height="35" cellpadding="2" class="fontetable">




								<tr>
										<td colspan="11" style="background-color:#327084;">
											<h2 style="color:#FFF; margin:5px">Financeiro </h2>
										</td>
										<td colspan="2" align="right" style="background-color:#327084; font-size: 18px">
											<a style="color:#FFF" href="?mes=<?php echo date('m')?>&ano=<?php echo date('Y')?>"><strong> <?php echo date('d')?> de <?php echo mostraMes(date('m'))?> de <?php echo date('Y')?></strong></a>&nbsp;
										</td>
									</tr>
									<tr>

										<td width="70">
											<select onchange="location.replace('?mes=<?php echo $mes_hoje?>&ano='+this.value)">
												<?php
												for ($i=2016;$i<=2100;$i++){
													?>
													<option value="<?php echo $i?>" <?php if ($i==$ano_hoje) echo "selected=selected"?> ><?php echo $i?></option>
												<?php }?>
											</select>
										</td>


										<?php
										for ($i=1;$i<=12;$i++){
											?>
											<td align="center" style="<?php if ($i!=12) echo "border-right:1px solid #FFF;"?> padding-right:14px">
												<a href="?mes=<?php echo $i?>&ano=<?php echo $ano_hoje?>" style="
												<?php if($mes_hoje==$i){?>
    			color:#033; font-size:16px; font-weight:bold; background-color:#FFF; padding:5px
    <?php }else{?>
    color:#FFF; font-size:16px;
    <?php }?>
													">
													<?php echo mostraMes($i);?>
												</a>
											</td>
											<?php
										}
										?>
									</tr>
								</table>

						</td>


</tr>

		<!--/*****************************logout************************/-->
<tr >

	<td valign=bottom width="7%" height="50" rowspan="2" bgcolor="black" valign="top" align="left" class="tdfont">


		<a style=" font-size:14px; color: white;" href="login.php?sair"><strong>Logout</strong></a>

	</td>
	
	<td height="400" width="60%">


		<!--/*****************************MOVIMENTA??O************************/-->





			<p> <font size="5" > Adicionar Movimento</font></p>




			<form name="form1" method="post"  action="incluir.php" onSubmit="return validar()">




				<strong> Data:</strong><br/>
				<input type="date" name="d" value="<?php echo date('d')?>"  style="font-family: Arial; font-size: 11pt; width:23px" maxlength="2">
					<input type="date" name="m" value="<?php echo $mes_hoje?>" style="font-family: Arial; font-size: 11pt; width:23px" maxlength="2">
						<input type="date" name="a" value="<?php echo $ano_hoje?>" style="font-family: Arial; font-size: 11pt; width:40px" maxlength="4">


				<br/><br/>


				<strong>Tipo:</strong>
				<label style="color:#030"><input type="radio" name="tipo" value="1" checked id="tipo_receita" /> Receita</label>&nbsp;
					<label style="color:#C00"><input type="radio" name="tipo" value="0" id="tipo_despesa" /> Despesa</label>

				<br/><br/>

				<strong>Categoria:</strong><br/>
				<select name="select" >
					<option value="Pessoal">Pessoal</option>
						<option value="outros" selected>outros</option>

				</select><br/><br/>




				<strong>Descrição:</strong><br/>
					<input type="text" name="txtdescricao" style="width:500px" maxlength="70">



			<br/><br/>

				<strong>Valor:</strong><br/>
				R$<input type="text" name="val" maxlength="10"  style="width:70px"  />



				<br/><br/>



				<input class="botao02" type="submit" name="Gravar" value="Enviar">


				</Form>

	
	</td>
						<!--/*****************************BALAN?O************************/-->

	
	<td valign="top" align="center">

		<?php


		/*****Mes****/
		$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val > 0 && mes='$mes_hoje' && ano='$ano_hoje' ");
		while($sum = mysql_fetch_array($pesquisa))
			$entrada = $sum['total'];


		 $pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val < 0 && mes='$mes_hoje' && ano='$ano_hoje' ");
		while($sum = mysql_fetch_array($pesquisa))
			$saida = $sum['total'];

		$balanco = $entrada + $saida;


		


		/*****ano*****/

		$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val > 0 && ano='$ano_hoje' ");
		while($sum = mysql_fetch_array($pesquisa))
			$entrada_ano = $sum['total'];


		$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val < 0  && ano='$ano_hoje'  ");
		while($sum = mysql_fetch_array($pesquisa))
			$saida_ano = $sum['total'];


		$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val &&  ano='$ano_hoje' ");
		while($sum = mysql_fetch_array($pesquisa))
			$Resultado_ano = $sum['total'];



		?>




		<fieldset  >




			<legend style="font-size: 20px"><strong>Entradas e Saidas deste mês</strong></legend>
			
			<table cellpadding="0" cellspacing="0" width="100%" border="0">
				<tr>
					<td><span style="font-size:18px; color:#030">Entrada:</span></td>
					<td align="right"><span style="font-size:18px; color:#030"><?php echo formata_dinheiro($entrada) ?></span></td>
				</tr>
				<tr>
					<td><span style="font-size:18px; color:#C00">Saida:</span></td>
					<td align="right"><span style="font-size:18px; color:#C00"><?php echo formata_dinheiro($saida) ?>  </span></td>
				</tr>
				</tr>
				<tr>
					<td colspan="2">
						<hr size="1" />
					</td>
				</tr>
				<tr>
					<td><span style="font-size:18px; color:#030">Resultado:</span></td>
					<td align="right"><span style="font-size:25px; color:#030"> <?php echo formata_dinheiro($balanco) ?> </span></td>
				</tr>




			</table>




		</fieldset>	<br/>


		<fieldset>




			<legend style="font-size: 20px"><strong>Resultado do Ano</strong></legend>
			<table cellpadding="0" cellspacing="0" width="100%" border="0">


				<tr>
					<td><span style="font-size:18px; color:#030">Entrada:</span></td>
					<td align="right"><span style="font-size:18px; color:#030"><?php echo formata_dinheiro($entrada_ano) ?></span></td>
				</tr>
				<tr>
					<td><span style="font-size:18px; color:#C00">Saida:</span></td>
					<td align="right"><span style="font-size:18px; color:#C00"><?php echo formata_dinheiro($saida_ano) ?>  </span></td>
				</tr>
				</tr>
				<tr>
					<td colspan="2">
						<hr size="1" />
					</td>
				</tr>

				<tr>
					<td><span style="font-size:18px; color:#030">Resultado:</span></td>
					<td align="right"><span style="font-size:25px; color:#030"> <?php echo formata_dinheiro($Resultado_ano) ?> </span></td>
				</tr>




			</table>


		</fieldset>




	</td>
	
	
	
	
</tr>











		<tr style="background-color:white">
							<!-------------FILTRO-------------------->

			<td height="400" width="90%" colspan="2" valign="top" align="center"  >
						<h3>Movimentos</h3>

<form method="post" action="" id="autoForm">

				<strong>Buscar:</strong>
				<label ><input type="radio" name="filter" value="0" id="filter_todos" /> Todos</label>&nbsp;
				<label ><input type="radio" name="filter" value="1" id="filter_produto" /> outros</label>
				<label ><input type="radio" name="filter" value="2" id="filter_servico" /> Pessoal</label>

				<input type="submit" name="submit" value="Filtrar">

</form>

				<?php





					$consulta = "select * from movimento where mes='$mes_hoje' && ano='$ano_hoje' ORDER by id DESC ";
					$resultado = mysql_query($consulta);



				@$filtro = $_POST['filter'];
				if($filtro == "1") {
					$consulta =  "select * from movimento where cat='outros' && mes='$mes_hoje' && ano='$ano_hoje' ORDER by id DESC ";
					$resultado = mysql_query($consulta);




				}elseif ($filtro == "2"){
					$consulta = "select * from movimento where cat='Pessoal' && mes='$mes_hoje' && ano='$ano_hoje' ORDER by id DESC ";
					$resultado = mysql_query($consulta);




				}




				?>


<div>

		<table width="100%" border='1' align="Left" class="borda1" >



<!-------------------------------------------------Resultado Movimento ---------------------------------------------------------->


			<?php while ($retorno = mysql_fetch_assoc($resultado)){  ?>

				<tr  style=" background: rgba(2, 7, 8, 0.16)">


					<td align="right" width="5%" class="borda1">


						<?php echo $retorno["id"]; ?> 	&nbsp;&nbsp; <br/>



					</td>

					<td width="20%" class="borda1">


									<?php echo $retorno["desk"]; ?>




					</td>

					<td width="10%" class="borda1" align="center" style=" color:steelblue ">


										[<strong><?php echo $retorno["cat"]; ?></strong>]


					</td>


					<td class="borda1" width="10%" align="center">

											<?php echo $retorno["day"]; ?>
													<strong>/</strong>
						 						<?php echo $retorno["mes"]; ?>
													<strong>/</strong>
													 <?php echo $retorno["ano"]; ?> </td>


					<td class="borda1" width="50px">


														<a  class="botao01" href="deletar.php?var=<?php echo $retorno['id']; ?>" >Deletar </a>

					</td>



					<td class="borda1" width="" align="right" "> <?php echo  formata_dinheiro($retorno["val"]); ?> </td>





				</tr>



			<?php } ?>


		</table>

		<br/>






	<?php

	///**** FILTRO valor *******/////


	$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val && mes='$mes_hoje' && ano='$ano_hoje' ");
	while($sum = mysql_fetch_array($pesquisa))
		$resultado_val = $sum['total'];


	@$filtro = $_POST['filter'];
	if($filtro == "1") {
		$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val && cat='Produto' && mes='$mes_hoje'  ");
		while($sum = mysql_fetch_array($pesquisa))
			$resultado_val = $sum['total'];




	}elseif ($filtro == "2"){
		$pesquisa = mysql_query("SELECT sum(val) as total FROM movimento where val && cat='Serviços' && mes='$mes_hoje'  ");
		while($sum = mysql_fetch_array($pesquisa))
			$resultado_val = $sum['total'];

	}

	?>

	<table border="0">
		<tr >

			<td width="1080px" align="right" style="font-size: 23px">


				<strong>Total:&nbsp;&nbsp;&nbsp;<?php echo formata_dinheiro($resultado_val)?></strong>

			</td>


		</tr>

</table>

</div>
	</td>

</tr>
	

	
	</table>


	</body>






</html>

