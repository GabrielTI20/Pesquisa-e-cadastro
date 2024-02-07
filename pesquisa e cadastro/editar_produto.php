<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Editar Produto</title>
   
</head>
<body>
    <div class="container">
        <h2>Editar Produto</h2>
        <?php
        

        try {
            include 'banco.php';
            // Verifica se o formulário foi submetido
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recebe o código de barras do formulário
                $codigo_barras = $_POST["codigo_barras"];

                // Consulta o banco de dados para obter informações sobre o produto com o código de barras fornecido
                $stmt = $conn->prepare("SELECT * FROM tb_produtos WHERE codigo_barras = :codigo_barras");
                $stmt->bindParam(':codigo_barras', $codigo_barras);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($result) {
                    // Exibe os dados do produto para edição
                    foreach($result as $row) {
                        echo "<form action='salvar_edicao.php' method='post'>";
                        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                        echo "Nome: <input type='text' name='nome' value='" . $row["nome"] . "'><br>";
                        echo "Descrição: <input type='text' name='descricao' value='" . $row["descricao"] . "'><br>";
                        echo "Imagem: <input type='text' name='imagem' value='" . $row["imagem"] . "'><br>";
                        echo "Categoria: <input type='text' name='categoria' value='" . $row["categoria"] . "'><br>";
                        echo "Estoque: <input type='text' name='estoque' value='" . $row["estoque"] . "'><br>";
                        echo "Peso: <input type='text' name='peso' value='" . $row["peso"] . "'><br>";
                        echo "Valor: <input type='text' name='valor' value='" . $row["valor"] . "'><br>";
                        echo "Validade: <input type='text' name='validade' value='" . $row["validade"] . "'><br>";
                        echo "Fornecedor: <input type='text' name='fornecedor' value='" . $row["fornecedor"] . "'><br>";
                        echo "Código Fiscal: <input type='text' name='codigo_fiscal' value='" . $row["codigo_fiscal"] . "'><br>";
                    }
                    echo "<button type='submit' class='button'>Salvar</button>"; // Botão estilizado
                    echo "</form>";
                } else {
                    echo "Produto não encontrado.";
                    echo '<br><br>';
                    echo "<a href='pesquisar_produto.php' class='button'>Voltar para a pesquisa</a>";
                    
                }
            }
        } catch(PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
        $conn = null;
        ?>
    </div>
</body>
</html>
