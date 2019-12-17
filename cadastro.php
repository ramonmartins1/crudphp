<!DOCTYPE html>

<html>
<head>
<title>CRUD COM PHP</title>
</head>
<body>
<form action = "<?php= $_SERVER ["PHP_SELF"]?>" method = "POST">
Nome: <br/>
<input type="text" name ="nome" placeholder = "Qual o seu nome?"><br/><br/>
E-mail: <br/>
<input type="text" name ="email" placeholder = "Qual o seu email?"><br/><br/>
Cidade: <br/>
<input type="text" name ="cidade" placeholder = "Qual a sua cidade?"><br/><br/>
UF: <br/>
<input type="text" name ="uf" placeholder = "Qual o seu estado?"><br/><br/>
<input type = "hidden" value="-1" name="id">
<button type="submit">Cadastrar</button>
</form>
<br>
<br>

<table width="400px" border = "0" cellspacing = "0">
<tr>
	<td><strong>#</strong></td>
	<td><strong>Nome</strong></td>
	<td><strong>Email</strong></td>
	<td><strong>Cidade</strong></td>
	<td><strong>UF</strong></td>
	<td><strong>#</strong></td>
	</tr>
<?PHP
$result = $obj_msqli->query("SELECT * FROM 'cliente'");
while ($aux_query = $result->fetch_assoc()){
	echo '<tr>';
	echo ' <td>' . $aux_query['id'] . '</td>';
	echo ' <td>' . $aux_query['nome'] . '</td>';
	echo ' <td>' . $aux_query['email'] . '</td>';
	echo ' <td>' . $aux_query['cidade'] . '</td>';
	echo ' <td>' . $aux_query['uf'] . '</td>';
	echo ' <td> <a href="' . $_SERVER['PHP_SELF']. '?id=' .aux_query['id']. '"> Editar</a></td>';
	echo ' <td> <a href="' . $_SERVER['PHP_SELF']. '?id=' .aux_query['id']. '$del=true"> Excluir</a></td>';
}
?>
</table>






</body>
<?PHP
$obj_msqli = new msqli("localhost", "host", "", "tutocrudphp");

if(($obj_msqli->connect_erro)){
	echo "Erro ao conectar";
	exit;
}

mysqli_set_charset($obj_msqli, 'utf8'); //conexao no formato utf8

if(isset($_POST["nome"])&& isset($_POST["email"])isset($_POST["cidade"])isset($_POST["uf"])){

if(empty($_POST["nome"])){
$erro = "campo nome obrigatorio";
}else if (empty($_POST["email"])){
	$erro = "Campo e-mail obrigatorio";
}else{
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	
	$stmt = $obj_mysqli->prepare("INSERT INTO 'client'('nome','email','cidade','uf') VALUES(?,?,?,?)");
	$stmt->bind_para('ssss', $nome, $email, $cidade, $uf);
	
	if(!$stmt->execute()){
	
		$erro = $stmt->error;
	}else{
		$sucesso = "Dados cadastrados com sucesso!";
	}
}

}
/*Editar*/

$obj_msqli = new msqli("localhost", "host", "", "tutocrudphp");

if(($obj_msqli->connect_erro)){
	echo "Erro ao conectar";
	exit;
}

mysqli_set_charset($obj_msqli, 'utf8'); //conexao no formato utf8
$id = -1;
$nome = "";
$email= "";
$cidade= "";
$uf = "";

if(isset($_POST["nome"])&& isset($_POST["email"])isset($_POST["cidade"])isset($_POST["uf"])){

if(empty($_POST["nome"])){
$erro = "campo nome obrigatorio";
}else if (empty($_POST["email"])){
	$erro = "Campo e-mail obrigatorio";
}else{
	$id=-1;
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	
	if($id==-1){
		$stmt = $obj_mysqli->prepare("UPDATE 'cliente' SET 'nome' =?, 'email' =?,'cidade'=?, 'uf'=? WHERE id =?");
		$stmt->bind_param('ssssi', $nome, $email, $cidade, $uf, $id);
		if(!$stmt->execute()){
			$erro = $stmt->error;
		}
		else{
			header ("location:cadastro.php");
			exit;
		}
	}else{
		$erro="Número inválido";
	}
	}
}else if(isset($_GET['id']) && is_numeric($_GET["id"])){
	$id = (int)$_GET['id'];
	$stmt = $obj_msqli->prepare("SELECT * FROM 'cliente' WHERE id =?");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	
	$result= $stmt->get_result();
	$aux_query = $result->fetch_assoc():

	$nome = $aux_query['nome'];
	$email = $aux_query['email'];
	$cidade = $aux_query['cidade'];
	$uf = $aux_query['uf'];
	
	$stmt->close();

}
?>
<!D0CTYPE html>

<html>
<head>
<title>CRUD COM PHP</title>
</head>
<body>
<form action = "<?php= $_SERVER ["PHP_SELF"]?>" method = "POST">
Nome: <br/>
<input type="text" name ="nome" placeholder = "Qual o seu nome?"><br/><br/>
E-mail: <br/>
<input type="text" name ="email" placeholder = "Qual o seu email?"><br/><br/>
Cidade: <br/>
<input type="text" name ="cidade" placeholder = "Qual a sua cidade?"><br/><br/>
UF: <br/>
<input type="text" name ="uf" placeholder = "Qual o seu estado?"><br/><br/>
<input type = "hidden" value="-1" name="id">
<button type="submit">Cadastrar</button>
</form>
<br>
<br>

<table width="400px" border = "0" cellspacing = "0">
<tr>
	<td><strong>#</strong></td>
	<td><strong>Nome</strong></td>
	<td><strong>Email</strong></td>
	<td><strong>Cidade</strong></td>
	<td><strong>UF</strong></td>
	<td><strong>#</strong></td>
	</tr>
<?PHP
$result = $obj_msqli->query("SELECT * FROM 'cliente'");
while ($aux_query = $result->fetch_assoc()){
	echo '<tr>';
	echo ' <td>' . $aux_query['id'] . '</td>';
	echo ' <td>' . $aux_query['nome'] . '</td>';
	echo ' <td>' . $aux_query['email'] . '</td>';
	echo ' <td>' . $aux_query['cidade'] . '</td>';
	echo ' <td>' . $aux_query['uf'] . '</td>';
	echo ' <td> <a href="' . $_SERVER['PHP_SELF']. '?id=' .$aux_query['id']. '"> Editar</a></td>';
}
?>
</table>


<?php
/*Excluir*/

if(isset($_GET['id']) && is_numeric($_GET["id"])){
	$id = (int)$_GET['id'];
	if(isset($_GET['del'])){
		$stmt=obj_mysqli - >prepare("DELETE FROM 'cliente' WHERE id = ?");
		$stmt->bind_param('i',$id);
		stmt->execute();
		
		header ("Location:cadastro.php");
		exite;
	
	
	
	}else
	$stmt = $obj_msqli->prepare("SELECT * FROM 'cliente' WHERE id =?");
	$stmt->bind_param('i',$id);
	$stmt->execute();
	
	$result= $stmt->get_result();
	$aux_query = $result->fetch_assoc():

	$nome = $aux_query['nome'];
	$email = $aux_query['email'];
	$cidade = $aux_query['cidade'];
	$uf = $aux_query['uf'];
	
	$stmt->close();

}


?>

</html>