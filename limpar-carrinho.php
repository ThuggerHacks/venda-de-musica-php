<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");


 if(isset($_REQUEST['id'])){
    $sql = "DELETE FROM carrinho WHERE user_id=?";
    $motor = $con->prepare($sql);
    $motor->execute([
        $_SESSION['idUser']
    ]); 
     
    header("location:carrinho.php");
   
}


