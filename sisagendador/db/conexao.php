<?php

    // Acesso a página de configurações
    include("config.php");

    $conexao = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die("Erro na conexão com o servidor! " . mysqli_connect_error());

?>