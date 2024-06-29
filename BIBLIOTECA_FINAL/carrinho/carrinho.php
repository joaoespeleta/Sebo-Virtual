<?php
session_start();

$banco = "../adm/livros.json";
$dados = [];
if (file_exists($banco)) {
    $extrair_dados = file_get_contents($banco);
    $dados = json_decode($extrair_dados, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_livro = (int)$_POST['id_livro'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (!in_array($id_livro, $_SESSION['carrinho'])) {
        $_SESSION['carrinho'][] = $id_livro;
    }
}

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="icon" href="img/logo_semtxt.png" type="image/x-icon">
</head>

<body>
    <!--MENU-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../index.php"><img src="../img/logo_semtxt.png" alt="Logo do Site"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../livros.php" class="dropbtn">Livros</a></li>
                <li><a href="../contato/contato.php">Contato</a></li>
                <li><a href="../carrinho/carrinho.php">Carrinho</a></li>
            </ul>
            <div class="login">
                <a href="../cadastro/usuario.php">Entrar</a>
            </div>
        </nav>
    </header>

    <main>
    <br>
        <center>
            <img src="../img/carrinho.png" alt="carrinho" width="50%">
        </center>
        <br>
        <div class="carrinho-container">
            <h1>Carrinho de Compras</h1>
            <?php if (!empty($carrinho)) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Livro</th>
                            <th>Autor</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carrinho as $id_livro) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($dados[$id_livro]['nome_livro'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($dados[$id_livro]['autor_livro'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><a href="remover_carrinho.php?id=<?php echo $id_livro; ?>" class="btn-remover">Remover</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="finalizar-compra">
                    <form action="finalizar_compra.php" method="post">
                        <button type="submit" class="btn-finalizar">Finalizar Compra</button>
                    </form>
                </div>
            <?php else : ?>
                <p>Seu carrinho está vazio.</p>
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
                    <li><a href="../adm/login_administrador.php">Administrador</a></li>
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