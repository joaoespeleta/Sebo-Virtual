<?php

        $mensagem = "";
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $nome = $_POST['nome_contato'];
            $telefone = $_POST['telefone_contato'];
            $email = $_POST['email_contato'];
            $mensagem = $_POST['mensagem_contato'];
            
            $banco = "contato.json";
            $dados = [];
            if(file_exists($banco)){
                $extrair_dados = file_get_contents($banco);
                $dados = json_decode($extrair_dados , true);
            }
            $novo_dado = [
                'nome_contato' => $nome,
                'telefone_contato' => $telefone,
                'email_contato' => $email,
                'mensagem_contato' => $mensagem
            ];
            $dados[] = $novo_dado;
            $json = json_encode($dados);
            if(file_put_contents($banco, $json)){
                $mensagem = "Dados cadastrados com sucesso!";
            }
        }
    ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sebo da Criatividade</title>
    <link rel="stylesheet" href="contato.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="contato.css">
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
                <li><a href="contato.php">Contato</a></li>
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
            <img src="../img/contato.png" alt="contato" width="50%">
        </center>
        <br><br><br>
        <div class="box01">
            <div class="left w-50">
                <h2>ONDE ESTAMOS</h2>
                <br>
                <hr>
                <br>
                <div class="box_informacao">
                    <img src="../img/icons8-localização-50.png" alt="">
                    <p>Rua Exemplo, 123, Cidade, Estado</p>
                </div>
                <div class="box_informacao">
                    <img src="../img/icons8-enviar-50.png" alt="">
                    <p>sebodacriatividade@gmail.com</p>
                </div>
                <div class="box_informacao">
                    <img src="../img/icons8-telefone-desligado-50.png" alt="">
                    <p>(99) 99999-9999</p>
                </div>
            </div>
            <div class="right w-50">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167997.4730241962!2d2.182229465247681!3d48.85896330357295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2zUGFyaXMsIEZyYW7Dp2E!5e0!3m2!1spt-BR!2sbr!4v1719618595455!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="box02">
            <br><br><br>
            <center>
                <h3>VOCÊ TAMBÉM PODE NOS CONTATAR UTILIZANDO O FORMULÁRIO:</h3>
            </center>
            <br><br>
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <br>
                <input type="text" name="nome_contato" id="nome_contato">
                <br>
                <label for="nome">Telefone:</label>
                <br>
                <input type="text" name="telefone_contato" id="telefone_contato">
                <br>
                <label for="nome">E-mail:</label>
                <br>
                <input type="text" name="email_contato" id="email_contato">
                <br>
                <label for="nome">Mensagem:</label>
                <br>
                <input type="" name="mensagem_contato" id="mensagem_contato" class="textarea">
                <br>
                <br>
                <center><input type="submit" value="ENVIAR"></center>
            </form>
            <center><p><?php echo $mensagem ?></p></center>
            <br><br>
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
                    <li><a href="contato.php">Contatos</a></li>
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