<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" href="css/navBar.css">   
    <title>Musica-Contacto</title>
</head>
<body>
    <?php
        session_start();
        ob_start();
        include_once("config.php");
        include_once("conexao.php");
        include_once("nav.include.php");
    ?>

    
    <section id="contacto" >
        <h3>Informa&ccedil;&atilde;o</h3><BR>
         <div class='info' style="color:#000 !important;width:800px !important">
             <strong style="color:#000 !important">Email: </strong><span>info@bragy.co.mz</span><br>
             <strong style="color:#000 !important">Contacto: </strong><span>
                <a href="tel:+258855977938" style="border:none;color:#000">+258 85 597 7938</a> /  <a href="tel:+258844722749" style="border:none;color:#000">+258 84 472 2749</a>
             </span><br>
             <strong style="color:#000 !important">Localiza&ccedil;&atilde;o: </strong><span>Beira, Matacuane</span><br>
             <strong style="color:#000 !important">Horarios: </strong><span>Segunda a sexta, das 8:00 as 17:30 horas</span><br>
             <a href='mailto:<?= ADMEMAIL ?>' style="color:#000">Sugest&otilde;es ou Reclama&ccedil;&otilde;es</a>
         </div>

    </section>

    <br><br><br> <br><br><br>
    <footer>
        <div class="footer-container">
            <em>Bragy</em> - &copy; <?php echo date("Y") ?>, todos os direitos reservados
        </div>
    </footer>
    <script src="js/home.js"></script>
    <script src="js/navBar.js"></script>
</body>
</html>




