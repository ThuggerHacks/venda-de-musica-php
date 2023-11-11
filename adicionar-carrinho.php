<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");


 if(isset($_REQUEST['id'])){
    $query = "SELECT * FROM carrinho WHERE user_id = ? AND project_id = ?";
    $motor = $con->prepare($query);
    $motor->execute([
        $_SESSION['idUser'],
        $_REQUEST['id']
    ]);

    if($motor->rowCount() > 0){
        header("location:carrinho.php"); 

    }else{


        $sql = "INSERT INTO carrinho (user_id,project_id,quantidade) VALUES(?,?,?)";
        $motor = $con->prepare($sql);
        $motor->execute(array(
        $_SESSION['idUser'],
        $_REQUEST['id'],
        "1"
    ));

     header("location:carrinho.php");
   
}}


