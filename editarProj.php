<?php
$sql = "UPDATE projecto SET tipo=?,duracao=?,artista=?,genero=?,ano_lancamento=?,titulo=?,preco=?,num_faixa=?,amostra=?, capa=? WHERE id=?";

$motor = $con->prepare($sql);
$motor->execute(array(
    $tipo,
    $duracao,
    $artista,
    $genero,
    $ano,
    $titulo,
    $preco,
    $faixas,     
    $amostra,
    $capa,
    $id
));

move_uploaded_file($_FILES['amostra']['tmp_name'],"amostra/".$_FILES['amostra']['name']);
move_uploaded_file($_FILES['capa']['tmp_name'],"files/".$_FILES['capa']['name']);
echo "Projecto Atualizado com sucesso";
header("location:index.php");