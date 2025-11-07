<?php
require_once __DIR__ . '/Controller/BebidaController.php';

$controller = new BebidaController();

// Ações do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'criar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
    }
}

$lista = $controller->ler();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Bebidas</title>
    <style>
/* ===== RESET ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ===== BODY ===== */
body {
    background: linear-gradient(135deg, #f0f4ff, #ffffff);
    padding: 40px;
    color: #333;
}

/* ===== TÍTULO ===== */
h1 {
    text-align: center;
    font-size: 2.2rem;
    color: #1e3a8a;
    margin-bottom: 30px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* ===== FORM ===== */
form {
    background: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    max-width: 850px;
    margin: 0 auto 40px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: space-between;
    transition: 0.3s;
}

form:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

/* ===== CAMPOS ===== */
input[type="text"],
input[type="number"],
select {
    flex: 1 1 250px;
    padding: 12px 14px;
    border-radius: 10px;
    border: 2px solid #e2e8f0;
    background: #f9fafb;
    font-size: 1rem;
    transition: all 0.25s ease;
}

input:focus,
select:focus {
    border-color: #3b82f6;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2);
    outline: none;
}

/* ===== BOTÕES ===== */
button {
    background: linear-gradient(135deg, #2563eb, #1e40af);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 12px 25px;
    cursor: pointer;
    font-size: 1rem;
    transition: 0.3s ease;
    font-weight: 500;
}

button:hover {
    background: linear-gradient(135deg, #1e3a8a, #1d4ed8);
    box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
}

/* ===== BOTÃO DELETAR ===== */
.delete-btn {
    background: linear-gradient(135deg, #ef4444, #b91c1c);
}

.delete-btn:hover {
    background: linear-gradient(135deg, #b91c1c, #7f1d1d);
    box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
}

/* ===== TABELA ===== */
table {
    width: 100%;
    max-width: 850px;
    margin: 0 auto;
    border-collapse: collapse;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    animation: fadeIn 0.4s ease;
}

th, td {
    padding: 14px 16px;
    text-align: left;
}

th {
    background: #1e3a8a;
    color: #fff;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: #f9fafb;
}

tr:hover {
    background-color: #eef2ff;
    transition: 0.2s ease;
}

/* ===== RESPONSIVIDADE ===== */
@media (max-width: 768px) {
    form {
        flex-direction: column;
        align-items: stretch;
    }

    input, select, button {
        flex: 1 1 100%;
    }

    table, th, td {
        font-size: 0.9rem;
    }
}

/* ===== ANIMAÇÃO ===== */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body>

<h1>Gerenciamento de Bebidas</h1>

<!-- Formulário para criar bebida -->
<form method="POST">
    <input type="hidden" name="acao" value="criar">
    <input type="text" name="nome" placeholder="Nome da bebida:" required>
    <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <option value="Refrigerante">Refrigerante</option>
        <option value="Cerveja">Cerveja</option>
        <option value="Vinho">Vinho</option>
        <option value="Destilado">Destilado</option>
        <option value="Água">Água</option>
        <option value="Suco">Suco</option>
        <option value="Energético">Energético</option>
    </select>
    <input type="text" name="volume" placeholder="Volume (ex: 300ml):" required>
    <input type="number" name="valor" step="0.01" placeholder="Valor em R$:" required>
    <input type="number" name="qtde" placeholder="Quantidade em estoque:" required>
    <button type="submit">Cadastrar</button>
</form>

<!-- Tabela de bebidas -->
<table>
    <tr>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Volume</th>
        <th>Valor (R$)</th>
        <th>Quantidade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($lista as $bebida): ?>
    <tr>
        <td><?= htmlspecialchars($bebida->getNome()) ?></td>
        <td><?= htmlspecialchars($bebida->getCategoria()) ?></td>
        <td><?= htmlspecialchars($bebida->getVolume()) ?></td>
        <td><?= number_format($bebida->getValor(), 2, ',', '.') ?></td>
        <td><?= htmlspecialchars($bebida->getQtde()) ?></td>
        <td>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="acao" value="deletar">
                <input type="hidden" name="nome" value="<?= htmlspecialchars($bebida->getNome()) ?>">
                <button type="submit" class="delete-btn">Excluir</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>