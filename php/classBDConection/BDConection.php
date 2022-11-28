<?php
    class BDConection
    {
        public string $hostname;
        public string $username;
        public string $password;
        public string $database;

        public function __construct()
        {
            $this->hostname = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "contratos";
        }

        public function criarConexao()
        {
            return new mysqli($this->hostname, $this->username, $this->password, $this->database);
        }
    }
?>