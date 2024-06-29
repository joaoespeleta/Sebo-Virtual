<?php

$banco = "livros.json";
$dados = [];
if (file_exists($banco)) {
    $extrair_dados = file_get_contents($banco);
    $dados = json_decode($extrair_dados, true);
}


$limitar_livros = 100000; 
$livros_exibidos = array_slice($dados, 0, $limitar_livros);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sebo da Criatividade - ADM</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="icon" href="../img/logo_semtxt.png" type="image/x-icon">
</head>

<body>
    <!--MENU_ADM-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index_adm.php"><img src="../img/logo_semtxt.png" alt="Logo do Site"></a>
            </div>
            <ul class="nav-links">
                <li><a href="index_adm.php">Home</a></li>
                <li><a href="../livros.php">Livros</a></li>
                <li><a href="cadastrar_produto.php">Cadastrar Livro</a></li>
                <li><a href="cadastrar_adm.php">Cadastrar ADM</a></li>
            </ul>
            <div class="login">
                <a href="../index.php">Sair</a>
            </div>
        </nav>
    </header>

    <main>
        <br>
        <center><h1>Lista de Livros</h1></center>
        <br>
        <br>
        <div class="card-container">
            <?php if (!empty($livros_exibidos)) : ?>
                <?php foreach ($livros_exibidos as $index => $livro) : ?>
                    <div class="card">
                        <h3><?php echo htmlspecialchars($livro['nome_livro'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($livro['autor_livro'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <a href="detalhes_livro_adm.php?id=<?php echo $index; ?>">Saiba mais</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Nenhum livro cadastrado.</p>
            <?php endif; ?>
        </div>
    </main>

    <!--FOOTER-->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../img/logo_semtxt.png" alt="Logo do Sebo da Criatividade">
            </div>
            <div class="footer-links">
                <h4>Acesso Rápido</h4>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../livros.php">Livros</a></li>
                    <li><a href="../contato/contato.php">Contatos</a></li>
                    <li><a href="login_administrador.php">Administrador</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Contato</h4>
                <p>Telefone: (99) 9999-9999</p>
                <p>Localização: Rua Exemplo, 123, Cidade, Estado</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Sebo da Criatividade | Todos os direitos reservados.</p>
        </div>
    </footer>
</body>

</html>