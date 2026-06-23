<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config/database.php';

try {
    $stmt = $pdo->query("SELECT * FROM depoimentos ORDER BY RAND()");
    $depoimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$depoimentos) {
        echo json_encode(["principal" => null, "laterais" => []], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $principal = array_shift($depoimentos);
    $laterais = array_slice($depoimentos, 0, 3);

    echo json_encode([
        "principal" => $principal,
        "laterais" => $laterais
    ], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    echo json_encode(["principal" => null, "laterais" => []], JSON_UNESCAPED_UNICODE);
}
