<?php
include "config.php";

$query = mysqli_query($con,"SELECT * FROM produto");
$qtade = mysqli_num_rows($query);

if($_GET){
	$id = $_GET["id"];
	$exclui = mysqli_query($con,"DELETE FROM produto where id='$id'");
	if($exclui){
		echo "<div class=\"container btn btn-primary\">PRODUTO EXCLUIDO COM SUCESSO!</div>";	
	}
	else {echo "NAO FOI POSSÍVEL EXCLUIR"
	.": " . mysqli_error($con) . "\n";
	}
}


if($_POST){

$preco = (float) $_POST["preco"];

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];

$novo = mysqli_query($con,"INSERT INTO produto (Nome, Descricao, Preco) Values ('$nome','$descricao',$preco)");

	if($novo){
		echo "<div class=\"btn btn-lg btn-success\">PRODUTO CADASTRADO COM SUCESSO!\")</div>";	
		
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
<title>PRODUTOS</title>
<?php include("voltar.php"); ?>
<div class="container">
    <h1>Gerenciamento de Produtos</h1>
    	<div class="container">
            <form action="produtos.php" method="POST">
            <label>Nome<input name="nome" class="form-control" type="text"/>
            <label>Descrição<input name="descricao" class="form-control" type="text"/>
            <label>Preço<input name="preco"  class="form-control" type="text"/>
         </div>
         <div class="container">
            <input type="submit" class="btn btn-info" value="Cadastrar novo produto" />
         </div>
            </form>
</div>
<div class="container">
<h2>Lista dos produtos!</h2>
</div>
<div class="container col-md-12">
<table class="table">

	<tr>
	<td class="row row"><strong>Id</strong></td>
    <td><strong>Nome</strong></td>
    <td><strong>Descrição</strong></td>
    <td><strong>Preço</strong></td>
    <td><strong>Ação</strong></td>
    
    
    </tr>
    
    <?php
	echo "Total de produtos encontrados: ". $qtade;
	?>
    </p>
    <?php
	
	while($produto = mysqli_fetch_assoc($query))
	{
	?>
    <tr>
    <td><?php echo $produto["id"] ?> </td>
    <td><?php echo $produto["Nome"] ?></td>
    <td><?php echo $produto["Descricao"] ?></td>
    <td><?php echo $produto["Preco"] ?></td>
    <td><a href="alterar_produto.php?id=<?php echo $produto["id"];?>">Alterar</a> / <a href="produtos.php?id=<?php echo $produto["id"];?>">Excluir</a></td>
    </tr>
    <?php } ?>
    
</table>
</div>
    



</body>
</html>