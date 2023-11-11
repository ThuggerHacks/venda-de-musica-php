<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
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
   

    <!---------------Carrinho---------------->
    <section id="carrinho">
       
        <h3>Carrinho de compras</h3>
        <?php
            $total = 0;
           $items = array();
            $sql = "select projecto.*,carrinho.* from projecto,carrinho where projecto.id=carrinho.project_id and carrinho.user_id=?"; 
            
            if(isset($_SESSION['idUser'])):
            $motor = $con->prepare($sql);
            $motor->execute([
                $_SESSION['idUser']
            ]);
        ?>  
        <div class="carrinho"><!----------card-1 start-->
            <table class="tbcarrinho">
                <tr>
                    <th>Artista(s)</th>
                    <th>Tipo</th>
                    <th>Titulo do Arquivo</th>
                    <th>Genero</th>
                    <th>Pre&ccedil;o</th>
                    <!-- <th>Subtotal</th> -->
                </tr>
                <?php 
                      
                    $vtotal =0;
                    foreach($motor as $linha):
                     $total = $linha['preco'] * $linha['quantidade'];
                     $vtotal = $vtotal+$total;
                     $tipo = $linha['formato'];
                     $subtotal =0;
                     $price = $linha['preco'];
                    array_push($items,$linha['project_id']);
            
                     switch($tipo){
                        case "Cd":
                            $subtotal= (2.25 * $price) - (0.25 * 3);
                            break;
                        case "Cd-Video":
                            $subtotal= (2.25 * $price) - (0.01 * 3);
                            break;
                        case "Fita-Video":
                            $subtotal= (1.10 * $price) - (0.05 * 3);
                        break;   
                        case "Cassete":
                            $subtotal=  (1.50 * $price);
                            break;
                        case "Dvd":
                            $subtotal= (3.50 * $price)-(0.50 * 3);
                        break;   
                     }
                     if($linha['id']>0 && $linha['quantidade']>0):
                    ?>
                   
                <tr>
                    <td><?=$linha['artista']?></td>
                    <td><?=$linha['tipo']?></td>
                    <td><?=$linha['titulo']?></td>
                    <td><?=$linha['genero']?></td>
                    <td><?=$linha['preco']?>.00 MZN</td>
                </tr>
                <?php endif; ?>
                <?php endforeach;
                if(isset($linha['id'])):  ?>            
                 <tr>
                    <td colspan="4" class="total">Total:</td>
                     <td class="total"><?=$vtotal?>.00 MZN</td>
                     </tr> 
                     <tr>
                        <td><a href="<?='limpar-carrinho.php?id='.$linha['id'] ?>"><button id="btClean">Limpar </button></a>
                        &nbsp;&nbsp;&nbsp;
                        <td><button class='btPedido' onclick="makePayment('<?=$vtotal ?>',<?=$_SESSION['idUser']?>,'<?=json_encode($items)?>')">Pagar</button></td>
                        &nbsp;&nbsp;&nbsp;
                        </td>
                     </tr>
                   <?php endif ?>  
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
    <?php endif; ?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js" integrity="sha512-WrdC3CE9vf1nBf58JHepuWT4x24uTacky9fuzw2g/3L9JkihgwZ6Cfv+JGTtNyosOhEmttMtEZ6H3qJWfI7gIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const makePayment = async(amount,userId,Item) => {
          const phone = prompt("Por favor insira o seu numero de celular");
          if(phone.trim() == "" || phone.trim().length < 9){
            alert("Celular Invalido")
          }else{
           const  items = JSON.parse(Item);
            const payment = await axios.post("https://mpesa-api-jvs3.onrender.com/api/mpesa/c2b",{
                "amount":(amount)+"",
                "msisdn":phone,
                "transaction_ref":"T12344C",
                "thirdparty_ref":"BRAGY"
            })

            if(payment.data){
                let j = 0;
                if(payment.data.output_ResponseDesc == "Request processed successfully"){
                    items.map(async(i) => {
                        const sendPaymentToApi = await axios.post("http://localhost/MUSIC1/comprar.php",{
                            userId,
                            projectId:i
                        });

                        if(sendPaymentToApi.data){
                            j++;
                        }
                        console.log(sendPaymentToApi);
                    })
                    alert("Pagamento efectuado com sucesso!")
                    window.open("http://localhost/MUSIC1/minha-conta.php","_self");
                    
                }else{
                    alert("Houve um erro ao efectuar o Pagamento, Tente mais tarde")
                }
            }else{
                alert("Houve um erro ao efectuar o Pagamento, Tente mais tarde")
            }
        }

        }
    </script>
</body>
</html>