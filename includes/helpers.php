<?php
declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string
{
    return 'assets/' . ltrim($path, '/');
}

function upload_path(?string $path, string $fallback = 'assets/img/placeholder.svg'): string
{
    if (!$path) {
        return $fallback;
    }

    return $path;
}

function fetch_all_active(PDO $pdo, string $table, string $order = 'ordem ASC'): array
{
    $allowedTables = [
        'hero_slides', 'indicadores', 'jornada', 'aprendizado', 'publico',
        'experiencias', 'depoimentos', 'instagram_posts', 'parceiros'
    ];

    if (!in_array($table, $allowedTables, true)) {
        return [];
    }

    $sql = "SELECT * FROM {$table} WHERE ativo = 1 ORDER BY {$order}";
    return $pdo->query($sql)->fetchAll();
}

function fetch_single(PDO $pdo, string $table): ?array
{
    $allowedTables = ['sobre', 'cta', 'site_config'];

    if (!in_array($table, $allowedTables, true)) {
        return null;
    }

    $stmt = $pdo->query("SELECT * FROM {$table} LIMIT 1");
    $data = $stmt->fetch();

    return $data ?: null;
}
 