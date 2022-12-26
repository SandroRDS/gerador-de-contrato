<?php
    include "../classBDConection/BDConection.php";

    $json  = file_get_contents('php://input');
    $dados = json_decode($json);
    
    $id     = $dados->id;

    $conexao = new BDConection();
    $mysqli = $conexao->criarConexao();

    $query = "DELETE FROM Usuario WHERE idUsuario = '$id'";
    $mysqli->query($query);
?>