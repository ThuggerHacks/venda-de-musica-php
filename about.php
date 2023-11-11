<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
    <link rel="stylesheet" href="css/navBar.css"> 
    <link rel="stylesheet" href="css/about.css">  
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

    
    <section id="contacto" class="colunas" >
        <h3>Sobre a Bragy</h3><BR>
        <section style="width: 175px; padding: 25px;">
    <h2>Quem Somos</h2>
    <p>Somos a Bragy, uma plataforma de venda de música online que se orgulha de trazer a magia da música para sua vida. Nosso nome é uma homenagem ao deus nórdico Bragi, o deus da poesia e da música, conhecido por sua inspiração e criatividade.</p>
  </section>
  <section style="width: 175px; padding: 25px;">
    <h2>Nossa Missão</h2>
    <p>Nossa missão é fornecer acesso fácil e conveniente à música, permitindo que os amantes da música descubram, comprem e desfrutem de suas faixas favoritas. Estamos comprometidos em apoiar artistas independentes e oferecer uma vasta biblioteca de músicas de alta qualidade.</p>
  </section>
  <section style="width: 185px; padding: 35px;">
    <h2>Por Que Escolher a Bragy</h2>
    <ol>
      <li>Variedade de Música: Oferecemos uma ampla variedade de gêneros musicais para atender a todos os gostos.</li>
      <li>Qualidade de Áudio: Proporcionamos uma experiência de audição excepcional com qualidade de áudio de alta definição.</li>
      <li>Artistas Independentes: Apoiamos artistas independentes, ajudando-os a alcançar um público mais amplo.</li>
      <li>Experiência do Usuário: Nosso site é fácil de usar e projetado para tornar a busca e compra de música simples e agradável.</li>
    </ol>
  </section>
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




