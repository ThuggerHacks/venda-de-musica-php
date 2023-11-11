<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");


 $query = "DELETE FROM funcionario WHERE id=?";

$motor = $con->prepare($query);
$motor->execute([
    $_REQUEST['id']
]);



header("location:funcionarios.php");