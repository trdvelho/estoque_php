<?php
include "config.php";
$nomep="";
$nomec="";

if($_GET){
	$id = $_GET["id"];
	$ip = $_GET["ip"];
	$ic = $_GET["ic"];

$query_p = mysqli_query($con,"Select Nome from produto where id = $ip");

$query_c = mysqli_query($con,"Select nome from cliente where id = $ic");
$produto = mysqli_fetch_assoc($query_p);
$nomep = $produto["Nome"];

$cliente = mysqli_fetch_assoc($query_c);
$nomec = $cliente["nome"]; 
//echo "O produto atual desse pedido é: ". $produto["Nome"].
    //" O Cliente desse pedido é: ". $nomec;
}

if($_POST){
$id = $_POST["id"]; 
$id_produto = $_POST["id_produto"];
$id_cliente = $_POST["id_cliente"];

$novo = mysqli_query($con,"UPDATE pedido SET id_produto = '$id_produto', id_cliente= '$id_cliente' Where id='$id'");

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
<title>Alterar Pedidos</title>
<?php include("voltar.php"); ?>
<div class="container">
<h1>Modificar Pedido</h1>
</div>

<?php
if($_GET){
?>
<div class=container>
	
    <form action="alterar_pedido.php" method="POST">
    	<div class=container>
        </p>
        
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        
        <label>Nome do produto</label>
            <select class="form-control" name="id_produto"/>
            
            <option selected="selected" value="<?php echo $ip; ?>"> <?php echo $nomep; ?></option>
            <?php
            $query_p = mysqli_query($con,"SELECT * FROM produto");
            while($produto = mysqli_fetch_assoc($query_p))
            {
            ?>
            <option value="<?php echo $produto["id"]; ?>"> <?php echo $produto["Nome"]; ?></option>
            <?php } ?>
            </select>
            <label>Cliente</label>
            <select class="form-control" name="id_cliente"/>
            <option selected="selected" value="<?php echo $ic; ?>"> <?php echo $nomec; ?></option>
            <?php
            $query_c = mysqli_query($con,"SELECT * FROM cliente");
            while($cliente = mysqli_fetch_assoc($query_c))
            {
            ?>
            <option value="<?php echo $cliente["id"]; ?>"> <?php echo $cliente["nome"]; ?></option>
            <?php } ?>
            </select>
        </div>
        <p>
        <div class=container>
        	<input type="submit" class="btn btn-info" value="Alterar dados" />
        </div>
   	
    </form>
</div>    
 
<?php }

else{
	echo "Sem dados para atualizar! Favor ir até a página de <a href=\"pedidos.php\">Gerenciamento de pedidos</a>!";
}
?>
    
    
    



</body>
</html>