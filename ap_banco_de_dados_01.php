<!DOCTYPE html>


<?PHP
	
	$erro = null;
	$valido = false;

	//variavel de requisição

	if(isset($_REQUEST['validar'])&& $_REQUEST['validar'] == true){

		if(strlen($_POST['nome']) <5){

			$erro= "Preencha o nome corretamente";

		}else if (strlen($_POST['email']) <5){

			$erro = "Preencha o e-mail corretamente";

		}else if (!is_numeric($_POST['idade'])){

			$erro = "Preencha a idade corretamente";

		}else if ($_POST['sexo'] != "M" && $_POST['sexo'] != "F" ){

			$erro = "Preencha o sexo corretamente";
		}else if ($_POST['estadocivil'] != "Solteiro" &&
				  $_POST['estadocivil'] != "casado" &&
				  $_POST['estadocivil'] != "divorciado" &&
				  $_POST['estadocivil'] != "viuvo" &&
				  $_POST['estadocivil'] != "juntado"										) {
			
			$erro = "Preencha o Estado Civil corretamente";
		}else{

			$valido = true;

			//Valores booleanos para checkBox
			$checkHumanas = isset($_POST['humanas']) ?1 : 0;
			$checExatas = isset($_POST['exatas']) ?1 : 0;
			$checkBiologicas = isset($_POST['biologicas']) ?1 : 0;
				
			$sql = "INSERT INTO USUARIOS (NOME, EMAIL, IDADE, SEXO, ESTADO_CIVIL, HUMANAS, EXATAS, BIOLOGICAS, SENHA) VALUES (";

			$sql .="'".$_POST["nome"]. "',";
			$sql .="'".$_POST["email"]. "',";
			$sql .="'".$_POST["idade"]. "',";
			$sql .="'".$_POST["sexo"]. "',";
			$sql .="'".$_POST["estadocivil"]. "',";
			$sql .="'".$checkHumanas. "',";
			$sql .="'".$checExatas. "',";
			$sql .="'".$checkBiologicas. "',";
			$sql .="'".md5($_POST["senha"]). "' ";
			$sql .= ")";

			$conector = mysql_connect("localhost", "root", "");

			mysql_select_db("cursophp", $conector);

			mysql_query($sql, $conector);

			mysql_close($conector);




		}



	}


?>


	<html>
	<head>
		<title>Validação de dados do Formulario</title>
	</head>
	<script language="JavaScript">
		function validarFormulario(){

			if(document.forms['registro'].nome.value==""){

				alert('Preencha corretamente o nome');

				return;
			}else if(document.forms['registro'].email.value==""){

				alert('Preencha corretamente o email');
				return;
			}else if (document.forms['registro'].idade.value==""){

				alert('Preencha corretamente a idade');
				return;
			}else if (document.forms['registro'].estadocivil.
				//0 é a primeira opção
				selectedIndex==0) {
				alert('Selecione o Estado Civil');
				return;

			}else if(document.forms['registro'].senha.value==" "){

				alert('Preencha corretamente a senha');
				return;	
			}else{
				document.forms['registro'].submit();
			}

}
	</script>
	<body>

		<?PHP

		if(!$valido){

			if(isset($erro)){

			echo  $erro. "!<BR> <BR>";

		}
	
		?>

		<form method="POST" name = "registro" action="?validar=true" onSubmit="validarFormulario(); return false;">
			
			Nome: <input type="text" name="nome"

			<?PHP
				if (isset($_POST['nome'])) {
					echo "value='".$_POST['nome']."'";
				}

			?>
			><BR>
			E-mail: <input type="text" name="email"

			<?PHP
				if (isset($_POST['email'])) {
					echo "value='".$_POST['email']."'";
				}

			?>
			><BR>
			Idade: <input type="text" name="idade"

			<?PHP
				if (isset($_POST['idade'])) {
					echo "value='".$_POST['idade']."'";
				}

			?>


			><BR>
			Sexo <input type="radio" name="sexo" value="M"
			<?PHP
				if (isset($_POST['sexo']) && $_POST['sexo'] == "M" || !isset($_POST['sexo'])) {
					echo "checked";
				}

			?>
			>Masculino<BR>
				 <input type="radio" name="sexo" value="F"

				 <?PHP
				if (isset($_POST['sexo']) && $_POST['sexo'] == "F" ) {
					echo "checked";
				}

			?>

				 >Feminino<BR>
			Interesses: <BR><input type="checkbox" name="humanas"

				<?PHP

					if (isset($_POST['humanas'])) {
						echo "checked";
					}

				?>


			>Ciencias Humanas <BR>
			 <input type="checkbox" name="biologicas"

				<?PHP

					if (isset($_POST['biologicas'])) {
						echo "checked";
					}

				?>


			 >Ciencias Biologicas<BR>
			 <input type="checkbox" name="exatas"
			 <?PHP

					if (isset($_POST['exatas'])) {
						echo "checked";
					}

				?>




			 >Ciencias Exatas<BR>
			 Estado Civil:
			 <select name="estadocivil"><BR>
			 	<option>Selecione</option>
			 	<option
			 	<?PHP
			 	if (isset($_POST['estadocivil']) && $_POST['estadocivil'] == "Solteiro" )  {
			 		echo " selected";
			 	}

			 	?>


			 	>Solteiro</option>
				<option
				<?PHP
				if (isset($_POST['estadocivil']) && $_POST['estadocivil'] == "casado" )  {
			 		echo " selected";
			 	}

			 	?>


				>casado</option>
				<option

				<?PHP
				if (isset($_POST['estadocivil']) && $_POST['estadocivil'] == "divorciado" )  {
			 		echo " selected";
			 	}

			 	?>



				>divorciado</option>
				<option

				<?PHP
				if (isset($_POST['estadocivil']) && $_POST['estadocivil'] == "viuvo" )  {
			 		echo " selected";
			 	}

			 	?>


				>viuvo/</option>
				<option

				<?PHP
				if (isset($_POST['estadocivil']) && $_POST['estadocivil'] == "juntado" )  {
			 		echo " selected";
			 	}

			 	?>


				>juntado</option>

			 </select><BR>
			  Senha:
			  <input type="password" name="senha" >
			  <input type="submit" name="submeterdados" value="Enviar">
		</form>
		<?PHP

}else{

		echo "Dados Cadastrados com sucesso";
}

		?>
	</body>
	</html>