<?php
include "config.php";

$query = mysqli_query($con,"SELECT * FROM cliente");
$qtade = mysqli_num_rows($query);

if($_GET){
	$id = $_GET["id"];
	$exclui = mysqli_query($con,"DELETE FROM cliente where id='$id'");
	if($exclui){
		echo "CLIENTE EXCLUIDO COM SUCESSO!";	
	}
	else {echo "NAO FOI POSSÍVEL EXCLUIR"
	.": " . mysqli_error($con) . "\n";
	}
}

if($_POST){

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$novo = mysqli_query($con,"INSERT INTO cliente (nome, email, telefone) Values ('$nome','$email','$telefone')");

	if($novo){
		echo "CLIENTE CADASTRADO COM SUCESSO!";	
	}
	else {echo "Erro no cadastro"
	.": " . mysqli_error($con) . "\n";
	}
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style/css/grid.css"/>
   
</head>

<body>
<title>Clientes</title>
<?php include("voltar.php"); ?>
<div class="container">

<h1>Gerenciamento de Clientes</h1>
    <form action="clientes.php" method="POST">
    <label>Nome<input name="nome" class="form-control" type="text"/>
    <label>E-mail<input name="email" class="form-control" type="text"/>
    <label>Telefone<input name="telefone" class="form-control" type="text"/>
    </div>
    <div class="container">
    <input type="submit" class="btn btn-info" value="Cadastrar cliente" />
    </div>
    </form>
</div>
<div class="container">
<h1>Lista dos Clientes!</h1>
</div>
<div class="container col-md-12">
<table class="table">
	<tr>
	<td class="row row"><strong>Id</strong></td>
    <td><strong>Nome</strong></td>
    <td><strong>Email</strong></td>
    <td><strong>Telefone</strong></td>
    <td><strong>Ação</strong></td>
    
    </tr>
    
    <?php
	echo "Total de clientes encontrados:". $qtade;?>
	</p>
    <?php
	while($cliente = mysqli_fetch_assoc($query))
	{
	?>
    <tr>
    <td><?php echo $cliente["id"] ?> </td>
    <td><?php echo $cliente["nome"] ?></td>
    <td><?php echo $cliente["email"] ?></td>
    <td><?php echo $cliente["telefone"] ?></td>
    <td><a href="alterar.php?id=<?php echo $cliente["id"];?>">Alterar</a> / <a href="clientes.php?id=<?php echo $cliente["id"];?>">Excluir</a></td>
    
    </tr>
    <?php } ?>
    </table>
    </div>
    
    



</body>
</html>