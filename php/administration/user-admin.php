<?php
    if($_COOKIE["nivel"] >= 2)
    {
        include "../classBDConection/BDConection.php";
    
        $conexao = new BDConection();
        $mysqli  = $conexao->criarConexao();
    
        $pesquisa_usuarios = "SELECT idUsuario, nome, sobrenome, cpf, email, contato, ativo FROM Usuario";
        $resultado         = $mysqli->query($pesquisa_usuarios);

        $tabela = "<table class='tabela'><thead><tr>";
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

            $tabela .= "<td><a class='botao_ativar' href='../query/UPDATE_user.php?id=$idUsuario&campos=ativo&valores=$novo_estado'>$nome_botao_update</a></td>";
            $tabela .= "<td><a class='botao_excluir' href='../query/DELETE_user.php?id=$idUsuario'>Excluir Usuário</a></td>";

            $tabela .= "</tr>";
        }

        echo $tabela;
    }
    else
    {
        http_response_code(404);
        header("Location: http://codigin.epizy.com/assets/errors/not-found.html");
    }
?>