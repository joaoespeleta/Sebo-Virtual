<?php
session_start();

if (empty($_SESSION['carrinho'])) {
    header('Location: carrinho.php');
    exit;
}

unset($_SESSION['carrinho']);

header('Location: obrigado.php');
exit;