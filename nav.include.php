

<nav>
        <a class="logo" href="home.php"><i>Br<span>agy</span></i></a>
        <div class="menuCell">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
        </div>
        <ul class="lista-nav">
            <li>
                <a href="index.php">Musicas</a>
            </li>
            <li>
                <a href="albuns.php">Albuns</a>
            </li>
            <li>
                <a href="videos.php">Videos</a>
            </li>
            <li>
                <a href="mixtapes.php">Mixtapes</a>
            </li>
            <li>
                <a href="outros.php">Outros</a>
            </li>
            <li>
                <a href="about.php">Sobre n&oacute;s</a>
            </li>
           <?php
            if(isset($_SESSION["idUser"])){
                ?>
                <li>
                <a href="minha-conta.php">Meus rquivos</a>
                </li>
                <?php
            }
           ?>
            <?php
                if(isset($_SESSION['nome'])):
                    if($_SESSION['nome'] == ADM):
            ?>
            <!-- <li>
                <a href="funcionarios.php">FUNCIONARIOS</a>
            </li> -->
            <?php
                 endif; else:
            ?>
            
            <?php
                endif; ?>
            <?php
                if(isset($_SESSION['nome'])):
                    if($_SESSION['nome'] == ADM):
            ?>
            <li>
                <a href="plus.php"><img src="icones/registro.png"></a>
            </li>
            <li>
                <a href="reservas.php"><img src="icones/reservas.png"></a>
            </li>
            <?php
                 else:
            ?>
            <li>
                <a href="contact.php"><img src="icones/info.png"></a>
            </li>
            <li>
                <a href="carrinho.php"><img src="icones/car3.png"></a>
            </li>
            <?php
                endif;
                endif;
                if(!(isset($_SESSION['idUser'])&&isset($_SESSION['nome']))):
            ?>
            <li>
                <a href="entrar.php"><img src="icones/log.png"></a>
            </li>
            <?php else:
            ?>
            <li>
            <a href="logout.php"><img src="icones/switch.png"></a>
            </li>
            <?php
            endif;?>
        </ul>
        
    </nav>