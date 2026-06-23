<?php

require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query("
    SELECT
        id,
        categoria,
        titulo,
        imagem,
        link
    FROM instagram_posts
    WHERE ativo = 1
    ORDER BY RAND()
    LIMIT 3
");

echo json_encode(
    $stmt->fetchAll(PDO::FETCH_ASSOC),
    JSON_UNESCAPED_UNICODE
);

$stmt = $pdo->query("
    SELECT *
    FROM instagram_posts
    WHERE ativo = 1
    ORDER BY RAND()
    LIMIT 3
");

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);