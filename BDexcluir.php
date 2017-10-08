<?php

require 'config.php';
require 'connection.php';
require 'database.php';

$dropCliente = DBDelete('clientes', 'id ='.$_POST['id']);

if ($dropCliente) {
    header("Location:index.php");
} else {
    echo 'Erro ao salvar';
}
