<DOCTYPE html>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<?PHP
		$meuArray = array("andre", "php", "softblue");

		echo $meuArray[0];
		print_r($meuArray);

		foreach ($meuArray as $pedacoDoArray) {

			echo "Tem no Array: ".$pedacoDoArray."<BR/>";
		}
		for ($x=0; $x <sizeof($meuArray) ; $x++) { 
			
			echo "Tem no Array: ".$meuArray[$x]."<BR/>";

		}
		echo "<br/>";
		echo count($meuArray);
		echo "<br/>";
		unset($meuArray[1]);
		echo "<br/>";
		echo count($meuArray);
		echo "<br/>";
		echo "<br/>";
		print_r($meuArray);
		echo "<br/>";
		array_push($meuArray, "milani");
		print_r($meuArray);
		$elemento = array_pop($meuArray);

		echo $elemento;
		print_r($meuArray);
		echo "<br/>";
		array_shift($meuArray);
		echo "<br/>";
		print_r($meuArray);
		echo "<br/>";

		array_unshift($meuArray, "Ramon");
		print_r($meuArray);


		function insereTexto($var){

			$var= "texto:" . $var;
			return $var;


		}

		$novoArray = array_map("insereTexto", $meuArray);
		print_r($novoArray);

		$meuArray2 = array("Pos1"=>"Ramon", "Pos2"=>"php", "Pos3"=>"asoftblue");

		print_r($meuArray2);
		echo "<br/>";

		if(array_key_exists("Pos3", $meuArray2)){


			echo "Sim";

		}else{
			echo "Não";
		}

		$novaVar = array_keys($meuArray2);

		print_r($novaVar);

		//localização de elemento
		$chave= array_search("Ramon", $meuArray2);

		echo "<br/>";

		echo $chave;

		//Verificar se o elemento exixte

		$chave= in_array("Ramon", $meuArray2);

			if($chave){

				echo "Sim";
			}else{
				echo "Nao";
			}
			echo "<br/>";
			//ordenar Array
			sort($meuArray2);

			print_r($meuArray2); 

			//separar string e colocar no Array

			$str=" pos1=ramon&pos2=php&pos3=softblue";

			parse_str($str, $meuArray2);

			print_r($meuArray2);

			//Separar cada palavra e colocar em um array

		$st2r= " uma frase com palavras separadas";

			$meuArray3= explode(" ", $str2);

			print_r($meuArray3);

			//pegar varios elementos de um array e transformar em uma única frase

			$novaString = implode(" ", $str2);

			echo $novaString;

		?>

	</body>
	</html>