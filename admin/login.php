<?php
// Codigo PHP para o login
// Ativa se receber o botão
declare(strict_types= 1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../includes/helpers.php';

if(admin_logged_in()){
    header('Location: dashboard.php');
    exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios_admin WHERE email = ? AND 
    ativo = 1 LIMIT 1');
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if($admin && password_verify($senha, $admin['senha'])){
        $_SESSION['admin_id'] = $admin ['id'];
        $_SESSION['admin_nome'] = $admin['nome'];
        header('Location: dashboard.php');
        exit;
    }
    $error = 'E-mail ou senha inválido';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#0f172a,#111827,#1e293b);
    overflow:hidden;
}

.container{
    display:flex;
    width:100%;
    height:100vh;
}

/* Lado esquerdo */
.login-box{
    width:40%;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px;
}

.form-container{
    width:100%;
    max-width:420px;
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,0.1);
    border-radius:25px;
    padding:45px;
    box-shadow:0 15px 35px rgba(0,0,0,0.4);
}

.form-container h1{
    color:#fff;
    font-size:2.8rem;
    margin-bottom:10px;
}

.form-container p{
    color:#9ca3af;
    margin-bottom:35px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    color:#d1d5db;
    font-size:14px;
    font-weight:500;
}

.form-group input{
    width:100%;
    height:55px;
    border:none;
    border-radius:12px;
    padding:0 15px;
    background:rgba(255,255,255,0.08);
    color:#fff;
    font-size:15px;
    transition:0.3s;
}

.form-group input:focus{
    outline:none;
    background:rgba(255,255,255,0.12);
    box-shadow:0 0 0 3px rgba(123,97,255,0.4);
}

.form-group input::placeholder{
    color:#9ca3af;
}

.btn-login{
    width:100%;
    height:55px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#7b61ff,#a855f7,#ec4899);
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
    margin-top:10px;
}

.btn-login:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(168,85,247,0.4);
}

.btn-login:active{
    transform:translateY(0);
}

/* Mensagem de erro */
.error{
    background:rgba(239,68,68,0.15);
    border:1px solid rgba(239,68,68,0.3);
    color:#fca5a5;
    padding:12px;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
}

/* Lado direito */
.image-side{
    width:60%;
    background-image:url('foto_carrossel1.jpg');
    background-size:cover;
    background-position:center;
    position:relative;
}

.image-side::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        to left,
        rgba(0,0,0,0.2),
        rgba(0,0,0,0.5)
    );
}

/* Rodapé */
.footer{
    position:fixed;
    bottom:15px;
    left:0;
    width:100%;
    text-align:center;
    color:#9ca3af;
    font-size:13px;
    letter-spacing:1px;
}

/* Responsivo */
@media(max-width:900px){

    .image-side{
        display:none;
    }

    .login-box{
        width:100%;
    }

    .form-container{
        max-width:450px;
    }

    .form-container h1{
        font-size:2.2rem;
    }
}

</style>

</head>
<body>

<div class="container">

    <div class="login-box">
        <div class="form-container">

            <h1>Faça seu Login</h1>
            <p>Insira suas credenciais para acessar o painel</p>

            <?php if (!empty($error)): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required>
                </div>

                <button type="submit" class="btn-login">
                    Entrar
                </button>

            </form>

        </div>
    </div>

    <div class="image-side"></div>

</div>

<div class="footer">
    2025 | Desenvolvido por Eduardo Cezar Borges
</div>

</body>
</html>