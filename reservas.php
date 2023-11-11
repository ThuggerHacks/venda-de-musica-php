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
    <title>Musica-Reservas</title>
</head>
<body>
    <?php
        session_start();
        ob_start();
        include_once("config.php");
        include_once("conexao.php");
        include_once("nav.include.php");
    ?>
   

    <!---------------Reservas---------------->
    <section id="carrinho">
       
        <h3>Todas Compras</h3>
        <?php
            $sql = "select venda.*,projecto.*,user.* from venda, projecto,user WHERE venda.project_id = projecto.id AND venda.user_id = user.id";

            $motor = $con->prepare($sql);
            $motor->execute();
        ?>  
        <div class="carrinho"><!----------card-1 start-->
            <table>
                <tr>
                    <th>Artista(s)</th>
                    <th>Tipo</th>
                    <th>Titulo do Arquivo</th>
                    <!-- <th>Genero</th> -->
                    <th>Pre&ccedil;o pago</th>
                    <!-- <th>#</th> -->
                </tr>
                <?php 
                    foreach($motor as $linha):

                    ?>
                <tr>
                    <!-- <td><?=$linha['nome']?></td> -->
                    <td><?=$linha['artista']?></td>
                    <td><?=$linha['tipo']?></td>
                    <td><?=$linha['titulo']?></td>
                    <!-- <td><?=$linha['genero']?></td> -->
                    <td><?=$linha['preco']?>.00 MZN</td>
                    <!-- <td>
                       <a href="http://localhost/MUSIC1/amostra/<?=$linha["amostra"]?>" download="http://localhost/MUSIC1/amostra/<?=$linha["amostra"]?>">
                        <button>Baixar</button>
                    </a> -->
                    </td>
              
                </tr>
            <?php endforeach;?>
            </table>
        </div><!-------card-1 end-->
    </section>


    <br><br><br><br><br><br>
    <footer>
        <div class="footer-container">
        <em>Bragy</em> - &copy; <?php echo date("Y") ?>, todos os direitos reservados
        </div>
    </footer>
    <script src="js/navBar.js"></script>
    <script src="js/home.js"></script>
</body>
</html>