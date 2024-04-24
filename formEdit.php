<?php

$id = $_GET['id'];

include_once("Crud.php"); //importar o aquivo da classe Crud

include_once("conect.php"); //importar o aquivo de conexão

$obj = new Crud($conect);

$dados = $obj->readInfo($id);

// var_dump($dados);

?>

<link rel="stylesheet" type="text/css" href="css/estilo.css">

<main>

<header> Altere os campos necessários! </header>

<form action="update.php" method="post"> 

    <p> Nome: <input type="text" name="pessoa" value="<?=$dados->nome;?>"> </p>
    <p> Idade: <input type="number" name="idade" value="<?=$dados->idade;?>"> </p>
    <p> E-mail: <input type="email" name="email" value="<?=$dados->email;?>" > </p>
    <input type="hidden" name="id" value="<?=$dados->id;?>">
    <p> <button type="submit" > Alterar dados </button> </p>

</form>

</main>