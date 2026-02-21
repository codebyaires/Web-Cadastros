
<aside class="w-64 bg-gray-800 min-h-screen fixed left-0 top-0">

<!-- Logo / Título -->
<div class="bg-gray-900 px-6 py-4">
    <h1 class="text-white font-bold text-lg">Projeto SENAI</h1>
</div>

<!-- Navegação -->
<nav class="mt-6">
    <a href="cadastro_usuario.php" class="flex items-center px-6 py-3 text-white bg-gray-700">
        <span class="mr-3">📋</span>
        Cadastrar Usuário
    </a>
    <a href="cadastro_cliente.php" class="flex items-center px-6 py-3 text-white bg-gray-700">
        <span class="mr-3">📋</span>
        Cadastrar Cliente
    </a>
    <a href="cadastro_produto.php" class="flex items-center px-6 py-3 text-white bg-gray-700">
        <span class="mr-3">📋</span>
        Cadastrar Produto
    </a>
    <a href="logout.php" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition">
        <span class="mr-3">🚪</span>
        Sair
    </a>
</nav>

<!-- Usuário logado -->
<div class="absolute bottom-0 w-full px-6 py-4 bg-gray-900">
    <p class="text-gray-400 text-xs">Logado como:</p>
    <p class="text-white text-sm font-medium"><?php echo $_SESSION["usuario_nome"]; ?></p>
</div>

</aside>