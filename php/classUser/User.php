<?php
    class User
    {
        function __construct($nome, $rg, $cpf, $celular, $endereco) 
        {
            $this->$nome = $nome;
            $this->$rg = $rg;
            $this->$cpf = $cpf;
            $this->$celular = $celular;
            $this->$endereco = $endereco;
        }
    }
?>