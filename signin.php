<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>

    <title>Musica-Signin</title>
</head>
<body>
    <div class="parent">
        <div class="login-container">
            <h3>CADASTRO USUARIO</h3>
            <center><small style="color:red">

            <?php
                require_once("conexao.php");
                
                if(isset($_REQUEST['env'])){
                    $nome = isset($_REQUEST['nome'])?$_REQUEST['nome']:"";
                    $senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:"";
                    $senha2 = isset($_REQUEST['senha2'])?$_REQUEST['senha2']:"";
                    $celular = isset($_REQUEST['celular'])?$_REQUEST['celular']:"";
                    $bi = isset($_REQUEST['bi'])?$_REQUEST['bi']:"";
                    $workplace = isset($_REQUEST['workplace'])?$_REQUEST['workplace']:"";
                    $data = isset($_REQUEST['data'])?$_REQUEST['data']:"";
                    $genero = isset($_REQUEST['genero'])?$_REQUEST['genero']:"";
                    $endereco = isset($_REQUEST['endereco'])?$_REQUEST['endereco']:"";

                    if(trim($nome)=="" || trim($senha)=="" || trim($senha2)=="" || trim($celular)=="" || trim($bi)=="" || trim($workplace)=="" || trim($data)=="" || trim($endereco)==""){
                        echo "Por favor preencha todos os campos";
                    }elseif($senha!=$senha2){
                        echo "As Senhas devem ser iguais";
                    }elseif($data>"2004-01-01"){
                        echo "Menor de Idade";
                    }else{

                        $sql = "SELECT*FROM user WHERE bi = ? OR celular = ?";
                        $motor = $con->prepare($sql);
                        $motor->execute([
                            $bi,
                            $celular
                        ]);

                        if($motor->rowCount()>0){
                            echo "Ja existe alguem com este numero de BI ou celular";
                        }else{
                            $motor1 = $con->prepare("INSERT INTO user (nome,celular,senha,data_nascimento,genero,endereco,workspace,bi) VALUES(?,?,?,?,?,?,?,?)");
                            $motor1->execute([
                                $nome,
                                $celular,
                                md5($senha),
                                $data,
                                $genero,
                                $endereco,
                                $workplace,
                                $bi
                            ]);

                            echo "<span style='color:green'>Registado com sucesso, fa&ccedil;a login</span>";
                        }
                    
                    }
                }
            ?>
            </small></center>
            <form class="login-form" method="post">
                <input type="text" placeholder="Seu nome" name="nome" required/><br>
                <input type="password" name="senha" placeholder="Sua senha" required/><br>
                <input type="password" name="senha2" placeholder="Confirmar sua senha"/><br>
                <formgroup>
                    <input type="number" name="celular" placeholder="Seu celular" pattern="[8]{1}[2|3|4|5|6|7]{1}[0-9]{7}" required title="O numero contem 9 digitos"/><br>
                    <input type="text" name="bi" placeholder="Numero de BI" pattern="[0-9]{12}[A-Z]{1}" required title="Siga o padrao: 123456789001B"/>
                </formgroup>
                <formgroup>
                    <input type="text" name="workplace" placeholder="Local de trabalho/estudo"/>
                    <input type="text" name="endereco" placeholder="Seu endereco" />
                </formgroup><br>
                <div>
                    <label for="data" id="data">Data de nascimento: </label>
                    <input type="date" name="data" id=""><br>
                    <fieldset id="fieldsetGenero">
                        <legend>Genero</legend>
                        <label for="masc">Masculino</label>
                        <input type="radio" name="genero" id="masc" checked>
                        <label for="fem">Femenino</label>
                        <input type="radio" name="genero" id="fem" >
                    </fieldset><br>
                    <input type="submit" name="env" value="Registar" id="inputReg">
                </div>
                <small>J&aacute; t&ecirc;m conta? <a href="entrar.php">Entrar</a></a></small>
            </form>
        </div>
    </div>
</body>
</html>
