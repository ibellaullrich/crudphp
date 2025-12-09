<?php
session_start();
if(!isset($_SESSION['logado'])){ header("Location: index.php"); exit; }

include "conexao.php";

if(isset($_POST['titulo'])){
    $t = mysqli_real_escape_string($con, $_POST['titulo']);
    $a = mysqli_real_escape_string($con, $_POST['autor']);
    $n = (int) $_POST['ano'];
    $e = mysqli_real_escape_string($con, $_POST['editora']);

    $sql = "INSERT INTO livros (titulo, autor, ano, editora)
            VALUES ('$t','$a','$n','$e')";

    mysqli_query($con, $sql);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Cadastrar Livro</h2>

    <form method="POST">
        <label>Título:</label><br>
        <input type="text" name="titulo" required><br>

        <label>Autor:</label><br>
        <input type="text" name="autor" required><br>

        <label>Ano:</label><br>
        <input type="number" name="ano" required><br>

        <label>Editora:</label><br>
        <input type="text" name="editora" required><br><br>

        <button type="submit">Salvar</button>
        <a class="btn" href="dashboard.php">Voltar</a>
    </form>
</div>
</body>
</html>
