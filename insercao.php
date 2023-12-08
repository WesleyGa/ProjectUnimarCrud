<?php
include 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', '$preco')";

    if ($conn->query($sql) === TRUE) {
        header("Location: listar_produtos.php");
        exit();
    } else {
        echo "Erro ao inserir produto: " . $conn->error;
    }

    $conn->close();
}
?>
