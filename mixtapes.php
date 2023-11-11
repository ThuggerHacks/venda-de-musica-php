<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" href="css/navBar.css">
    <title>Bragy-Mixtapes</title>
</head>
<body>
    <?php
        session_start();
        ob_start();
        include_once("config.php");
        include_once("conexao.php");
        include_once("nav.include.php");
    ?>
   

   
    <!-------------fita-videos-->

     <section id="fitaVideo">
        <h3>MIXTAPES</h3>
        <?php
            $sql = "SELECT * FROM projecto WHERE tipo = ?";
            $motor = $con->prepare($sql);
            $motor->execute([
                "Mixtape"
            ]);

            foreach($motor as $linha):
                
        ?>
        <div class="card"><!----------card-1 start-->
            <div class="card-header">
                <img src="files/<?=$linha['capa']?>"/>
            </div>
            <div class="card-body">
                <strong>Artista(s): </strong> <span><?=$linha['artista']?></span><br>
                <strong>Titulo: </strong> <span><?=$linha['titulo']?></span><br>
                <strong>Lan&ccedil;amento: </strong> <span><?=$linha['ano_lancamento']?></span><br>
                <strong>G&ecirc;nero: </strong> <span><?=$linha['genero']?></span><br>
                <strong>Videos contidos: </strong> <span><?=$linha['num_faixa']?></span><br>
                <strong>Dura&ccedil;&atilde;o: </strong> <span><?=$linha['duracao']?> Minuto(s)</span><br>
                <strong>Formato: </strong> <span><?=$linha['modo_gravacao']?></span><br>
                <strong>Pre&ccedil;o: </strong> <span><?=$linha['preco']?>.00 MZN</span>
                <!-- <strong>Unidades:</strong> <span><?=$linha['quantidade']?> Disponiveis</span> -->
            </div>
            <div class="card-footer">
            <table>
            <tr>    
                <?php if(isset($_SESSION['nome']) && ($_SESSION['nome'] == ADM)){?> 
                    <td>
                    <a href="<?='editar.php?id='.$linha['id']?>"><button class='btn-ven'>Editar</button></a>
                    </td>
                    <td>
                    <a href='<?='apagar.php?id='.$linha['id'] ?>'><button class='btn-del'>Apagar</button></a>
                    </td>
                    <?php }else{ ?>
                    <!-- <td>
                    <a href="amostra/<?=$linha['amostra']?>" download><button>Baixar</button></a>
                    </td> -->
                    <?php if(isset($_SESSION['idUser'])){ ?>
                    <td>
                    <a href="<?='adicionar-carrinho.php?id='.$linha['id']?>"><button id="btnCarinho"><img src="icones/add2.png"></button></a>
                    </td>
                    <?php } else{ ?>  
                    <td>
                    <a href="entrar.php"><button id="btnCarinho"><img src="icones/add2.png"></button></a>
                    <?php
                            }} ?>
                    </td>   
                    
                </tr>
                </table>
               
            </div>
        </div><!-------card-1 end-->
        <?php
            endforeach;
        ?>

    </section>

    

    <br><br><br><br><br><br><br><footer>
        <div class="footer-container">
        <em>Bragy</em> - &copy; <?php echo date("Y") ?>, todos os direitos reservados
        </div>
    </footer>
    <script src="js/home.js"></script>
    <script src="js/navBar.js"></script>
</body>
</html>

