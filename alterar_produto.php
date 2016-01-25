<?php
include "config.php";

if($_GET){
	$id = $_GET["id"];

$query = mysqli_query($con,"SELECT * FROM produto Where id = $id ");

$produto = mysqli_fetch_assoc($query);
$nome = $produto["Nome"];
$descricao = $produto["Descricao"];
$preco = (string) $produto["Preco"];
}

if($_POST){
$id = $_POST["id"]; 
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = (float) $_POST["preco"];

$novo = mysqli_query($con,"UPDATE produto SET Nome = '$nome', Descricao= '$descricao', Preco='$preco' Where id='$id'");

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
	<h1>Alterar dados do produto</h1>
</div>
<div class="container">
	<div class="container">
    <form action="alterar_produto.php" method="POST">
    <input type="hidden" name="id"  value="<?php echo $id;?>" />
    <label>Nome<input name="nome" class="form-control"type="text"/ value= "<?php echo $nome?> "/></label>
    <label>Descrição<input name="descricao" class="form-control" type="text" value="<?php echo $descricao?> "/></label>
    <label>Preço<input name="preco" class="form-control" type="text" value="<?php echo $preco?> "/></label>
    </div>
    <div class="container">
    <input type="submit" class="btn btn-info" value="Alterar dados" />
    </div>
    </form>
</div>



    
    



</body>
</html>