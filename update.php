<?php

$nome = $_POST['pessoa'];
$idade = $_POST['idade'];
$email = $_POST['email'];

$id = $_POST['id'];

// echo $nome." - ".$idade." - ".$email." - ".$id."<br>";

include_once("Crud.php"); //importar o aquivo da classe Crud

include_once("conect.php"); //importar o aquivo de conexão

$obj = new Crud($conect);

$obj->update($id,$nome,$idade,$email);

?>