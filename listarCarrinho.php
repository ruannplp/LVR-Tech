<?php
include("conexao.php");

$id_usuario = $_SESSION['usuario_id'];

$comando = $pdo->prepare("SELECT foto, nome_item, raridade, valor FROM carrinho WHERE id_usuario = $id_usuario");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaCarrinho = $comando->fetchAll();
} else {
    echo("Não há itens cadastrados");
}

unset($comando);
unset($pdo);