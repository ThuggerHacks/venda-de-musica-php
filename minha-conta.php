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

        if($_REQUEST['id']){
            $sql = "DELETE FROM venda WHERE id=?";
                $motor = $con->prepare($sql);
                $motor->execute([
                    $_REQUEST['id']
                ]); 
                header("location:minha-conta.php");
        }
    ?>
   

    <!---------------Reservas---------------->
    <section id="carrinho">
       
        <h3>Minhas Compras</h3>
        <?php
            $sql = "select venda.*,projecto.genero,projecto.titulo,projecto.preco,projecto.tipo,projecto.artista,projecto.amostra from venda, projecto WHERE venda.project_id = projecto.id AND venda.user_id = ?";

            $motor = $con->prepare($sql);
            $motor->execute([$_SESSION['idUser']]);
        ?>  
        <div class="carrinho"><!----------card-1 start-->
            <table>
                <tr>
                    <th>Artista(s)</th>
                    <th>Tipo</th>
                    <th>Titulo do Arquivo</th>
                    <th>Genero</th>
                    <th>Pre&ccedil;o pago</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
                <?php 
                    foreach($motor as $linha):

                    ?>
                <tr>
                    <!-- <?=$linha['Nome do cliente']?></td> -->
                    <td><?=$linha['artista']?></td>
                    <td><?=$linha['tipo']?></td>
                    <td><?=$linha['titulo']?></td>
                    <td><?=$linha['genero']?></td>
                    <td><?=$linha['preco']?>.00 MZN</td>
                    <td>
                       <a href="http://localhost/MUSIC1/amostra/<?=$linha["amostra"]?>" download="http://localhost/MUSIC1/amostra/<?=$linha["amostra"]?>">
                        <button>Baixar</button>
                    </a>
                    <td>
                       <a  href="minha-conta.php?id=<?=$linha["id"]?>">
                        <button style="background-color: red !important;">Remover</button>
                        </a>
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