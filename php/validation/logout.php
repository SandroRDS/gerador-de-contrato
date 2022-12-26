<?php
    setcookie("user[identify]", "", time() - 1, "/");
    setcookie("user[level]", "", time() - 1, "/");

    header("Location: /gerador-de-contratos/index.php");
?>