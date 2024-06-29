<?php
$banco = "../livros.json";
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados[$id_livro]['nome_livro'] = $_POST['nome_livro'];
    $dados[$id_livro]['autor_livro'] = $_POST['autor_livro'];
    $dados[$id_livro]['editora_livro'] = $_POST['editora_livro'];
    $dados[$id_livro]['ISBN_livro'] = $_POST['ISBN_livro'];
    $dados[$id_livro]['genero_livro'] = $_POST['genero_livro'];
    $dados[$id_livro]['sinopse_livro'] = $_POST['sinopse_livro'];

    file_put_contents($banco, json_encode($dados, JSON_PRETTY_PRINT));
    header("Location: ../detalhes_livro_adm.php?id=$id_livro");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../css/cadastrar_produto.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="icon" href="img/logo_semtxt.png" type="image/x-icon">
</head>

<body>

    <!--MENU_ADM-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../index_adm.php"><img src="../../img/logo_semtxt.png" alt="Logo do Site"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../index_adm.php">Home</a></li>
                <li><a href="../../livros.php">Livros</a></li>
                <li><a href="../cadastrar_produto.php">Cadastrar Livro</a></li>
                <li><a href="../cadastrar_adm.php">Cadastrar ADM</a></li>
            </ul>
            <div class="login">
                <a href="../../index.php">Sair</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="formulario_produto">
            <fieldset>
                <div class="conteudo_formulario_produto">
                    <center><h2>Alterar Produto</h2></center>
                    <br>
                    <hr>
                    <br>
                    <form action="editar_livro.php?id=<?php echo $id_livro; ?>" method="post">
                        <div class="box-user">
                            <label>Nome do Livro:</label>
                            <br><br>
                            <input type="text" name="nome_livro" id="nome_livro" value="<?php echo htmlspecialchars($livro['nome_livro'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <br>
                        <div class="box-user">
                            <label>Autor:</label>
                            <br><br>
                            <input type="text" name="autor_livro" id="autor_livro" value="<?php echo htmlspecialchars($livro['autor_livro'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <br>
                        <div class="box-user">
                            <label>Editora:</label>
                            <br><br>
                            <input type="text" name="editora_livro" id="editora_livro" value="<?php echo htmlspecialchars($livro['editora_livro'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <br>
                        <div class="box-user">
                            <label>ISBN:</label>
                            <br><br>
                            <input type="text" name="ISBN_livro" id="ISBN_livro" value="<?php echo htmlspecialchars($livro['ISBN_livro'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <br>
                        <div class="box-user">
                            <label>Gênero:</label>
                            <br><br>
                            <select name="genero_livro" id="genero_livro" required>
                                <option value="ficcao">Ficção</option>
                                <option value="nao-ficcao">Não-Ficção</option>
                                <option value="fantasia">Fantasia</option>
                                <option value="misterio">Mistério</option>
                                <option value="romance">Romance</option>
                                <option value="aventura">Aventura</option>
                                <option value="biografia">Biografia</option>
                                <option value="ciencia">Ciência</option>
                                <option value="historico">Histórico</option>
                                <option value="auto-ajuda">Auto-ajuda</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <br>
                        <div class="box-user">
                            <label>Sinopse:</label>
                            <br><br>
                            <textarea name="sinopse_livro" id="sinopse_livro" required><?php echo htmlspecialchars($livro['sinopse_livro'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        <br>
                        <input type="submit" value="SALVAR" required>
                </div>
            </fieldset>
            </form>
        </div>
        <br><br>
    </main>

    <!--FOOTER-->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../../img/logo_semtxt.png" alt="Logo do Sebo da Criatividade">
            </div>
            <div class="footer-links">
                <h4>Acesso Rápido</h4>
                <ul>
                    <li><a href="../../index.php">Home</a></li>
                    <li><a href="../../livros.php">Livros</a></li>
                    <li><a href="../../contato/contato.php">Contatos</a></li>
                    <li><a href="../login_administrador.php">Administrador</a></li>
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