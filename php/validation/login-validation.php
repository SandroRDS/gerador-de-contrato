<?php
    $senha = "";
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
    
    echo password_verify($senha, $senha_criptografada);
?>