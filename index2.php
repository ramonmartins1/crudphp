<DOCTYPE html>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		
		<?PHP

			
			echo "Texto"."<br/>";
			print ("Texto no print");


			$str= "Ramon MaRtins Rodrigues";

			$x = strlen($str);

			echo "Meu nome é: &nbsp".$str."<br/>E tem o tamanho de: &nbsp".$x."&nbspCaracteres<br/>";

			$y= strpos($str, "R");
 
			while ($y !== false) {
				echo $y." - ";

				$y= strpos($str, "R", $y+1 );
			}

			echo $y."<br/>";


			$z = strchr($str, "MaR");

			echo $z;

			$str2 = "ramon123uni@gmail.com";

			$x= 










































		?>



	</body>
	</html>