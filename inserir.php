<?php


$sql = "INSERT INTO projecto (tipo,duracao,artista,genero,ano_lancamento,titulo,preco,num_faixa,amostra,capa) values(?,?,?,?,?,?,?,?,?,?)";
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
    $capa
));

move_uploaded_file($_FILES['amostra']['tmp_name'],"amostra/".$_FILES['amostra']['name']);
move_uploaded_file($_FILES['capa']['tmp_name'],"files/".$_FILES['capa']['name']);
echo "Projecto Registrado com sucesso";
header("location:plus.php");

