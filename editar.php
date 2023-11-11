<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Musica-Cadastro</title>
</head>
<body>

    <?php
        require_once("config.php");
        require_once("conexao.php");
        session_start();

        if(ADM!=$_SESSION['nome'])
       {
            header("location:cd.php");
            
        }
    if(isset($_REQUEST['id'])):

    ?> 

   
    <div class="parent" style="padding-top:100px !important;padding-bottom:100px !important;">
        <div class="login-container"style="max-width:650px !important" >
            <form class="login-form" method="post" enctype="multipart/form-data">
                <center>
                    <small style="color:red">
                        <?php
                            if(isset($_REQUEST['load'])){
                                $id = $_REQUEST['id'];
                                $tipo = isset($_REQUEST['tipo'])?$_REQUEST['tipo']:"";
                                $genero = isset($_REQUEST['genero'])?$_REQUEST['genero']:"";
                                $duracao = isset($_REQUEST['duracao'])?$_REQUEST['duracao']:"";
                                $artista = isset($_REQUEST['artista'])?$_REQUEST['artista']:"";
                                $ano = isset($_REQUEST['ano'])?$_REQUEST['ano']:"";
                                $titulo = isset($_REQUEST['titulo'])?$_REQUEST['titulo']:"";
                                $preco = isset($_REQUEST['preco'])?$_REQUEST['preco']:"";
                                $faixas = isset($_REQUEST['faixas'])?$_REQUEST['faixas']:"";
                                $amostra = $_FILES['amostra']['name'];
                                $capa = $_FILES['capa']['name'];
                                $fita = isset($_REQUEST['tipo_fita'])?$_REQUEST['tipo_fita']:"";
                                $modo = isset($_REQUEST['gravacao'])?$_REQUEST['gravacao']:"";
                                $lados = isset($_REQUEST['lados'])?$_REQUEST['lados']:"";
                                $quantidade = isset($_REQUEST['quantidade'])?$_REQUEST['quantidade']:"";

                                if(trim($genero)=="" || trim($duracao)=="" || trim($artista)=="" || trim($ano) =="" || trim($titulo)=="" || trim($preco) == "" || trim($faixas) ==""){
                                    echo "Por favor preencha todos os dados correctamente";
                                }else{
                                    require "editarProj.php";
                                }
                            }
                        ?>
                    </small>
                </center>
                <?php
                $sql = "SELECT *FROM projecto WHERE id=?;"; 
    
               
                $motor = $con->prepare($sql);
                $motor->execute([
                    $_REQUEST['id']
                ]);
                

                foreach($motor as $linha)
                ?>
                <fieldset>
                    <legend id="lgd">EDITAR PROJECTO</legend>
                <table  id="tblCadastro" cellspacing="7px">
                    <tr>
                        <td>
                            <label for="artista">Nome(s):</label>
                        </td>
                        <td colspan="3">
                        <input type="text" name="artista" id="artista" placeholder="Artista(s)" value=<?=$linha['artista']?>>
                        </td>
                        
                    </tr>
                    <tr> 
                        <td>
                            <label for="titulo">Titulo:</label>
                        </td>
                        <td colspan="3">
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo" value=<?=$linha['titulo']?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ano">Ano de Lan&ccedil;amento:</label>
                        </td>
                        <td>
                        <input type="text" name="ano" id="ano" placeholder="Ano de lan&ccedil;amento" value=<?=$linha['ano_lancamento']?>>
                        </td>
                        <td>
                            <label for="estilo">G&ecirc;nero:</label>
                            
                        </td>
                        <td>
                        <select name="genero"  value=<?=$linha['genero']?>>
                            <option value="Rap" selected="<?=$linha['genero'] == "Rap"?"true":"false"?>">Rap</option>
                            <option value="Trap" selected="<?=$linha['genero'] == "Trap"?"true":"false"?>">Trap</option>
                            <option value="Underground" selected="<?=$linha['genero'] == "Underground"?"true":"false"?>">Underground</option>
                            <option value="Kizomba" selected="<?=$linha['genero'] == "Kizomba"?"true":"false"?>">Kizomba</option>
                            <option value="Marrabenta" selected="<?=$linha['genero'] == "Marrabenta"?"true":"false"?>">Marrabenta</option>
                            <option value="Panza"  selected="<?=$linha['genero'] == "Panza"?"true":"false"?>">Panza</option>
                            <option value="Romantica" selected="<?=$linha['genero'] == "Romantica"?"true":"false"?>">Romantica</option>
                            <option value="outros" selected="<?=$linha['genero'] == "Outros"?"true":"false"?>">Outros</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="num">Numero dos ficheiros:</label>
                        </td>
                        <td>
                        <input type="number" name="faixas" id="num" placeholder="Numero de faixas/Videos" min=1  class="faixas" value=<?=$linha['num_faixa']?>><br>
                        </td>
                        <td>
                            <label for="duracao">Tempo de Dura&ccedil;ao:</label>
                        </td>
                        <td>
                        <input type="text" name="duracao" id="duracao" placeholder="Dura&ccedil;ao em minutos" value=<?=$linha['duracao']?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="preco">Pre&ccedil;o de venda:</label>
                        </td>
                        <td>
                        <input type="number" name="preco" id="preco" placeholder="Pre&ccedil;o" value=<?=$linha['preco']?>>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">Informa&ccedil;oes Adicionais</th>
                    </tr>
                    <tr>
                        <td>
                        <label for="amostra">Carregue o arquivo:</label>
                        </td>
                        <td colspan="3">
                        <input type="file" name="amostra" id="amostra" value=<?=$linha['amostra']?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="capa">Carregue a capa arquivo:</label>
                        </td>
                        <td colspan="3">
                        <input type="file" name="capa" id="capa" value=<?=$linha['capa']?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="model">Tipo:</label>
                        </td>
                        <td>
                        <select name="tipo" value=<?=$linha['tipo']?>>
                        <option value="Album" selected="<?=$linha['tipo'] == "Album"?"true":"false"?>">Album</option>
                            <option value="Video" selected="<?=$linha['tipo'] == "Video"?"true":"false"?>">Video</option>
                            <option value="Musica" selected="<?=$linha['tipo'] == "Musica"?"true":"false"?>">Musica</option>
                            <option value="Mixtape" selected="<?=$linha['tipo'] == "Mixtape"?"true":"false"?>">Mixtape</option>
                            <option value="outros" selected="<?=$linha['tipo'] == "outros"?"true":"false"?>">outros</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Editar" name="load"></td>
                        <td><input type="reset" value="Limpar"></td>
                        <td></td>
                        <td><a href="index.php">Ir a pagina Inicial</a></td>
                    </tr>
                </table>
                </fieldset>
            </form>
        </div>
    </div>
                <?php endif;?>
</body>
</html>