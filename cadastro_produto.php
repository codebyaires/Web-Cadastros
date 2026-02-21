<?php
// Iniciar a sessão
session_start();
require_once "logado.php";

// Incluir o arquivo de conexão com o banco
require_once "conexao.php";

// Variáveis para mensagens
$sucesso = "";
$erro = "";

// Verificar se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recebendo dados
    $nome       = trim($_POST["nome"] ?? '');
    $quantidade = intval($_POST["quantidade"] ?? 0);
    $valor      = floatval($_POST["valor"] ?? 0);

    // Verificar se o PRODUTO (nome) já existe, em vez da quantidade
    $sql_check = "SELECT id FROM produto WHERE nome = ?";
    $stmt_check = mysqli_prepare($conexao, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $nome);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $erro = "Este produto já está cadastrado.";
    } else {
        // Inserir o novo produto com Prepared Statements
        $sql = "INSERT INTO produto (nome, quantidade, valor) VALUES (?, ?, ?)";
        
        if ($stmt = mysqli_prepare($conexao, $sql)) {
            // "sid" = string (nome), integer (quantidade), double (valor)
            mysqli_stmt_bind_param($stmt, "sid", $nome, $quantidade, $valor);
            
            if (mysqli_stmt_execute($stmt)) {
                $sucesso = "Produto cadastrado com sucesso!";
            } else {
                $erro = "Erro ao cadastrar produto no banco de dados.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_stmt_close($stmt_check);
}

// Buscar todos os produtos para listar
$sql = "SELECT id, nome, quantidade, valor, criado_em FROM produto ORDER BY id DESC";
$produtos = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto — Projeto SENAI</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100 min-h-screen flex">

    <?php require_once "menu.php";?>

    <main class="ml-64 flex-1 p-8">

        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Cadastrar Produto</h2>
            <p class="text-gray-500 mt-1">Preencha os dados abaixo para criar um novo produto no estoque.</p>
        </div>

        <?php if (!empty($sucesso)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <?php echo $sucesso; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($erro)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8 max-w-xl">
            <form method="POST" action="">

                <div class="mb-4">
                    <label for="nome" class="block text-gray-700 font-medium mb-2">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" required placeholder="Ex: Teclado Mecânico"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label for="quantidade" class="block text-gray-700 font-medium mb-2">Quantidade em Estoque</label>
                    <input type="number" id="quantidade" name="quantidade" required min="0" placeholder="Ex: 50"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label for="valor" class="block text-gray-700 font-medium mb-2">Valor Unitário (R$)</label>
                    <input type="number" step="0.01" id="valor" name="valor" required min="0" placeholder="Ex: 199.90"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-medium hover:bg-blue-700 transition duration-200">
                    Cadastrar Produto
                </button>

            </form>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Produtos Cadastrados</h3>
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-4 py-3 text-left rounded-tl-lg">ID</th>
                        <th class="px-4 py-3 text-left">Nome</th>
                        <th class="px-4 py-3 text-left">Quantidade</th>
                        <th class="px-4 py-3 text-left rounded-tr-lg">Valor (R$)</th>
                        <th class="px-4 py-3 text-left rounded-tr-lg">Criado em</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($produtos) > 0): ?>
                        <?php while ($p = mysqli_fetch_assoc($produtos)): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3"><?php echo $p["id"]; ?></td>
                                <td class="px-4 py-3"><?php echo htmlspecialchars($p["nome"]); ?></td>
                                <td class="px-4 py-3"><?php echo $p["quantidade"]; ?> un.</td>
                                <td class="px-4 py-3">R$ <?php echo number_format($p["valor"], 2, ',', '.'); ?></td>
                                <td class="px-4 py-3 text-gray-500"><?php echo $p["criado_em"]; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-500">Nenhum produto cadastrado ainda.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>