<?php
require_once __DIR__ . '/../config/database.php';
header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query("
    SELECT 
        id, 
        tag, 
        titulo, 
        descricao, 
        texto_botao_1, 
        link_botao_1, 
        texto_botao_2, 
        link_botao_2, 
        imagem, 
        ordem 
    FROM hero_slides 
    WHERE ativo = 1 
    ORDER BY ordem ASC
");

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);