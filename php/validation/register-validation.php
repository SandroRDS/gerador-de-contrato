<?php
    include "../classUsuario/Usuario.php";
    include "../classEndereco/Endereco.php";
    include "../classUserValidation/UserValidation.php";
    include "../classBDConection/BDConection.php";

    function buscarDadosDoFormulario()
    {
        $novo_endereco = new Endereco();
        $novo_usuario = new Usuario();

        $novo_usuario->nome      = $_POST["usuario-nome"];
        $novo_usuario->sobrenome = $_POST["usuario-sobrenome"];
        $novo_usuario->email     = $_POST["usuario-email"];
        $novo_usuario->senha     = $_POST["usuario-senha"];
        $novo_usuario->celular   = $_POST["usuario-celular"];
        $novo_usuario->cpf       = $_POST["usuario-cpf"];
        $novo_usuario->cnpj      = $_POST["usuario-cnpj"];
        
        $novo_endereco->rua        = $_POST["endereco-rua"];
        $novo_endereco->numero     = $_POST["endereco-numero"];
        $novo_endereco->cep        = $_POST["endereco-cep"];
        $novo_endereco->bairro     = $_POST["endereco-bairro"];
        $novo_endereco->uf         = $_POST["endereco-UF"];
        $novo_endereco->referencia = $_POST["endereco-referencia"];
    
        $novo_usuario->endereco = $novo_endereco;

        return $novo_usuario;
    }

    function inserirEndereco($mysqli, $logradouro, $numero, $bairro, $estado, $cep, $referencia)
    {
        $estrutura_endereco = "logradouro, numero, bairro, estado, cep, referencia";
        $dados_endereco     = "'$logradouro', $numero, '$bairro', '$estado', '$cep', '$referencia'";
        $insert_endereco    = "INSERT INTO Endereco ($estrutura_endereco) VALUES ($dados_endereco)";
        $mysqli->query($insert_endereco);
    }

    function inserirUsuario($mysqli, $idEndereco, $nome, $sobrenome, $email, $senha, $cpf, $cnpj, $contato)
    {
        $estrutura_usuario = "idEndereco, nome, sobrenome, email, senha, cpf, cnpj, contato";
        $dados_usuario     = "'$idEndereco', '$nome', '$sobrenome', '$email', '$senha', '$cpf', '$cnpj', '$contato'";
        $insert_usuario    = "INSERT INTO Usuario ($estrutura_usuario) VALUES ($dados_usuario)";           
        $mysqli->query($insert_usuario);
    }

    function verificarUsuarioExistente($mysqli, $cpf, $cnpj, $email, $contato)
    {
        $pesquisa_verificacao  = "SELECT 0 FROM Usuario WHERE cpf = '$cpf' || cnpj = '$cnpj' || email = '$email' || contato = '$contato'";
        $resultado_verificacao = $mysqli->query($pesquisa_verificacao);
        return $resultado_verificacao->num_rows < 1;
    }

    if(isset($_POST["enviar"]))
    {
        $novo_usuario = buscarDadosDoFormulario();
        $senha_repeat = $_POST["usuario-senha-repeat"];

        $validacao = new UserValidation($novo_usuario, $senha_repeat);
        
        if(empty($validacao->erros))
        {
            $conexaoBD = new BDConection();
            $mysqli    = $conexaoBD->criarConexao();

            $nome      = $validacao->usuario->nome;
            $sobrenome = $validacao->usuario->sobrenome;
            $email     = $validacao->usuario->email;
            $senha     = password_hash($validacao->usuario->senha, PASSWORD_DEFAULT);
            $cpf       = $validacao->usuario->cpf;
            $cnpj      = $validacao->usuario->cnpj;
            $contato   = $validacao->usuario->celular;

            $logradouro = $validacao->usuario->endereco->rua;
            $numero     = $validacao->usuario->endereco->numero;
            $bairro     = $validacao->usuario->endereco->bairro;
            $estado     = $validacao->usuario->endereco->uf;
            $cep        = $validacao->usuario->endereco->cep;
            $referencia = $validacao->usuario->endereco->referencia;            

            if(verificarUsuarioExistente($mysqli, $cpf, $cnpj, $email, $contato))
            {
                inserirEndereco($mysqli, $logradouro, $numero, $bairro, $estado, $cep, $referencia);
                $idEndereco = $mysqli->insert_id;
                
                inserirUsuario($mysqli, $idEndereco, $nome, $sobrenome, $email, $senha, $cpf, $cnpj, $contato);

                header("Location: ../../");
            }
            else
            {
                header("Location: ../../register/?error=Conta existente!");
            }
        }
        else
        {
            http_response_code(400);
        }
    }
    else
    {
        http_response_code(404);
        header("Location: ../../error/404");
    }
?>