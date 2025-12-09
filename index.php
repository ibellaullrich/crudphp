<?php
session_start();

// usuario e senha fixos
$USER = "admin";
$PASS = "123";

if(isset($_POST['usuario'])){
    if($_POST['usuario'] == $USER && $_POST['senha'] == $PASS){
        $_SESSION['logado'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Biblioteca</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="centered">
    <h2>Login</h2>

    <?php if(isset($erro)) echo "<p class='erro'>$erro</p>"; ?>

    <form method="POST">
        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
