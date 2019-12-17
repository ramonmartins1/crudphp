<DOCTYPE html>

<html>

<head>
	


</head>

<body>
	


<?php

	$soma=0;

	for ($i=50; $i<=100; $i++) { 
		
		if($i%2 == 0){
			

			$soma+=$i; //Soma recebe ela mais o numero $i

		}
		
		
	}


echo "A soma dos numeros pares de 50 ate 100 é : &nbsp".$soma."<br/>";



	function media($n1,$n2,$n3,$p){
		$res=0;
		

		if($p==3){

			$res= ($n1+$n2+$n3)/3;


		}else if($p==2){

			$res=($n1+$n2+$n3)/2;
		}else if($p==5){

			$res=($n1+$n2+$n3)/5;

		}else{

			echo "Nenhuma das respostas anteriores";

		}

		return $res;


	}

	$media = media(10,9,8,5);

	echo "Media é: &nbsp".$media."<br/>";


	function soma($n1,$n2){

		$soma=0;

		for($i=$n1;$i<=$n2;$i++){

			$soma+= $i;

		


		}
		return $soma;


	}

	$sum = soma(5,10);

	echo "Soma do intervalo de 5 ate 10 é:".$sum."<br/>";




	

?>





</body>




















</html>