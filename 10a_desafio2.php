<!-- Digite sua solução para o desafio (AQUI) --> 
<?php

// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "Senai@118";
$banco = "exercicio";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $preco = $_POST["preco"];

    // Validação do nome
    if (empty($nome)) {
        $mensagem = "Erro: O nome do produto não pode estar vazio.";
    }

    // Validação do preço
    elseif (!is_numeric($preco) || $preco <= 0) {
        $mensagem = "Erro: O preço deve ser um número positivo.";
    }

    // Se tudo estiver correto, insere no banco
    else {
        $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sd", $nome, $preco);

        if ($stmt->execute()) {
            $mensagem = "Produto cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar o produto.";
        }

        $stmt->close();
    }
}

$conexao->close();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>

<body>

    <h1>Cadastro de Produtos</h1>

    <?php if ($mensagem != ""): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form method="POST">

        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" id="preco" name="preco" step="0.01"><br><br>

        <button type="submit">Cadastrar Produto</button>

    </form>

</body>
</html>