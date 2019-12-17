
<!DOCTYPE html>
<html>
<head>
	<title>Banco de Dados</title>
</head>
<body>

	<?PHP

		$conector= mysql_connect("localhost", "root", "");

		if ($conector === FALSE) {
			exit("Falha ao conectar ao banco de dados:". mysql_error());
		}



		$dbSelector = mysql_select_db("cursophp", $conector);

		if ($dbSelector === FALSE) {
			
			exit("Banco inexistente:". mysql_error());
		}

		$sql = "SELECT ID, NOME, EMAIL FROM USUARIOS";


		$resultado = mysql_query($sql, $conector);


		if ($resultado === FALSE) {
			exit("Erro syntaxe SQL:". mysql_error());
		}


		while ($registro = mysql_fetch_array($resultado)) {
			echo $registro["ID"] ."<BR>".$registro["NOME"] ."<BR>".$registro["EMAIL"] ."<BR>";
		}

		mysql_close($conector);

	?>



</body>
</html>