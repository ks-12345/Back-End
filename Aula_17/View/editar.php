<?php

namespace Aula_17;

require_once __DIR__. '\\..\\Controller\\LivroController.php'; // ajustado para Windows

$controller = new LivroController(); // instancia o controller

$livroParaEditar = null; // livro que sera editada
$tituloOriginal = '';  // titulo original da livro

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') { // verifica se o formulario foi submetido para atualizar
    
    $tituloOriginal = $_POST['tituloOriginal'] ?? ''; // titulo original da livro
    $genero    = $_POST['genero'] ?? '';
    $autor       = $_POST['Autor'] ?? ''; 
    $ano        = $_POST['Ano'] ?? '';  
    $qtde         = $_POST['qtde'] ?? 0;

    $controller->editar($tituloOriginal, $genero, $autor, $ano, $qtde); // chama o metodo editar do controller
    
    header('Location: index.php'); // redireciona para a lista apos a edicao
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'])) { 
    $tituloOriginal = $_POST['titulo'];
    $livroParaEditar = $controller->buscar($tituloOriginal);
    
    // Se a livro não for encontrada, algo deu errado, redireciona.
    if (!$livroParaEditar) { // livro nao encontrada
        header('Location: index.php'); // redireciona
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Livros</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #ffc5ecff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; 
            background-color: #e39dd9ff; 
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Livros: <?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?></h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar"> 
        
        <input type="hidden" name="tituloOriginal" value="<?php echo htmlspecialchars($tituloOriginal); ?>"> 
        
        
        <label for="titulo_display">Titulo (Chave, não editável):</label>
        <input type="text" id="titulo_display" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" disabled> 
        

        <label for="genero">Genero:</label>
        <select name="genero" id="genero" required>
            <?php $currentCat = $livroParaEditar->getGenero(); ?>
            <option value="Aventura" <?php if ($currentCat === 'Aventura') echo 'selected'; ?>>Aventura</option>
            <option value="Romance" <?php if ($currentCat === 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Literatura Brasileira" <?php if ($currentCat === 'Literatura Brasileira') echo 'selected'; ?>>Literatura Brasileira</option>
            <option value="Terror" <?php if ($currentCat === 'Terror') echo 'selected'; ?>>Terror</option>
            <option value="Suspense" <?php if ($currentCat === 'Suspense') echo 'selected'; ?>>Suspense</option>
            <option value="Comedia" <?php if ($currentCat === 'Comedia') echo 'selected'; ?>>Comedia</option>
            <option value="Fantasia" <?php if ($currentCat === 'Fantasia') echo 'selected'; ?>>Fantasia</option>

        </select>
        
        <label for="autor">Autor:</label>
        <input type="text" name="Autor" id="autor" value="<?php echo htmlspecialchars($livroParaEditar->getAutor()); ?>" required>
        

        <label for="ano">Ano:</label>
        <input type="number" name="Ano" id="ano" value="<?php echo htmlspecialchars($livroParaEditar->getAno()); ?>" required>
        

        <label for="qtde">Quantidade:</label>
        <input type="number" name="qtde" id="qtde" value="<?php echo htmlspecialchars($livroParaEditar->getQtde()); ?>" required>
        

        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>