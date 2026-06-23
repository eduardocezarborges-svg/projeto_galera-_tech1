<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

try {
    // Voltando exatamente uma pasta da raiz até a configuração do banco
    require_once __DIR__ . '/../config/database.php';

    // Seleciona todos os parceiros ativos ordenando primeiro por destaque, depois pela ordem numérica
    $stmt = $pdo->query("
        SELECT nome, logo, link, destaque_carrossel 
        FROM parceiros 
        WHERE ativo = 1 
        ORDER BY destaque_carrossel DESC, ordem ASC, id DESC
    ");
    
    $parceiros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($parceiros, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Erro interno ao carregar marcas.',
        'details' => $e->getMessage()
    ]);
}