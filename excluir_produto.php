<?php
include 'conecta.php';

// Verifica se o ID do produto foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exclui o produto do banco de dados
    $sqlExclusao = "DELETE FROM produtos WHERE id = $id";

    if ($conn->query($sqlExclusao) === TRUE) {
        // Redireciona para a lista de produtos após a exclusão
        header("Location: listar_produtos.php");
        exit();
    } else {
        echo "Erro ao excluir produto: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID do produto não fornecido.";
    exit();
}
?>