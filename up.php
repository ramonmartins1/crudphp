<DOCTYPE html>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<?PHP

			if (isset($_REQUEST['envio']) &&  ($_REQUEST['envio']) == "true") {
				if(isset($_FILES['campoArquivo'])){

					$arquivoNome= $_FILES['campoArquivo']['name'];
					$arquivoTipo= $_FILES['campoArquivo']['type'];
					$arquivoTamanho= $_FILES['campoArquivo']['size'];
					$nomeTemporario= $_FILES['campoArquivo']['tmp_name'];
					$erro= $_FILES['campoArquivo']['error'];

					if($erro == 0){
						if(is_uploaded_file($nomeTemporario)){

							if(move_uploaded_file($nomeTemporario, "uploads/".$arquivoNome)){

								echo "Arquivo Enviado com sucesso! <BR>";

								echo "Nome Arquivo:".$arquivoNome."<BR>" ;
								echo "Tipo Arquivo ".$arquivoTipo."<BR>";
								echo "Tamananho Arquivo:".$arquivoTamanho."<BR>";
								echo "Nome temporario: ".$nomeTemporario."<BR>";


							}
						}
					}

				}
			}



		?>
		<form enctype="multipart/form-data" method="POST" action="up.php?envio=true">
			
			<input type="FILE" name="campoArquivo">
			<BR><input type="submit" name="enviarArquivo" value="Enviar Arquivo">





		</form>
	
	</body>
	</html>