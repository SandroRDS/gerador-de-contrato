<?php
    include "../classBDConection/BDConection.php";

    $id      = $_GET["id"];
    $campos  = explode(",", $_GET["campos"]);
    $valores = explode(",", $_GET["valores"]);

    $conexao = new BDConection();
    $mysqli = $conexao->criarConexao();

    $query = "UPDATE Usuario SET";

    for($i = 0; $i < count($campos); $i++)
    {
        $query .= " ". $campos[$i] ." = '". $valores[$i] ."'";
    }

    $query .= " WHERE idUsuario = '$id'";

    var_dump($query);

    $mysqli->query($query);

    $url = $_SERVER["HTTP_REFERER"];
    header("Location: $url");
?>