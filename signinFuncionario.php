<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <title>Musica-Cadastro</title>
</head>
<body>
    <div class="parent">
        <div class="login-container">
            <h3>CADASTRO DE FUNCIONARIO</h3>
            <center><small style="color:red">

            <?php
                require_once("conexao.php");
                
                if(isset($_REQUEST['env'])){
                    $nome = isset($_REQUEST['nome'])?$_REQUEST['nome']:"";
                    $licenca = isset($_REQUEST['licenca'])?$_REQUEST['licenca']:"";
                    $seccao = isset($_REQUEST['seccao'])?$_REQUEST['seccao']:"";

                    if(trim($nome)=="" || trim($licenca)=="" || trim($seccao)==""){
                        echo "Por favor preencha todos os campos";
                    }else{

                        $sql = "SELECT*FROM funcionario WHERE nome = ? AND seccao = ?  AND licenca = ? ";
                        $motor = $con->prepare($sql);
                        $motor->execute([
                            $nome,
                            $seccao,
                            $licenca
                        ]);

                        if($motor->rowCount()>0){
                            echo "Ja existe um trabalhador com esses dados!";
                        }else{
                            $motor1 = $con->prepare("INSERT INTO funcionario (nome,licenca,seccao) VALUES(?,?,?)");
                            $motor1->execute([
                                $nome,
                                $licenca,
                                $seccao
                            ]);

                            echo "<span style='color:green'>Registado com sucesso</span>";
                        }
                    
                    }
                }
            ?>
            </small></center>
            <form class="login-form" method="post">
            <input type="text" placeholder="Nome" name="nome" size=10  required/><br>
            <input type="text" placeholder="Li&ccedil;enca" name="licenca" size=10 required/><br>
            <input type="text" placeholder="Seccao" name="seccao" size=10 required/><br>
            <input type="submit" name="env" value="Registar" id="inputFunc">
            </form>
        </div>
    </div>
</body>
</html>
