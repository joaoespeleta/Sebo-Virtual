<?php
$mensagem_erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario_adm'];
    $senha = $_POST['senha_adm'];
    
    $banco = "administrador.json";
    
    if (file_exists($banco)) {
        $extrair_dados = file_get_contents($banco);
        $dados = json_decode($extrair_dados, true);
        
        $login_valido = false;
        foreach ($dados as $admin) {
            if ($admin['usuario_adm'] == $usuario && $admin['senha_adm'] == $senha) {
                $login_valido = true;
                break;
            }
        }
        
        if ($login_valido) {
            header("Location: index_adm.php");
            exit();
        } else {
            $mensagem_erro = "Usuário ou senha inválidos. Por favor, realize o cadastro.";
        }
    } else {
        $mensagem_erro = "Realize o cadastro!";
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
            <h2>Login Administrador</h2>
            <p> Ainda não é administrador? <a href="cadastrar_adm.php"> Cadastro </a> </p>
            <form action="#" method="post">
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
                <div class="input-group">
                <p><?php echo $mensagem_erro; ?></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>