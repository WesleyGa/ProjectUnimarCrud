<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" type="text/css" href="listar_produtos.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <a href="inserir_produto.php">Inserir Novo Produto</a>
        <ul>
            <?php
            include 'conecta.php';

            $sql = "SELECT * FROM produtos";
            $resultado = $conn->query($sql);

            while ($produto = $resultado->fetch_assoc()) {
                echo "<li>";
                echo "<strong>{$produto['nome']}</strong>";
                echo "<p>{$produto['descricao']}</p>";
                echo "<p>Preço: R$ {$produto['preco']}</p>";
                echo "<a href='editar_produto.php?id={$produto['id']}'>Editar</a>";
                echo "<a href='excluir_produto.php?id={$produto['id']}'>Excluir</a>";
                echo "</li>";   
            }
            ?>
        </ul>
    </div>
</body>
</html>