<?php
include "config.php";


if($_GET){
	$id = $_GET["id"];
	$exclui = mysqli_query($con,"DELETE FROM pedido where id='$id'");
	if($exclui){
		echo "PEDIDO EXCLUIDO COM SUCESSO!";	
	}
	else {echo "NAO FOI POSSÍVEL EXCLUIR"
	.": " . mysqli_error($con) . "\n";
	}
}


if($_POST){

$id_p = $_POST["id_produto"];
$id_c = $_POST["id_cliente"];

$novo = mysqli_query($con,"INSERT INTO pedido (id_produto, id_cliente) Values ($id_p,$id_c)");

	if($novo){
		echo "PEDIDO CADASTRADO COM SUCESSO!";	
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
<title>PEDIDOS</title>
<?php include("voltar.php"); ?>
<div class="container">
<h1>Gerenciamento de Pedidos</h1>


    <form action="pedidos.php" method="POST">
    <div class="container">
    <label>Nome do produto</label>
    	<select name="id_produto" class="form-control"/> 
        <?php
		$query_p = mysqli_query($con,"SELECT * FROM produto");
        while($produto = mysqli_fetch_assoc($query_p))
		{
		?>
        <option value="<?php echo $produto["id"]; ?>"> <?php echo $produto["Nome"]; ?></option>
        <?php } ?>
        </select>
        <label>Cliente</label>
        <select name="id_cliente" class="form-control"/>
        <?php
		$query_c = mysqli_query($con,"SELECT * FROM cliente");
        while($cliente = mysqli_fetch_assoc($query_c))
		{
		?>
        <option value="<?php echo $cliente["id"]; ?>"> <?php echo $cliente["nome"] ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="container">    
    <input type="submit" class="btn btn-info" value="Cadastrar novo Pedido" />
    </div>
    </form>
</div>
<div class="container">
<h2>LISTA DOS PEDIDOS</h2>
</div>
<div class="container col-md-12">
<table class="table">
	<tr>
	
    <td class="row row"><strong>Produto</strong></td>
    <td><strong>Cliente</strong></td>
    <td><strong>Preço</strong></td>
    <td><strong>Ação</strong></td>
    
    </tr>
    
    <?php
	
	?>
    </p>
    <?php
	$query = mysqli_query($con,"Select pedido.id as PEid, pedido.id_produto as PEip, pedido.id_cliente as PEic, p.Nome as Pnome, c.nome as Cnome, p.Preco as Ppreco from pedido INNER JOIN produto as p, cliente as c Where pedido.id_produto=p.id AND pedido.id_cliente=c.id");
	while($pedidos = mysqli_fetch_assoc($query))
	{
	?>
    <tr>
    <td><?php echo $pedidos["Pnome"] ?> </td>
    <td><?php echo $pedidos["Cnome"] ?></td>
    <td><?php echo $pedidos["Ppreco"] ?></td>
    <td><a href="alterar_pedido.php?ip=<?php echo $pedidos["PEip"];?>&ic=<?php echo $pedidos["PEic"];?>&id=<?php echo $pedidos["PEid"];?>">Alterar</a> / <a href="pedidos.php?id=<?php echo $pedidos["PEid"];?>">Excluir</a></td>
    </tr>
    <?php } ?>
    </table>
</div>
    
    



</body>
</html>