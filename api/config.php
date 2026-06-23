<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../config/database.php';

    $stmt = $pdo->query("SELECT * FROM rodape_config WHERE id = 1");
    $config = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno ao carregar configurações.']);
}