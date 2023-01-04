<?php 
    include "../../../php/classBDConection/BDConection.php";

    $conexao = new BDConection();
    $mysqli  = $conexao->criarConexao();

    $select = "SELECT idUsuario, nome, sobrenome, cpf FROM Usuario WHERE nivel = 1";
    $busca_usuarios = $mysqli->query($select);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codigin - Página de Administração - Contratos</title>
</head>
<body>
    <form action="../../../php/validation/contract-register-validation.php" method="POST">
        <input type="text" name="nome-contrato" placeholder="Nome do Contrato">
        <input type="text" name="codigo-contrato" <?php $codigo=uniqid(); echo "value='$codigo'"?>>
        <select name="dono-contrato">
            <option value="">Selecione o usuário dono do contrato</option>
            <?php
                while($usuario = $busca_usuarios->fetch_array(MYSQLI_ASSOC))
                {
                    $id        = $usuario["idUsuario"];
                    $nome      = $usuario["nome"];
                    $sobrenome = $usuario["sobrenome"];
                    $cpf       = $usuario["cpf"];

                    echo "<option value='$id'>$nome $sobrenome ($cpf)</option>";
                }
            ?>
        </select>
        <input type="submit" name="salvar" value="Salvar Contrato">
    </form>
</body>
</html>