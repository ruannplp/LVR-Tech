<?php
include("conexao.php");

$id_usuario = $_SESSION['usuario_id'];

$comando = $pdo->prepare("SELECT id_item, foto, nome_item, raridade, valor FROM carrinho WHERE id_usuario = $id_usuario");

$comando->execute();

if ($comando->rowCount() >= 1) {
    $listaCarrinho = $comando->fetchAll();
} else {
    echo "<p style='color: white'> O carrinho está vazio. <a href='telaInicial_Backup.php?filtro1=1'> Navegar</a></p>";
}

unset($comando);
unset($pdo);