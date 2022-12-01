<?php
    class BDConection
    {
        public string $hostname;
        public string $username;
        public string $password;
        public string $database;

        public function __construct()
        {
            $this->hostname = "sql206.epizy.com";
            $this->username = "epiz_33089052";
            $this->password = "HdIgzUQGu1qV";
            $this->database = "epiz_33089052_codigin_contratos";
        }

        public function criarConexao()
        {
            return new mysqli($this->hostname, $this->username, $this->password, $this->database);
        }
    }
?>