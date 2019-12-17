
<!DOCTYPE html>
<?PHP
ob_start();

?>
<html>
<head>
	<title>Sessão e Cookies</title>
</head>
<body>

	<?PHP
		if (isset($_REQUEST ['autenticar']) && $_REQUEST['autenticar'] == true) {
			
			$hashDaSenha = md5($_POST['senha']);

			$sql = "SELECT NOME FROM USUARIOS WHERE EMAIL = '".$_POST["email"]."' AND SENHA = '".$hashDaSenha."'";

			$conector = mysql_connect("localhost", "root", "");
			mysql_select_db("cursophp", $conector);

			$resultado = mysql_query($sql, $conector);

			if ($registro = mysql_fetch_array($resultado)) {
				
				setcookie("ultimoacesso", date("d/m/Y"), time() +30*24*60*60);

				session_start();


				$_SESSION ["usuario"] = $registro["NOME"];

				header("location:ap_sessao_e_cookies_02.php");
			}
		}


	?>

	<form method="POST" action="?autenticar=true"></form>

		E-mail: <input type="text" name="email"><BR>
		Senha: <input type="password" name="senha"><BR>
		<input type="submit" value="Enviar">

</body>
</html>

<?PHP

	ob_flush();

?>