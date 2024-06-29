<?php

$banco = "adm/livros.json";
$dados = [];
if (file_exists($banco)) {
    $extrair_dados = file_get_contents($banco);
    $dados = json_decode($extrair_dados, true);
}


$id_livro = isset($_GET['id']) ? (int)$_GET['id'] : -1;
$livro = isset($dados[$id_livro]) ? $dados[$id_livro] : null;

if (!$livro) {
    die("Livro não encontrado!");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Livro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/detalhes_livro.css">
    <link rel="icon" href="img/logo_semtxt.png" type="image/x-icon">
</head>
<body>
    <!--MENU-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index.php"><img src="img/logo_semtxt.png" alt="Logo do Site"></a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="livros.php" class="dropbtn">Livros</a></li>
                <li><a href="contato/contato.php">Contato</a></li>
                <li><a href="carrinho/carrinho.php">Carrinho</a></li>
            </ul>
            <div class="login">
                <a href="cadastro/usuario.php">Entrar</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="detalhes-container">
            <h2><?php echo htmlspecialchars($livro['nome_livro'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><strong>Autor:</strong> <?php echo htmlspecialchars($livro['autor_livro'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Editora:</strong> <?php echo htmlspecialchars($livro['editora_livro'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>ISBN:</strong> <?php echo htmlspecialchars($livro['ISBN_livro'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Gênero:</strong> <?php echo htmlspecialchars($livro['genero_livro'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><strong>Sinopse:</strong> <?php echo nl2br(htmlspecialchars($livro['sinopse_livro'], ENT_QUOTES, 'UTF-8')); ?></p>
            <div class="btn-group">
                <form action="carrinho/carrinho.php" method="post" style="display:inline;">
                    <input type="hidden" name="id_livro" value="<?php echo $id_livro; ?>">
                    <button type="submit" class="btn-carrinho">Adicionar ao Carrinho</button>
                </form>
            </div>
        </div>
    </main>

    <!--FOOTER-->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="img/logo_semtxt.png" alt="Logo do Sebo da Criatividade">
            </div>
            <div class="footer-links">
                <h4>Acesso Rápido</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="livros.php">Livros</a></li>
                    <li><a href="contato/contato.php">Contatos</a></li>
                    <li><a href="adm/login_administrador.php">Administrador</a></li>
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