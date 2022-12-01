<?php
    include "../classBDConection/BDConection.php";
    
    if(isset($_POST["entrar"]))
    {
        $identificador_submit = $_POST["usuario-identificador"];
        $senha_submit         = $_POST["usuario-senha"];
        $remember             = isset($_POST["remember"]) ? "1" : "";

        $conexao = new BDConection();
        $mysqli = $conexao->criarConexao();

        $pesquisa_usuario_existente = "SELECT senha FROM usuario WHERE cpf = '$identificador_submit' || email = '$identificador_submit'";
        $resultado_pesquisa = $mysqli->query($pesquisa_usuario_existente);

        if($resultado_pesquisa->num_rows > 0)
        {
            $dados_usuario = $resultado_pesquisa->fetch_array(MYSQLI_ASSOC);
            $senha_usuario = $dados_usuario["senha"];

            if(password_verify($senha_submit, $senha_usuario))
            {
                echo "Usuário encontrado!";
                var_dump($dados_usuario);
            }
            else
            {
                echo "Senha incorreta!";
            }
        }
        else
        {
            echo "Usuário não encontrado!";
        }
    }
    else
    {
        http_response_code(401);
    }
?>