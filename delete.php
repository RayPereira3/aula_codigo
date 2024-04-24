<?php

$id = $_GET['id'];

// echo $id;

include_once("conect.php"); //importar o aquivo de conexão

include_once("Crud.php"); //importar o aquivo da classe Crud

$obj = new Crud($conect);

$obj->delete($id);

?>