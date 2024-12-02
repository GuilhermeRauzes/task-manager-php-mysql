<?php
// Conectar ao banco de dados
require_once 'config.php';

// Verificar se o usuário está autenticado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// Verificar se o ID da tarefa foi passado
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    
    // Deletar a tarefa do banco de dados
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE task_id = ? AND user_id = ?");
    if ($stmt->execute([$task_id, $_SESSION['user_id']])) {
        // Tarefa excluída com sucesso
        header("Location: tasks.php?msg=tarefa_excluida");
    } else {
        // Erro ao excluir a tarefa
        header("Location: tasks.php?msg=erro_exclusao");
    }
}
?>
