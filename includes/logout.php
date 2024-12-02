<?php
// Iniciar a sessão
session_start();

// Destruir a sessão
session_unset();
session_destroy();

// Redirecionar para o login
header("Location: ../login.html?msg=logout_sucesso");
exit;
?>
