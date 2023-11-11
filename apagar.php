<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");


 if(isset($_REQUEST['id'])){

    $sql = "DELETE FROM projecto WHERE id=?";
    $motor = $con->prepare($sql);
    $motor->execute([
        $_REQUEST['id']
    ]); 
   
    $sql = "DELETE FROM carrinho WHERE project_id=?";
    $motor = $con->prepare($sql);
    $motor->execute([
        $_REQUEST['id']
    ]); 
     
    header("location:index.php");
   
}


