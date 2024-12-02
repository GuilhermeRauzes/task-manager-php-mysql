<?php
// Conectar ao banco de dados
require_once 'config.php';

// Processar o formulário de registro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegando dados do formulário
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Verificar se as senhas coincidem
    if ($password !== $confirm_password) {
        // Redirecionar com erro
        header("Location: ../register.html?msg=senha_incorreta");
        exit;
    }

    // Verificar se o nome de usuário já existe
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        // Nome de usuário já existe
        header("Location: ../register.html?msg=usuario_existente");
        exit;
    }

    // Criptografar a senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir no banco de dados
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hashed_password])) {
        // Registro bem-sucedido, redireciona com sucesso
        header("Location: ../register.html?msg=sucesso");
    } else {
        // Erro no banco de dados
        header("Location: ../register.html?msg=erro");
    }
}
?>
