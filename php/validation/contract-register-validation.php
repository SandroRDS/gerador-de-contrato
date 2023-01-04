<?php

    include "../classBDConection/BDConection.php";

    if(isset($_POST["salvar"]))
    {
        $nome_contrato   = $_POST["nome-contrato"];
        $codigo_contrato = $_POST["codigo-contrato"];
        $id_dono         = $_POST["dono-contrato"];
        
        $conexao = new BDConection();
        $mysqli  = $conexao->criarConexao();

        $campos = "idUsuario, nome, codigo";
        $valores = "$id_dono, '$nome_contrato', '$codigo_contrato'";

        $insert = "INSERT INTO Contrato ($campos) VALUES ($valores)";
        $mysqli->query($insert);

        header("Location: ../../dashboard/admin/contratos");
    }
?>