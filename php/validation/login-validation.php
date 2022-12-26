<?php
    include "../classBDConection/BDConection.php";

    function verificarExistenciaUsuario($mysqli, $identificador)
    {
        $pesquisa  = "SELECT senha, ativo, nivel FROM Usuario WHERE cpf = '$identificador' || email = '$identificador'";
        return $mysqli->query($pesquisa);
    }

    function validarUsuario($senha_BD, $senha_submit, $ativo)
    {
        if(password_verify($senha_submit, $senha_BD))
        {
            if($ativo)
            {
                return true;
            }
            else
            {
                echo "A conta está desativada!";
                return false;
            }
        }
        else
        {
            header("Location: /gerador-de-contratos/index.php?error=A senha informada está incorreta!");
            return false;
        }
    }

    function criarCookieLogin($identificador, $nivel, $duracao)
    {
        setcookie("user[identify]", $identificador, $duracao, "/");
        setcookie("user[level]", $nivel, $duracao, "/");
    }

    if(isset($_POST["entrar"]))
    {
        $identificador_submit = $_POST["usuario-identificador"];
        $senha_submit         = $_POST["usuario-senha"];
        $remember             = isset($_POST["remember"]) ? "1" : "";

        $conexao = new BDConection();
        $mysqli = $conexao->criarConexao();
        
        $pesquisa_usuario = verificarExistenciaUsuario($mysqli, $identificador_submit);

        if($pesquisa_usuario->num_rows > 0)
        {
            $dados_usuario = $pesquisa_usuario->fetch_array(MYSQLI_ASSOC);
            $usuario_senha = $dados_usuario["senha"];
            $usuario_ativo = $dados_usuario["ativo"];
            $usuario_nivel = $dados_usuario["nivel"];

            if(validarUsuario($usuario_senha, $senha_submit, $usuario_ativo))
            {
                $tempo_sessao = $remember ? time() + 60*60*24*365*10 : 0;
                criarCookieLogin($identificador_submit, $usuario_nivel, $tempo_sessao);

                if($usuario_nivel == 2)
                {
                    header("Location: ../../dashboard/admin");
                }
                else
                {
                    header("Location: ../../dashboard");
                }
            }
        }
        else
        {
            header("Location: ../../?error=Usuário não encontrado!");
        }
    }
    else
    {
        http_response_code(404);
        header("Location: ../../error/404");
    }
?>