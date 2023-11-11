<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>

    <title>Musica-Cadastrar Midia</title>
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

    ?> 
   
    <div class="parent" style="padding-top:100px !important;padding-bottom:100px !important;">
        <div class="login-container" style="max-width:650px !important">
            <h3 style="color:#fff">PUBLICAR PROJECTO</h3>
            <form class="login-form" method="post" enctype="multipart/form-data">
                <center>
                    <small style="color:red">
                        <?php
                            if(isset($_REQUEST['load'])){
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
                                    require "inserir.php";
                                }
                            }
                           
                        ?>
                    </small>
                </center>
                <fieldset id="fieldsetProj">
                <table  id="tblCadastro" cellspacing="7px">
                    <tr>
                        <td>
                            <label  style="color:#fff" for="artista">Nome(s):</label>
                        </td>
                        <td colspan="3">
                        <input type="text" name="artista" id="artista" placeholder="Artista(s)">
                        </td>
                        
                    </tr>
                    <tr> 
                        <td>
                            <label style="color:#fff" for="titulo">Titulo:</label>
                        </td>
                        <td colspan="3">
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="color:#fff" for="ano">Ano de Lan&ccedil;amento:</label>
                        </td>
                        <td>
                        <input type="text" name="ano" id="ano" placeholder="Ano de lan&ccedil;amento">
                        </td>
                        <td>
                            <label style="color:#fff" for="estilo" class="labels">G&ecirc;nero:</label>
                        </td>
                        <td>
                        <select name="genero">
                            <option value="Rap">Rap</option>
                            <option value="Trap">Trap</option>
                            <option value="Underground">Underground</option>
                            <option value="Kizomba">Kizomba</option>
                            <option value="Marrabenta">Marrabenta</option>
                            <option value="Panza">Panza</option>
                            <option value="Romantica">Romantica</option>
                            <option value="outros">Outros</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="color:#fff" for="num">Numero dos ficheiros:</label>
                        </td>
                        <td>
                        <input type="number" name="faixas" id="num" placeholder="Numero de faixas/Videos" min=1  class="faixas"><br>
                        </td>
                        <td>
                            <label style="color:#fff" for="duracao" class="labels">Tempo de Dura&ccedil;ao:</label>
                        </td>
                        <td>
                        <input type="text" name="duracao" id="duracao" placeholder="Dura&ccedil;ao em minutos">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="color:#fff" for="preco">Pre&ccedil;o de venda:</label>
                        </td>
                        <td>
                        <input type="number" name="preco" id="preco" placeholder="Pre&ccedil;o">
                        </td>
                    </tr>
                    <tr>
                        <th style="color:#fff" colspan="4">Informa&ccedil;oes Adicionais</th>
                    </tr>
                    <tr>
                        <td>
                            <label  style="color:#fff" for="amostra">Carregue o arquivo:</label>
                        </td>
                        <td colspan="3">
                        <input type="file" name="amostra" id="amostra">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="color:#fff" for="capa">Carregue a capa arquivo:</label>
                        </td>
                        <td colspan="3">
                        <input type="file" name="capa" id="capa" accept="image/*">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="color:#fff" for="model">Tipo:</label>
                        </td>
                        <td>
                        <select name="tipo">
                            <option value="Album">Album</option>
                            <option value="Video">Video</option>
                            <option value="Musica">Musica</option>
                            <option value="Mixtape">Mixtape</option>
                            <option value="outros">outros</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Carregar" name="load" class="btnSub"></td>
                        <td><input type="reset" value="Limpar"></td>
                        <td></td>
                        <td><a style="color:#fff" href="index.php">Ir a pagina Inicial</a></td>
                    </tr>
                </table>
                </fieldset>
            </form>
</body>
</html>