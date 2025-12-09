<?php
session_start();
if(!isset($_SESSION['logado'])){ header("Location: index.php"); exit; }

include "conexao.php";

if(!isset($_GET['id'])){
    header('Location: dashboard.php');
    exit;
}

$id = (int) $_GET['id'];

if(isset($_POST['titulo'])){
    $t = mysqli_real_escape_string($con, $_POST['titulo']);
    $a = mysqli_real_escape_string($con, $_POST['autor']);
    $n = (int) $_POST['ano'];
    $e = mysqli_real_escape_string($con, $_POST['editora']);

    $sql2 = "UPDATE livros SET titulo='$t', autor='$a', ano='$n', editora='$e' WHERE id=$id";
    mysqli_query($con, $sql2);
    header("Location: dashboard.php");
    exit;
}

$sql = "SELECT * FROM livros WHERE id = $id";
$res = mysqli_query($con, $sql);
$livro = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Editar Livro</h2>

    <form method="POST">
        <label>Título:</label><br>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required><br>

        <label>Autor:</label><br>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required><br>

        <label>Ano:</label><br>
        <input type="number" name="ano" value="<?= $livro['ano'] ?>" required><br>

        <label>Editora:</label><br>
        <input type="text" name="editora" value="<?= htmlspecialchars($livro['editora']) ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
        <a class="btn" href="dashboard.php">Voltar</a>
    </form>
</div>
</body>
</html>
