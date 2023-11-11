<?php
 session_start();
 ob_start();
 include_once("config.php");
 include_once("conexao.php");

 if(isset($_REQUEST['id'])){

    $sql = "SELECT quantidade FROM carrinho WHERE project_id =?";
    $motor = $con->prepare($sql);
    $motor->execute([
        $_REQUEST['id']
    ]);

    $sql1 = "SELECT quantidade FROM projecto WHERE id =?";
    $motorr = $con->prepare($sql1);
    $motorr->execute([
        $_REQUEST['id']
    ]);

    foreach($motorr as $linha):
    $qty = $linha['quantidade'];
    
    if($qty>0){
    $sql ="UPDATE carrinho SET quantidade = quantidade+1  WHERE project_id =  ?";
    $motor = $con->prepare($sql);
    $motor->execute(array($_REQUEST['id']));

    $sql1 ="UPDATE projecto SET quantidade = quantidade-1  WHERE id = ?";
    $motor1 = $con->prepare($sql1);
    $motor1->execute(array($_REQUEST['id']));
    header("location:carrinho.php");

   }else if($qty==0){?>
     <script>alert("O Estoque do produto acabou na loja");</script>
     <?php  header("location:carrinho.php");
   }
endforeach;
}


