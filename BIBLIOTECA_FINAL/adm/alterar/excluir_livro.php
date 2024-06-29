<?php
$banco = "../livros.json";
$dados = [];
if (file_exists($banco)) {
    $extrair_dados = file_get_contents($banco);
    $dados = json_decode($extrair_dados, true);
}

$id_livro = isset($_POST['id']) ? (int)$_POST['id'] : -1;

if ($id_livro >= 0 && isset($dados[$id_livro])) {
    unset($dados[$id_livro]);

    $dados = array_values($dados);

    file_put_contents($banco, json_encode($dados, JSON_PRETTY_PRINT));
}

header("Location: ../index_adm.php");
exit;
?>
