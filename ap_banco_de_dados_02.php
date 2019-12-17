


<!DOCTYPE html>
<html>
<head>
	<title>Listando Usuarios</title>
</head>
<body>

	<table>
		<TR>
			<td>Nome</td>
			<td>E-mail</td>
			<td>Idade</td>
			<td>Sexo</td>
			<td>Estado Civil</td>
			<td>Humanas</td>
			<td>Exatas</td>
			<td>Biologicas</td>
			<td>Hash da Senha</td>
			<td>Ações</td>

			<BR>

			<?PHP

				$conector= mysql_connect("localhost", "root", "");

				mysql_select_db("cursophp", $conector);

				if (isset($_REQUEST['excluir']) && $_REQUEST['excluir'] == true) {
					
					$sql = "DELETE FROM USUARIOS WHERE ID= ". $_REQUEST['id'];

					mysql_query($sql, $conector);

					echo "Usuario removido com sucesso <BR>";

				}

				$sql = mysql_query("SELECT * FROM USUARIOS", $conector);

				while ($resultado = mysql_fetch_array($sql)) {
					echo "<TR>";
					echo "<TD>". $resultado['NOME']. "<TD>";
					echo "<TD>". $resultado['EMAIL']. "<TD>";
					echo "<TD>". $resultado['IDADE']. "<TD>";
					echo "<TD>". $resultado['SEXO']. "<TD>";
					echo "<TD>". $resultado['ESTADO_CIVIL']. "<TD>";
					echo "<TD>". $resultado['HUMANAS']. "<TD>";
					echo "<TD>". $resultado['EXATAS']. "<TD>";
					echo "<TD>". $resultado['BIOLOGICAS']. "<TD>";
					echo "<TD>". $resultado['SENHA']. "<TD>";
					echo "<TD> <a href = 'ap_banco_de_dados_02.php?excluir=true&id=". $resultado['ID']."'> X </a> <TD>";
					echo "</TR>";
				}

				mysql_close($conector);



			?>





		</TR>





	</table>





</body>
</html>