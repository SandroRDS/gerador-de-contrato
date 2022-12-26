<?php
    include "../classBDConection/BDConection.php";

    $json  = file_get_contents('php://input');
    $dados = json_decode($json);
    
    $id     = $dados->id;
    $estado = $dados->estado;

    $conexao = new BDConection();
    $mysqli = $conexao->criarConexao();

    $query = "UPDATE Usuario SET ativo = $estado WHERE idUsuario = '$id'";
    $mysqli->query($query);
?>