<?php
include "config.php";

if($_GET){
	$id = $_GET["id"];

$query = mysqli_query($con,"SELECT * FROM cliente Where id = $id ");

$cliente = mysqli_fetch_assoc($query);
$nome = $cliente["nome"];
$email = $cliente["email"];
$telefone = $cliente["telefone"];
}

if($_POST){
$id = $_POST["id"]; 
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$novo = mysqli_query($con,"UPDATE cliente SET nome = '$nome', email= '$email', telefone='$telefone' Where id='$id'");

	if($novo){
		echo "DADOS ATUALIZADOS COM SUCESSO!";	
	}
	else {echo "ERRO NA ATUALIZAÇÃO"
	.": " . mysqli_error($con) . "\n";
	}
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style/css/bootstrap.min.css"/>
</head>

<body>
<title>Clientes</title>
<?php include("voltar.php"); ?>
<div class="container">
<h1>Alterar dados do cliente</h1>
</div>
<div class="container">
    <form action="alterar.php" method="POST">
    <div class="container">
            <input type="hidden" name="id" value="<?php echo $id;?>" />
            <label>Nome<input name="nome" class="form-control" type="text"/ value= "<?php echo $nome?> "></label>
            <label>E-mail<input name="email" class="form-control" type="text" value="<?php echo $email?> "/></label>
            <label>Telefone<input name="telefone" class="form-control" type="text" value="<?php echo $telefone?> "/></label>
            </div>
            <div class="container">
            <input type="submit" class="btn btn-info" value="Alterar dados" />
    </div>
    </form>
</div>



    
    </tr>
    
    
    



</body>
</html>