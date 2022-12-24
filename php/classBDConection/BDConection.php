<?php
    class BDConection
    {
        public string $hostname;
        public string $username;
        public string $password;
        public string $database;

        public function __construct($tipo = 2)
        {
            if($tipo == 1)
            {
                $this->hostname = "sql206.epizy.com";
                $this->username = "epiz_33089052";
                $this->password = "HdIgzUQGu1qV";
                $this->database = "epiz_33089052_codigin_contratos";
            }
            else
            {
                $this->hostname = "localhost";
                $this->username = "root";
                $this->password = "";
                $this->database = "contratos";
            }
        }

        public function criarConexao()
        {
            return new mysqli($this->hostname, $this->username, $this->password, $this->database);
        }
    }
?>