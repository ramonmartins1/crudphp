
<!DOCTYPE html>
<html>
<head>
	<title>Sessao e Cookies</title>
</head>
<body>

	<?PHP

		session_start();

		if(!isset($_SESSION["usuario"])){

			echo "erro";
			exit(1);
		}

		echo "Olá" . $_SESSION["usuario"].", seu ultimo acesso foi em ".$_COKKIE["ultimoacesso"]."<BR><BR>";


	?>


</body>
</html>