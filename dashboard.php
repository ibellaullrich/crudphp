<?php
session_start();
if(!isset($_SESSION['logado'])){ 
    header("Location: index.php"); 
    exit;
}

include "conexao.php";

$busca = "";
if(isset($_GET['busca'])){
    $busca = $_GET['busca'];
}

$sql = "SELECT * FROM livros WHERE titulo LIKE '%$busca%' ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biblioteca - Dashboard</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Lista de Livros</h2>

    <form method="GET" class="search-form">
        <input type="text" name="busca" placeholder="Pesquisar título..." value="<?= htmlspecialchars($busca) ?>">
        <button type="submit">Buscar</button>
        <a class="btn" href="cadastrar.php">Cadastrar Novo Livro</a>
        <a class="btn btn-red" href="logout.php">Sair</a>
    </form>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Editora</th>
            <th>Ações</th>
        </tr>

        <?php while($livro = mysqli_fetch_assoc($res)){ ?>
            <tr>
                <td><?= $livro['id'] ?></td>
                <td><?= htmlspecialchars($livro['titulo']) ?></td>
                <td><?= htmlspecialchars($livro['autor']) ?></td>
                <td><?= $livro['ano'] ?></td>
                <td><?= htmlspecialchars($livro['editora']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $livro['id'] ?>">Editar</a> |
                    <a href="excluir.php?id=<?= $livro['id'] ?>" onclick="return confirm('Excluir este livro?')">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
