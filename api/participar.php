<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

try {
    require_once __DIR__ . '/../config/database.php';

    // 1. Busca os slides ativos e ordenados
    $stmtSlides = $pdo->query("SELECT imagem FROM participar_slides WHERE ativo = 1 ORDER BY ordem ASC, id DESC");
    $slides = $stmtSlides->fetchAll(PDO::FETCH_COLUMN);

    // 2. Busca os botões configurados para a cta_final
    $stmtBotoes = $pdo->query("SELECT texto, link FROM botoes_cta WHERE localizacao = 'cta_final' AND ativo = 1 ORDER BY ordem ASC");
    $botoes = $stmtBotoes->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'slides' => $slides,
        'botoes' => $botoes
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno ao carregar dados da seção participar.']);
}