<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");


 $query = "SELECT * FROM pedidosValidados WHERE user_id = ? AND project_id = ? AND quantidade = ? AND tipo = ?";

$motor = $con->prepare($query);
$motor->execute([
    $_REQUEST['idU'],
    $_REQUEST['id'],
    $_REQUEST['qty'],
    $_REQUEST['Formato'] 
]);

if($motor->rowCount() > 0){
    echo "Este pedido ja foi Aceite";
    exit;
}else {
$sql = "INSERT INTO pedidosValidados (user_id,project_id,quantidade,tipo) values(?,?,?,?)";
$motor = $con->prepare($sql);
$motor->execute(array(
    $_REQUEST['idU'],
    $_REQUEST['id'],
    $_REQUEST['qty'],
    $_REQUEST['Formato'] 
));}





header("location:reservas.php");