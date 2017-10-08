<?php
include 'BDler.php';
$grupo = retorna();
?>

<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF=8">
        <title> PromoImpresso</title>

        <link rel="stylesheet" type="text/css" href="_css/estilo.css"/>
    </head>
    <body>
        <section id="corpo-full" style="margin-left: 30%; margin-right: 30%; ">
            <form method = "post" id = "fContato" action="BDsalvar.php" >
                <fieldset id = "usuario" style="margin-bottom: 50px; " >
                    <legend>Cadastro de usuários</legend>
                    <p><label for = "cNome">Nome:</label>
                        <input type = "text" name = "tNome" id = "cNome" size = "60" maxlength = "20" placeholder = "Nome completo"  />
                    </p>
                    <p><label for = "cEmail">E-mail:</label>
                        <input type = "email" name = "tEmail" id = "cEmail" size = "60" maxlength = "40" placeholder = "@gmail.com" />
                    </p>
                    <p><label for = "cEndereco">Endereço:</label>
                        <input type = "text" name = "tEndereco" id = "cEndereco" size = "60" maxlength = "40" placeholder = "Rua, Num, Bairro" />
                    </p>
                    <p><label for = "cTelefone">Telefone:</label>
                        <input type="text" name = "tTelefone" id = "cTelefone" size = "20" maxlength = "40" />
                    </p>
                    <p><label for = "cTelefone2">Telefone 2:</label>
                        <input type = "text" name = "tTelefone2" id = "cTelefone2" size = "20" maxlength = "40" />
                    </p>
                    <input type = "image" name = "tEnviar" src = "_imagens/botao-salvar.png" style="height: 60px; width: 200px;" />
                </fieldset>
            </form>

            <table border="1">
                <caption>Usuários no sistema</caption>
                <tr style="background-color: #DCDCDC">
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Endereço</td>
                    <td>Telefone</td>
                    <td>Telefone 2</td>
                    <td>Editar</td>
                    <td>Excluir</td>

                    <?php foreach ($grupo as $pessoa) { ?>

                    <tr>
                        <td><?= $pessoa['nome'] ?></td>
                        <td><?= $pessoa['email'] ?></td>
                        <td><?= $pessoa['endereco'] ?></td>
                        <td><?= $pessoa['telefone'] ?></td>
                        <td><?= $pessoa['telefone2'] ?></td>
                        <td>
                            <form name="alterar" action="alterar.php" method="POST">
                                <input type="hidden" name="id" value=<?= $pessoa["id"] ?> />
                                <input type="image" src="_imagens/edit.png" name="editar" style="height: 36px; width: 36px;"  />
                            </form>
                        </td>
                        <td>
                            <form name="excluir" action="BDexcluir.php" method="POST">
                                <input type="hidden" name="id" value=<?= $pessoa["id"] ?> />
                                <input type="image" src="_imagens/delete.png" name="editar" name="editar"style="height: 36px; width: 36px;"  />
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
                </tr>
            </table>
        </section>
    </body>
</html>
