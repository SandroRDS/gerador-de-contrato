<?php
    include "../classUsuario/Usuario.php";
    include "../classEndereco/Endereco.php";
    include "../classUserValidation/UserValidation.php";
    include "../classBDConection/BDConection.php";

    if(isset($_POST["enviar"]))
    {
        $novo_endereco = new Endereco();
        $novo_usuario = new Usuario();
    
        $novo_usuario->nome      = $_POST["usuario-nome"];
        $novo_usuario->sobrenome = $_POST["usuario-sobrenome"];
        $novo_usuario->email     = $_POST["usuario-email"];
        $novo_usuario->senha     = $_POST["usuario-senha"];
        $senha_repeat            = $_POST["usuario-senha-repeat"];
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

        $validacao = new UserValidation($novo_usuario, $senha_repeat);
        
        if(empty($validacao->erros))
        {
            $conexaoBD = new BDConection();
            $mysqli    = $conexaoBD->criarConexao();

            $nome           = $validacao->usuario->nome;
            $sobrenome      = $validacao->usuario->sobrenome;
            $email          = $validacao->usuario->email;
            $senha          = password_hash($validacao->usuario->senha, PASSWORD_DEFAULT);
            $cpf            = $validacao->usuario->cpf;
            $cnpj           = $validacao->usuario->cnpj;
            $contato        = $validacao->usuario->celular;
            $conta_aprovada = 0;

            $logradouro = $validacao->usuario->endereco->rua;
            $numero     = $validacao->usuario->endereco->numero;
            $bairro     = $validacao->usuario->endereco->bairro;
            $estado     = $validacao->usuario->endereco->uf;
            $cep        = $validacao->usuario->endereco->cep;
            $referencia = $validacao->usuario->endereco->referencia;
            
            $estrutura_usuario = "nome, sobrenome, email, senha, cpf, cnpj, contato";
            $dados_usuario     = "'$nome', '$sobrenome', '$email', '$senha', '$cpf', '$cnpj', '$contato'";
            
            $verificacao_bd_usuario = $mysqli->query("SELECT 0 FROM usuario WHERE cpf = '$cpf' || cnpj = '$cnpj' || email = '$email' || contato = '$contato'");

            if($verificacao_bd_usuario->num_rows < 1)
            {
                $insert_usuario = "INSERT INTO usuario ($estrutura_usuario) VALUES ($dados_usuario)";           
                $mysqli->query($insert_usuario);
                $idUsuario = $mysqli->insert_id;
    
                $estrutura_endereco = "idUsuario, logradouro, numero, bairro, estado, cep, referencia";
                $dados_endereco = "$idUsuario, '$logradouro', $numero, '$bairro', '$estado', '$cep', '$referencia'";
                $insert_endereco = "INSERT INTO endereco ($estrutura_endereco) VALUES ($dados_endereco)";
                $mysqli->query($insert_endereco);

                header("Location: ../../assets/templates/login.html");
            }
            else
            {
                header("Location: ../../assets/templates/register.html");
            }
        }
        else
        {
            http_response_code(400);
        }
    }
    else
    {
        http_response_code(401);
    }
?>