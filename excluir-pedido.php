<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");


 $query = "DELETE FROM pedidosValidados WHERE user_id=? AND project_id = ?";

$motor = $con->prepare($query);
$motor->execute([
    $_REQUEST['idU'],
    $_REQUEST['id']
]);


$sql = "DELETE FROM carrinho WHERE user_id=? AND project_id=?";
$motor = $con->prepare($sql);
$motor->execute(array(
    $_REQUEST['idU'],
    $_REQUEST['id']
));


header("location:reservas.php");