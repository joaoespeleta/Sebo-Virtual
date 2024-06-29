<?php
session_start();

if (isset($_GET['id'])) {
    $id_livro = (int)$_GET['id'];
    
    if (isset($_SESSION['carrinho'])) {
        $key = array_search($id_livro, $_SESSION['carrinho']);
        if ($key !== false) {
            unset($_SESSION['carrinho'][$key]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }
    }
}

header('Location: carrinho.php');
exit();
