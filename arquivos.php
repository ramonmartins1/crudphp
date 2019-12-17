<DOCTYPE html>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<?PHP
			$filepath = "C:/xampp/htdocs/teste.txt";

			//a+ grava arquivo e cria caso não exista

			$meuArquivo = fopen($filepath, "a+");

			if (is_file($filepath)) {
				echo "O arquivo existe, e seu tamanho é: " . filesize($filepath);

			}else{
				echo "Arquivo não existe" . "<br/>";
			}

			fwrite($meuArquivo, "Ramon Martins Rodrigues");
			fwrite($meuArquivo, "- Cursos On-line");
			fwrite($meuArquivo, "\r\n Conteudo em uma Nova Linha");
			filesize($filepath);
			echo "<br/>";
			fclose($meuArquivo);
			echo "<br/>";

			
			$meuArquivo= fopen($filepath, "r");
			$buffer = fread($meuArquivo, 10);

			echo $buffer;

			$meuArquivo = file($filepath);
			for ($i=0; $i < count($meuArquivo); $i++) { 
				echo "Linha" . $i . ": ".$meuArquivo[$i]."<BR>";
			}




		?>

	</body>
	</html>