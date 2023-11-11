<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" href="css/navBar.css">
    <link rel="stylesheet" href="css/carrinho.css">
    <title>Musica-Carrinho</title>
</head>
<body>
    <?php
        session_start();
        ob_start();
        include_once("config.php");
        include_once("conexao.php");
        include_once("nav.include.php");
    ?>
   

    <!---------------FUNCIONARIOS---------------->
    <section id="carrinho">
       
        <h3>Gerenciador de Funcionarios</h3>
        <?php
            $total = 0;
            $sql = "SELECT*FROM funcionario;"; 

    
            $motor = $con->prepare($sql);
            $motor->execute();
        ?>  
        <div class="carrinho"><!----------card-1 start-->
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Licenca</th>
                    <th>Sec&ccedil;&atilde;o</th>
                </tr>
                <?php 
                      
                    foreach($motor as $linha):
                    ?>
                <tr>
                    <td><?=$linha['nome']?></td>
                    <td><?=$linha['licenca']?></td>
                    <td><?=$linha['seccao']?>
                    <a href='<?='excluir-funcionario.php?id='.$linha['id']?>'><button class='removeF'>Remover</button></a>
                    </td>
                </tr>
            <?php
                 endforeach;?>
            </table>
            <a href="<?='signinFuncionario.php' ?>"><button id="btCad">Cadastrar</button></a>
        </div><!-------card-1 end-->
    </section>


    <br><br><br><br><br><br>
    <footer>
        <div class="footer-container">
        <em>Musica</em> - &copy; <?php echo date("Y") ?>, todos os direitos reservados
        </div>
    </footer>
    <script src="js/navBar.js"></script>
    <script src="js/home.js"></script>

</body>
</html>