<?php
    include "../classBDConection/BDConection.php";

    $id      = $_GET["id"];

    $conexao = new BDConection();
    $mysqli = $conexao->criarConexao();

    $query = "DELETE FROM Usuario WHERE idUsuario = '$id'";
    $mysqli->query($query);

    $url = $_SERVER["HTTP_REFERER"];
    header("Location: $url");
?>