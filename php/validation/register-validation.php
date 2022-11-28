<?php
    include "php-classes/BDConection.php";

    $conection = new BDConection();
    $mysqli = $conection->criarConexao();

    $result = $mysqli->query("SELECT * FROM usuario");
    
    while($linha = $result->fetch_array(MYSQLI_ASSOC))
    {
        var_dump($linha);
    }
?>