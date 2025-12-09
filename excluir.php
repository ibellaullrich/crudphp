<?php
session_start();
if(!isset($_SESSION['logado'])){ header("Location: index.php"); exit; }

include "conexao.php";

if(!isset($_GET['id'])){
    header('Location: dashboard.php');
    exit;
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM livros WHERE id = $id";
mysqli_query($con, $sql);

header("Location: dashboard.php");
exit;
?>
