<?php
$con = mysqli_connect("localhost","root","");

if(!$con){die("Erro conexão");}

$db = mysqli_select_db($con,"estoquephp");

if(!$db){die("Banco não encontrado");}


?>