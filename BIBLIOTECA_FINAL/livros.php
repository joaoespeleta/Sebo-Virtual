<?php

$banco = "adm/livros.json";
$dados = [];
if (file_exists($banco)) {
    $extrair_dados = file_get_contents($banco);
    $dados = json_decode($extrair_dados, true);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sebo da Criatividade - Livros</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/card.css">
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
        <br>
        <center>
            <img src="img/livros.png" alt="livros" width="50%">
        </center>
        <br>
        <div class="card-container">
            <?php if (!empty($dados)): ?>
                <?php foreach ($dados as $index => $livro){ ?>
                    <div class="card">
                        <h3><?php echo htmlspecialchars($livro['nome_livro'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($livro['autor_livro'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <a href="detalhes_livro.php?id=<?php echo $index; ?>">Saiba mais</a>
                    </div>
                <?php }; ?>
            <?php else: ?>
                <p>Nenhum livro cadastrado.</p>
            <?php endif; ?>
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
