<?php

        $mensagem = "";
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $nome = $_POST['nome_adm'];
            $usuario = $_POST['usuario_adm'];
            $senha = $_POST['senha_adm'];
            
            $banco = "administrador.json";
            $dados = [];
            if(file_exists($banco)){
                $extrair_dados = file_get_contents($banco);
                $dados = json_decode($extrair_dados , true);
            }
            $novo_dado = [
                'nome_adm' => $nome,
                'usuario_adm' => $usuario,
                'senha_adm' => $senha
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cadastro/usuario.css">
    <title>Sebo da Criatividade</title>
    <link rel="icon" href="../img/logo_semtxt.png" type="image/x-icon">
</head>

<body>
    <div class="box">
        <div class="img-box">
            <img src="../img/logo_comtxt.png">
        </div>
        <div class="form-box">
            <h2>Administrador</h2>
            <p> Já é um administrador? <a href="login_administrador.php"> Login </a> </p>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="nome"> Nome Completo</label>
                    <input type="text" id="nome_adm" name="nome_adm" placeholder="Digite o seu nome completo" required>
                </div>

                <div class="input-group">
                    <label for="email">Usuário</label>
                    <input type="text" id="usuario_adm" name="usuario_adm" placeholder="Digite o seu email" required>
                </div>


                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha_adm" name="senha_adm" placeholder="Digite sua senha" required>
                </div>
                <div class="input-group">
                    <button>Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>