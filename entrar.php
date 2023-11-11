<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <title>Musica-Login</title>
</head>
<body>
    <div class="parent">
        <div class="login-container">
            <h3>LOGIN</h3>
            <form class="login-form" method="post">
                <center>
                    <small style="color:red">
                        <?php
                        if(isset($_REQUEST['enviar'])){
                            session_start();

                            require_once("conexao.php");

                            $nome = isset($_REQUEST['nome'])?$_REQUEST['nome']:"";
                            $senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:"";

                            if(trim($nome) == "" || trim($senha) == ""){
                                echo "Por favor preencha todos os campos";
                            }else{
                                $sql = "SELECT * FROM user WHERE nome = ?  AND senha = ?";
                                $motor = $con->prepare($sql);
                                $motor->execute([
                                    $nome,
                                    md5($senha)
                                ]);

                                foreach($motor as $linha1):
                                $_SESSION['idUser'] = $linha1['id'];
                
                                if($motor->rowCount()>0){
                                    $_SESSION['nome'] = $nome;
            
                                    header("location:home.php");
                                }else{
                                    echo "Conta n&atilde;o existe";
                                }
                                endforeach;
                            }

                        }
                        ?>
                    </small>
                </center>
                <input type="text" placeholder="Seu nome" id="name" name="nome" size=10/> <br>
                <input type="password" placeholder="Sua senha" id="pass" name="senha" size=10/>
                <div style="display:flex;align-items:center">
                        <input type="checkbox" name="policy" id="policy" required>
                            <label for="policy" style="color:#fff">Concorde com os nossos <a href="termos.php" target="_blank">termos e politicas de Privacidade</a>?</label>
                        </div>
                <input type="submit" value="Entrar" name="enviar" id="btnEnter">
                       
                <a href="signin.php"><input type="button" class="btnReg" value="Registar"></a>
                
            </form>
        </div>
    </div>
</body>
</html>