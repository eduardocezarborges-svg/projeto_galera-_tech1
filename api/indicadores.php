<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../config/database.php';

    // Seleciona os indicadores ativos por ordem
    $stmt = $pdo->query("
        SELECT icone, numero, texto 
        FROM indicadores 
        WHERE ativo = 1 
        ORDER BY ordem ASC, id DESC
    ");
    
    $indicadores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($indicadores, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Erro interno ao carregar indicadores.',
        'details' => $e->getMessage()
    ]);
}