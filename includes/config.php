<?php
$host = 'sql.freedb.tech';
$dbname = 'freedb_projetofacul';
$username = 'freedb_projeto_root';
$password = '?R2b!e$pDfkqXBX';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
