<?php
require 'config.php';
require 'connection.php';
require 'database.php';
$pessoa = DBReadOne('clientes', 'id =' . $_POST['id']);
?>
<meta charset="UTF=8">
<title> PromoImpresso</title>
<section id="corpo-full" style="margin-left: 30%; margin-right: 30%; ">
    <form method = "post" id = "fContato" action="BDeditar.php" >
        <fieldset id = "usuario" style="margin-bottom: 50px;">
            <legend>Editar usuário</legend>
            <p><label for = "cNome">Nome:</label>
                <input type = "text" name = "tNome" id = "cNome" size = "60" maxlength = "20" placeholder = "Nome completo"  value="<?= $pessoa["nome"] ?>" />
            </p>
            <p><label for = "cEmail">E-mail:</label>
                <input type = "email" name = "tEmail" id = "cEmail" size = "60" maxlength = "40" placeholder = "@gmail.com" value="<?= $pessoa["email"] ?>" />
            </p>
            <p><label for = "cEndereco">Endereço:</label>
                <input type = "text" name = "tEndereco" id = "cEndereco" size = "60" maxlength = "40" placeholder = "Rua, Num, Bairro" value="<?= $pessoa["endereco"] ?>" />
            </p>
            <p><label for = "cTelefone">Telefone:</label>
                <input type = "text" name = "tTelefone" id = "cTelefone" size = "20" maxlength = "40" value="<?= $pessoa["telefone"] ?>" />
            </p>
            <p><label for = "cTelefone2">Telefone 2:</label>
                <input type = "text" name = "tTelefone2" id = "cTelefone2" size = "20" maxlength = "40" value="<?= $pessoa["telefone2"] ?>" />
            </p>
            <input type="hidden" name="id" value=<?= $pessoa["id"] ?> />
            <input type = "image" name = "tEnviar" src = "_imagens/botao-salvar.png" style="height: 60px; width: 200px;" />
        </fieldset>
    </form>
</section>