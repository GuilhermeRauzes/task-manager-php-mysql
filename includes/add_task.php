<?php
// Conectar ao banco de dados
require_once 'config.php';

// Verificar se o usuário está autenticado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = $_POST['task'];

    // Inserir a nova tarefa no banco de dados
    $stmt = $pdo->prepare("INSERT INTO tasks (user_id, task) VALUES (?, ?)");
    if ($stmt->execute([$_SESSION['user_id'], $task])) {
        // Mensagem de sucesso ao adicionar a tarefa
        $_SESSION['message'] = "Tarefa adicionada com sucesso!";
    } else {
        // Mensagem de erro ao adicionar a tarefa
        $_SESSION['message'] = "Erro ao adicionar tarefa. Tente novamente.";
    }

    // Redirecionar de volta para tasks.php
    header("Location: tasks.php");
    exit;
}
