<?php
    include "../classBDConection/BDConection.php";

    $conexao = new BDConection();
    $mysqli  = $conexao->criarConexao();

    $pesquisa_usuarios = "SELECT idUsuario, nome, sobrenome, cpf, email, contato, ativo FROM Usuario";
    $resultado         = $mysqli->query($pesquisa_usuarios);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários | Página Administrativa</title>

    <style>
        body
        {
            min-height: 100vh;
            
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form
        {
            padding: 30px;
            border-radius: 10px;
            background-color: #7fc7af;
        }

        td, th
        {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <form action="../validation/user-admin-validation.php" method="POST">
        <?php
            $tabela = "<table><thead><tr>";
            $tabela .= "<th>ID</th>";
            $tabela .= "<th>Nome</th>";
            $tabela .= "<th>Sobrenome</th>";
            $tabela .= "<th>CPF</th>";
            $tabela .= "<th>Email</th>";
            $tabela .= "<th>Contato</th>";
            $tabela .= "<th>Conta Ativada</th>";
            $tabela .= "<th></th>";
            $tabela .= "<th></th>";
            $tabela .= "</tr></thead>";

            while($usuario = $resultado->fetch_array(MYSQLI_ASSOC))
            {
                $tabela .= "<tr>";

                foreach($usuario as $nome_campo => $valor)
                {
                    $tabela .= "<td class='$nome_campo'>$valor</td>";
                }

                if($usuario["ativo"])
                {
                    $novo_estado = 0;
                    $nome_botao_update  = "Desativar Conta"; 
                }
                else
                {
                    $novo_estado = 1;
                    $nome_botao_update  = "Ativar Conta";
                }

                $idUsuario = $usuario["idUsuario"];

                $tabela .= "<td><a href='../query/UPDATE_user.php?id=$idUsuario&campos=ativo&valores=$novo_estado'>$nome_botao_update</a></td>";
                $tabela .= "<td><a href='../query/DELETE_user.php?id=$idUsuario'>Excluir Usuário</a></td>";

                $tabela .= "</tr>";
            }

            echo $tabela;
        ?>
    </form>
</body>
</html>