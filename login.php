<?php

include 'function.php';


?>

<html >

<head>

    <title >Financeiro</title>


</head>
<body style="padding:10px">

<table cellpadding="1" cellspacing="10"  width="900" align="center" style="background-color:#033">

    <tr>
        <td colspan="11" style="background-color:#327084;">
            <h2 style="color:#FFF; margin:5px">Controle Financeiro </h2>
        </td>
        <td colspan="2" align="right" style="background-color:#327084;">
            <a style="color:#FFF" href="?mes=<?php echo date('m') ?>&ano=<?php echo date('Y') ?>">Hoje:<strong> <?php echo date('d') ?> de <?php echo mostraMes(date('m')) ?> de <?php echo date('Y') ?></strong></a>&nbsp;
        </td>
    </tr>
</table>
<br />
<br />
<table cellpadding="1" cellspacing="10"  width="900" align="center" >

    <tr>
        <td colspan="11" align="center" >
            Faça Login para entrar no sistema:
            <br><br>
            <form action="logar.php" method="post" name='login'>

                Login: <input type='text' name='login'><br>
                Senha: <input type='password' name='senha'><br>
                <br>
                <input type='submit' name='OK' value='Entrar'>

            </form>
            <br>

        </td>
    </tr>
</table>

</body>
</html>
