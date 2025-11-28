<?php 

namespace Aula_17;

require_once __DIR__. '\\..\\Controller\\LivroController.php';
$controller = new LivroController();

// Processar ações do formulário
if ($_SERVER ['REQUEST_METHOD'] === 'POST'){ 
    $acao = $_POST['acao'] ?? ''; 
    if ($acao === 'criar'){ 
        $controller->criar(
            $_POST['titulo'],
            $_POST['genero'],
            $_POST['Autor'],
            $_POST['Ano'],
            $_POST['qtde']
        );
    } elseif ($acao === 'deletar'){
        $controller->deletar($_POST['titulo']); 
    }
}

// Processar busca
$termoBusca = $_GET['busca'] ?? '';
if (!empty($termoBusca)) {
    $livros = $controller->buscarLivros($termoBusca);
} else {
    $livros = $controller->ler();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de livros</title>
</head>
<body>
   <style>
    /* Estilos Gerais */
    body { 
        font-family: 'Georgia', serif;
        padding: 40px; 
        background-color: #f7f3e8;
        color: #3e2723;
    }
    
    h1, h2 { 
        color: #5d4037;
        border-bottom: 3px solid #bcaaa4;
        padding-bottom: 12px;
        margin-top: 30px;
        font-weight: normal;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Estilo do Formulário de Cadastro */
    form { 
        background-color: #ffffff;
        padding: 30px; 
        border-radius: 6px; 
        max-width: 650px; 
        margin: 25px 0; 
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #d7ccc8;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .form-group {
        flex-grow: 1;
        min-width: 200px;
        display: flex;
        flex-direction: column;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #5d4037;
        font-size: 15px;
    }

    input[type="text"], input[type="number"], select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #a1887f;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        background-color: #fff8e1;
        color: #3e2723;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus, input[type="number"]:focus, select:focus {
        border-color: #795548;
        outline: none;
        box-shadow: 0 0 0 2px rgba(121, 85, 72, 0.2);
    }
    
    /* Botão de Cadastro */
    .btn-cadastrar {
        height: 40px; 
        padding: 0 25px;
        background-color: #795548 !important;
        color: white !important; 
        border: none !important; 
        border-radius: 4px !important; 
        cursor: pointer !important;
        font-weight: bold !important;
        transition: background-color 0.3s, transform 0.1s;
        align-self: flex-end; 
        text-transform: uppercase;
    }
    .btn-cadastrar:hover {
        background-color: #5d4037 !important;
        transform: translateY(-1px);
    }

    /* Barra de Busca */
    .search-container {
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 6px;
        max-width: 650px;
        margin: 25px 0;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #d7ccc8;
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .search-container input[type="text"] {
        flex: 1;
        margin: 0;
    }

    .btn-buscar {
        padding: 10px 25px;
        background-color: #795548;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s;
        white-space: nowrap;
    }

    .btn-buscar:hover {
        background-color: #5d4037;
    }

    .btn-limpar {
        padding: 10px 20px;
        background-color: #bcaaa4;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-limpar:hover {
        background-color: #a1887f;
    }

    .resultado-busca {
        color: #5d4037;
        font-style: italic;
        margin: 10px 0;
    }

    /* Estilo da Tabela de Livros */
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 5px;
        margin-top: 30px;
        background-color: transparent; 
    }
    
    thead th {
        background-color: #5d4037;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        border: none;
        padding: 15px;
    }

    tbody tr {
        background-color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s;
    }

    tbody tr:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: none;
    }
    
    tr:nth-child(even) {
        background-color: #ffffff; 
    }

    /* Estilo dos Botões de Ações */
    td:last-child {
        white-space: nowrap; 
        width: 1%;
    }

    .form-acao {
        background: none !important; 
        padding: 0 !important; 
        box-shadow: none !important; 
        display: inline-block !important; 
        margin: 0 5px 0 0;
    }
    
    .form-acao button[type="submit"] {
        padding: 7px 10px; 
        border: 1px solid #795548;
        border-radius: 4px; 
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
        font-size: 13px;
        text-transform: uppercase;
    }
    
    /* Botão Excluir */
    .btn-deletar {
        background-color: #fff; 
        color: #795548;
    }
    .btn-deletar:hover {
        background-color: #bcaaa4 !important;
        color: white !important;
        border-color: #bcaaa4;
    }

    /* Botão Editar */
    .btn-editar {
        background-color: #795548; 
        color: white;
    }
    .btn-editar:hover {
        background-color: #5d4037;
        border-color: #5d4037;
    }
</style>


    <h1>Formulário para preenchimento de livros</h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="criar">
        <input type="text" name="titulo" placeholder="Titulo de livro:" required>
        <select name="genero" required>
            <option value="">Selecione a Genero</option>
            <option value="Aventura">Aventura</option>
            <option value="Romance">Romance</option>
            <option value="Literatura Brasileira">Literatura Brasileira</option>
            <option value="Terror">Terror</option>
            <option value="Suspense">Suspense</option>
            <option value="Comedia">Comedia</option>
            <option value="Fantasia">Fantasia</option>
        </select>
        <input type="text" name="Autor" placeholder="Autor:" required>
        <input type="number" name="Ano" step="0.01" placeholder="Ano (Ex: 1999):" required>
        <input type="number" name="qtde" placeholder="Quatidade em estoque:" required>
        <?php
        echo '<button type="submit" style="padding: 10px 20px; 
        background-color: #ffd8faff;
         color: black; 
         border: none; 
         border-radius: 4px; 
         cursor: pointer;">Cadastrar</button>';
        ?>
    </form>

    <h2>Pesquisar Livros</h2>
    
    <!-- Barra de Busca -->
    <form method="GET" class="search-container">
        <input 
            type="text" 
            name="busca" 
            placeholder="Buscar por título, autor ou gênero..." 
            value="<?php echo htmlspecialchars($termoBusca); ?>"
        >
        <button type="submit" class="btn-buscar">🔍 Buscar</button>
        <?php if (!empty($termoBusca)): ?>
            <a href="index.php" class="btn-limpar">✕ Limpar</a>
        <?php endif; ?>
    </form>

    <?php if (!empty($termoBusca)): ?>
        <p class="resultado-busca">
            <?php 
            $total = count($livros);
            echo "Encontrado(s) $total resultado(s) para: \"" . htmlspecialchars($termoBusca) . "\""; 
            ?>
        </p>
    <?php endif; ?>

    <h2>Livros Cadastrados</h2>
    
    <?php if (empty($livros)): ?>
        <p style="color: #795548; font-style: italic; padding: 20px;">
            <?php 
            if (!empty($termoBusca)) {
                echo "Nenhum livro encontrado com o termo \"" . htmlspecialchars($termoBusca) . "\".";
            } else {
                echo "Nenhum livro cadastrado ainda.";
            }
            ?>
        </p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getAno()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getQtde()); ?></td>
                    <td>
                        <form method="POST" class="form-acao" style="display: inline;">
                            <input type="hidden" name="acao" value="deletar">
                            <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                            <button type="submit" style="background-color: #d6b3ffff; border-radius: 4px; cursor: pointer;">Excluir</button>
                        </form>
                        <form method="POST" class="form-acao" action="editar.php" style="display: inline;">
                           <input type="hidden" name="acao" value="editar">
                            <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                            <button type="submit" style="background-color: #d6b3ffff; border-radius: 4px; cursor: pointer;">Editar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>