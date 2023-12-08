<?php
include 'conecta.php';

// Verifica se o ID do produto foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtém os detalhes do produto a ser editado
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $produto = $resultado->fetch_assoc();
    } else {
        echo "Produto não encontrado.";
        exit();
    }
} else {
    echo "ID do produto não fornecido.";
    exit();
}

// Processa a atualização do produto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $sqlAtualizacao = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', preco = '$preco' WHERE id = $id";

    if ($conn->query($sqlAtualizacao) === TRUE) {
        header("Location: listar_produtos.php");
        exit();
    } else {
        echo "Erro ao atualizar produto: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" type="text/css" href="editar_produto.css">
</head>

<body>
    <div class="container">
        <h1>Editar Produto</h1>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" value="<?php echo $produto['preco']; ?>" required>
            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="listar_produtos.php">Voltar para a Lista de Produtos</a>
    </div>
</body>

</html>