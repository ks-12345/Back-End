<?php

namespace Aula_15;

require_once __DIR__. '\\..\\Controller\\BebidaController.php';

// Cria a instância do controlador
$controller = new BebidaController();

$bebidaParaEditar = null;
$nomeOriginal = ''; // Variável para guardar o nome original da bebida

// --- 1. Lógica para Processar o Formulário de Atualização ---
// Verifica se o formulário de edição foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') {
    
    // O nomeOriginal é a chave que usamos para identificar a bebida no array
    $nomeOriginal = $_POST['nomeOriginal'] ?? '';
    $categoria    = $_POST['categoria'] ?? '';
    $volume       = $_POST['Volume'] ?? ''; // O campo chama Volume com 'V' maiúsculo
    $valor        = $_POST['Valor'] ?? 0;   // O campo chama Valor com 'V' maiúsculo
    $qtde         = $_POST['qtde'] ?? 0;
    
    // Chama o método editar (já existente) no controller
    $controller->editar($nomeOriginal, $categoria, $volume, $valor, $qtde);
    
    // Redireciona de volta para a lista principal após a edição
    header('Location: index.php');
    exit();
}

// --- 2. Lógica para Carregar os Dados Iniciais da Bebida ---
// Se não é a submissão de atualização, estamos vindo do index.php para CARREGAR o formulário.
// O index.php envia o 'nome' via POST, então buscamos a bebida com esse nome.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    $nomeOriginal = $_POST['nome'];
    $bebidaParaEditar = $controller->buscar($nomeOriginal);
    
    // Se a bebida não for encontrada, algo deu errado, redireciona.
    if (!$bebidaParaEditar) {
        header('Location: index.php');
        exit();
    }
} else {
    // Se não veio do index.php ou da própria atualização, redireciona (acesso direto/inválido)
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Bebida</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; 
            background-color: #ffd8faff; 
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Bebida: <?php echo htmlspecialchars($bebidaParaEditar->getNome()); ?></h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar"> 
        
        <input type="hidden" name="nomeOriginal" value="<?php echo htmlspecialchars($nomeOriginal); ?>"> 
        
        <label for="nome_display">Nome (Chave, não editável):</label>
        <input type="text" id="nome_display" value="<?php echo htmlspecialchars($bebidaParaEditar->getNome()); ?>" disabled> 
        

        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" required>
            <?php $currentCat = $bebidaParaEditar->getCategoria(); ?>
            <option value="Refrigerante" <?php if ($currentCat === 'Refrigerante') echo 'selected'; ?>>Refrigerante</option>
            <option value="Cerveja" <?php if ($currentCat === 'Cerveja') echo 'selected'; ?>>Cerveja</option>
            <option value="Vinho" <?php if ($currentCat === 'Vinho') echo 'selected'; ?>>Vinho</option>
            <option value="Destilado" <?php if ($currentCat === 'Destilado') echo 'selected'; ?>>Destilado</option>
            <option value="Água" <?php if ($currentCat === 'Água') echo 'selected'; ?>>Água</option>
            <option value="Suco" <?php if ($currentCat === 'Suco') echo 'selected'; ?>>Suco</option>
            <option value="Energético" <?php if ($currentCat === 'Energético') echo 'selected'; ?>>Energético</option>
        </select>
        
        <label for="volume">Volume:</label>
        <input type="text" name="Volume" id="volume" value="<?php echo htmlspecialchars($bebidaParaEditar->getVolume()); ?>" required>
        

        <label for="valor">Valor:</label>
        <input type="number" name="Valor" id="valor" step="0.01" value="<?php echo htmlspecialchars($bebidaParaEditar->getValor()); ?>" required>
        

        <label for="qtde">Quantidade:</label>
        <input type="number" name="qtde" id="qtde" value="<?php echo htmlspecialchars($bebidaParaEditar->getQtde()); ?>" required>
        

        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>