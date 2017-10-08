
<?php
require 'config.php';
require 'connection.php';
require 'database.php';
function retorna(){
    return $clientes = DBRead('clientes', null, 'id, nome, email, endereco, telefone, telefone2');    
}
