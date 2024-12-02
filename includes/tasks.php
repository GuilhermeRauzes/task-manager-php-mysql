<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// Conectar ao banco de dados
require_once 'config.php';

// Obter as tarefas do usuário logado
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Tarefas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css"> <!-- Ajustado o caminho do CSS -->
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Minhas Tarefas</h2>

    <!-- Formulário para adicionar tarefa -->
    <h4 class="mt-4">Adicionar Tarefa</h4>
    <form action="add_task.php" method="POST">
        <div class="form-group">
            <input type="text" name="task" class="form-control" placeholder="Descrição da tarefa" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Adicionar Tarefa</button>
    </form>

    <!-- Exibir mensagens de sucesso ou erro -->
    <div id="message"></div>

    <!-- Tabela de Tarefas -->
    <h4 class="mt-4">Lista de Tarefas</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= htmlspecialchars($task['task']) ?></td>
                    <td>
                        <a href="delete_task.php?id=<?= $task['task_id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botão para Log Out -->
    <p class="text-center"><a href="logout.php" class="btn btn-danger">Log Out</a></p>
</div>

<script src="./assets/js/script.js"></script> <!-- Ajustado o caminho do JS -->

</body>
</html>
