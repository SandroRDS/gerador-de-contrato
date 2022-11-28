<?php
    class BDConection
    {
        public $hostname = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "contratos";

        function criarConexao()
        {
            return new mysqli($this->hostname, $this->username, $this->password, $this->database);
        }
    }
?>