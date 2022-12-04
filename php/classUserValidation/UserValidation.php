<?php
    class UserValidation
    {
        public $usuario;
        public $erros = [];
        public $configValidation = [];

        public function __construct($usuario, $senha_repeat)
        {
            $this->usuario = $usuario;
            $this->desformatarDados();
            $this->configValidation();
            $this->iterarConfiguracoes();
            
            if($this->usuario->senha != $senha_repeat)
            {
                $this->erros["senha_repeat"] = "As senhas não coincidem";
            }
        }

        public function iterarConfiguracoes()
        {
            foreach($this->configValidation as $nome_campo => $configuracoes)
            {
                $valor          = $configuracoes["valor"];
                $regex          = $configuracoes["regex"];
                $isOptional     = $configuracoes["isOptional"];
                $min_caracteres = $configuracoes["min"];
                $max_caracteres = $configuracoes["max"];

                $this->validarCampo($nome_campo, $valor, $regex, $isOptional, $min_caracteres, $max_caracteres);
            }
        }

        public function configValidation()
        {
            $regex_nomes    = '/^[a-zA-Zá-üÁ-Ü]+(( [a-zA-Zá-üÁ-Ü]+)+)?$/'; //Aceita apenas letras (maiúsculas, minúsculas e acentuadas) e espaços não consecutivos.
            $regex_numeros  = '/^\d+$/'; //Aceita apenas dígitos de 0-9.
            $regex_email    = '/^.+@\w+(\.\w+)+$/'; //Aceita apenas letras (maiúsculas e minúsculas, sem acento), dígitos de 0-9 e "." antes do @ (presença obrigatória). Após o @, aceita as mesmas condições iniciais, porém, após a primeira palavra (domínio), é obrigatório pelo menos a presença de um "." e mais uma palavra (TLD).
            $regex_senha    = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#-.])[0-9a-zA-Z$*&@#-.]+$/'; //Aceita todos os caracteres existentes, sendo obrigatório a presença de pelo menos uma letra maiúscula e minúscula, um dígito e um símbolo: $*&@#-.
            $regex_endereco = '/^[\wá-üÁ-Ü.]+((\s[\wá-üÁ-Ü.]+)+)?$/'; //Aceita apenas letras (maiúsculas, minúsculas e acentuadas), dígitos de 0-9 e espaços não consecutivos.
            $regex_uf       = '/^[A-Z]+$/';

            $this->configValidation["nome"]["valor"] = $this->usuario->nome;
            $this->configValidation["nome"]["regex"] = $regex_nomes;
            $this->configValidation["nome"]["isOptional"] = false;
            $this->configValidation["nome"]["min"] = 3;
            $this->configValidation["nome"]["max"] = 20;

            $this->configValidation["sobrenome"]["valor"] = $this->usuario->sobrenome;
            $this->configValidation["sobrenome"]["regex"] = $regex_nomes;
            $this->configValidation["sobrenome"]["isOptional"] = false;
            $this->configValidation["sobrenome"]["min"] = 3;
            $this->configValidation["sobrenome"]["max"] = 40;

            $this->configValidation["email"]["valor"] = $this->usuario->email;
            $this->configValidation["email"]["regex"] = $regex_email;
            $this->configValidation["email"]["isOptional"] = false;
            $this->configValidation["email"]["min"] = 9;
            $this->configValidation["email"]["max"] = 100;

            $this->configValidation["senha"]["valor"] = $this->usuario->senha;
            $this->configValidation["senha"]["regex"] = $regex_senha;
            $this->configValidation["senha"]["isOptional"] = false;
            $this->configValidation["senha"]["min"] = 8;
            $this->configValidation["senha"]["max"] = 24;

            $this->configValidation["celular"]["valor"] = $this->usuario->celular;
            $this->configValidation["celular"]["regex"] = $regex_numeros;
            $this->configValidation["celular"]["isOptional"] = false;
            $this->configValidation["celular"]["min"] = 11;
            $this->configValidation["celular"]["max"] = 11;

            $this->configValidation["cpf"]["valor"] = $this->usuario->cpf;
            $this->configValidation["cpf"]["regex"] = $regex_numeros;
            $this->configValidation["cpf"]["isOptional"] = false;
            $this->configValidation["cpf"]["min"] = 11;
            $this->configValidation["cpf"]["max"] = 11;

            $this->configValidation["cnpj"]["valor"] = $this->usuario->cnpj;
            $this->configValidation["cnpj"]["regex"] = $regex_numeros;
            $this->configValidation["cnpj"]["isOptional"] = false;
            $this->configValidation["cnpj"]["min"] = 14;
            $this->configValidation["cnpj"]["max"] = 14;

            $this->configValidation["rua"]["valor"] = $this->usuario->endereco->rua;
            $this->configValidation["rua"]["regex"] = $regex_endereco;
            $this->configValidation["rua"]["isOptional"] = false;
            $this->configValidation["rua"]["min"] = 6;
            $this->configValidation["rua"]["max"] = 100;

            $this->configValidation["numero"]["valor"] = $this->usuario->endereco->numero;
            $this->configValidation["numero"]["regex"] = $regex_numeros;
            $this->configValidation["numero"]["isOptional"] = false;
            $this->configValidation["numero"]["min"] = 1;
            $this->configValidation["numero"]["max"] = 6;

            $this->configValidation["cep"]["valor"] = $this->usuario->endereco->cep;
            $this->configValidation["cep"]["regex"] = $regex_numeros;
            $this->configValidation["cep"]["isOptional"] = false;
            $this->configValidation["cep"]["min"] = 8;
            $this->configValidation["cep"]["max"] = 8;

            $this->configValidation["bairro"]["valor"] = $this->usuario->endereco->bairro;
            $this->configValidation["bairro"]["regex"] = $regex_endereco;
            $this->configValidation["bairro"]["isOptional"] = false;
            $this->configValidation["bairro"]["min"] = 5;
            $this->configValidation["bairro"]["max"] = 100;

            $this->configValidation["uf"]["valor"] = $this->usuario->endereco->uf;
            $this->configValidation["uf"]["regex"] = $regex_uf;
            $this->configValidation["uf"]["isOptional"] = false;
            $this->configValidation["uf"]["min"] = 2;
            $this->configValidation["uf"]["max"] = 2;

            $this->configValidation["referencia"]["valor"] = $this->usuario->endereco->referencia;
            $this->configValidation["referencia"]["regex"] = $regex_endereco;
            $this->configValidation["referencia"]["isOptional"] = true;
            $this->configValidation["referencia"]["min"] = 3;
            $this->configValidation["referencia"]["max"] = 30;
        }

        public function desformatarDados()
        {
            $this->usuario->nome      = $this->retirarEspacosDuplos(trim($this->usuario->nome));
            $this->usuario->sobrenome = $this->retirarEspacosDuplos(trim($this->usuario->sobrenome)); 
            $this->usuario->email     = trim($this->usuario->email);
            $this->usuario->celular   = $this->retirarCaracteresEspeciais(["(", ")", " ", "-"], trim($this->usuario->celular));
            $this->usuario->cpf       = $this->retirarCaracteresEspeciais([".", "-"], trim($this->usuario->cpf));
            $this->usuario->cnpj      = $this->retirarCaracteresEspeciais([".", "/", "-"], trim($this->usuario->cnpj));

            $this->usuario->endereco->rua        = $this->retirarEspacosDuplos(trim($this->usuario->endereco->rua));
            $this->usuario->endereco->numero     = trim($this->usuario->endereco->numero);
            $this->usuario->endereco->cep        = $this->retirarCaracteresEspeciais(["-"], trim($this->usuario->endereco->cep));
            $this->usuario->endereco->bairro     = $this->retirarEspacosDuplos(trim($this->usuario->endereco->bairro));
            $this->usuario->endereco->uf         = trim($this->usuario->endereco->uf);
            $this->usuario->endereco->referencia = $this->retirarEspacosDuplos(trim($this->usuario->endereco->referencia));
        }

        public function retirarEspacosDuplos($texto)
        {
            return str_replace("  ", " ", $texto);
        }

        public function retirarCaracteresEspeciais($listaCaracteres, $texto)
        {
            return str_replace($listaCaracteres, "", $texto);
        }

        public function validarCampo($nome_campo, $campo, $regex, $isOptional, $min_caracteres, $max_caracteres)
        {
            if($this->verificarVazio($nome_campo, $campo, $isOptional))
            {
                if($this->verificarRegex($nome_campo, $campo, $regex))
                {
                    $this->verificarTamanho($nome_campo, $campo, $min_caracteres, $max_caracteres);
                }
            }
        }

        public function verificarVazio($nome_campo, $campo, $isOptional)
        {
            if($campo == "" || $campo == null || empty($campo))
            {
                if(!$isOptional)
                {
                    $this->erros[$nome_campo] = "não pode ficar vazio";
                }

                return false;
            }
            else
            {
                return true;
            }
        }

        public function verificarRegex($nome_campo, $campo, $regex)
        {
            if(!preg_match($regex, $campo))
            {
                $this->erros[$nome_campo] = "possui caracteres, formato ou valor inválidos";
                return false;
            }
            else
            {
                return true;
            }
        }

        public function verificarTamanho($nome_campo, $campo, $min_caracteres, $max_caracteres)
        {
            $tamanho_campo = strlen($campo);

            if($tamanho_campo >= $min_caracteres && $tamanho_campo <= $max_caracteres)
            {
                return true;
            }
            else
            {
                $this->erros[$nome_campo] = "possui um tamanho inválido.";
                return false;
            }
        }
    }
?>