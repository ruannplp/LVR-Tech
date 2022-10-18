<?php

session_start();
unset($_SESSION['usuario_id'], $_SESSION['nome_usuario']);

header("Location: telaLogin.html");

?>