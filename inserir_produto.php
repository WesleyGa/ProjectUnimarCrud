<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inserir Produto</title>
    <link rel="stylesheet" type="text/css" href="inserir_produto.css">
</head>
<body>
    <div class="container">
        <h1>Inserir Produto</h1>
        <form action="insercao.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao"></textarea>
            <label for="preco">Preço:</label>
            <input type="text" name="preco" required>
            <button type="submit">Inserir Produto</button>
        </form>
        <a href="listar_produtos.php">Ver Lista de Produtos</a>
    </div>
</body>
</html>