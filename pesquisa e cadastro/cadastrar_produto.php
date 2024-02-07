<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Produto</title>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Produto</h2>
        <form action="salvar_cadastro.php" method="post">
            Nome: <input type="text" name="nome"><br>
            Descrição: <input type="text" name="descricao"><br>
            Imagem: <input type="text" name="imagem"><br>
            Categoria: <input type="text" name="categoria"><br>
            Estoque: <input type="text" name="estoque"><br>
            Peso: <input type="text" name="peso"><br>
            Valor: <input type="text" name="valor"><br>
            Validade: <input type="text" name="validade"><br>
            Fornecedor: <input type="text" name="fornecedor"><br>
            Código Fiscal: <input type="text" name="codigo_fiscal"><br>
            <button type="submit" class="button">Cadastrar</button>
        </form>
    </div>
</body>
</html>
