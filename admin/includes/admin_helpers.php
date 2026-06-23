<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/helpers.php';

function redirect_admin(string $path): void
{
    header('Location: ' . $path);
    exit;
}

function upload_file(string $field, string $folder): ?string
{
    if (empty($_FILES[$field]['name']) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'];
    $mime = mime_content_type($_FILES[$field]['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        return null;
    }

    $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
    $name = uniqid('galeratech_', true) . '.' . strtolower($ext);
    $targetDir = __DIR__ . '/../../uploads/' . trim($folder, '/');

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0775, true);
    }

    $target = $targetDir . '/' . $name;

    if (move_uploaded_file($_FILES[$field]['tmp_name'], $target)) {
        return 'uploads/' . trim($folder, '/') . '/' . $name;
    }

    return null;
}

function get_table_config(string $type): ?array
{
    $configs = [
        'hero' => [
            'table' => 'hero_slides',
            'title' => 'Slides do Hero',
            'upload_folder' => 'hero',
            'fields' => [
                'tag' => 'text',
                'titulo_html' => 'textarea',
                'subtitulo' => 'textarea',
                'texto_botao_1' => 'text',
                'link_botao_1' => 'text',
                'texto_botao_2' => 'text',
                'link_botao_2' => 'text',
                'card_titulo' => 'text',
                'card_texto' => 'textarea',
                'imagem' => 'file',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'indicadores' => [
            'table' => 'indicadores',
            'title' => 'Indicadores de impacto',
            'upload_folder' => '',
            'fields' => [
                'icone' => 'text',
                'numero' => 'text',
                'descricao' => 'textarea',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'jornada' => [
            'table' => 'jornada',
            'title' => 'Jornada',
            'upload_folder' => '',
            'fields' => [
                'numero' => 'text',
                'titulo' => 'text',
                'descricao' => 'textarea',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'aprendizado' => [
            'table' => 'aprendizado',
            'title' => 'Aprendizado',
            'upload_folder' => '',
            'fields' => [
                'icone' => 'text',
                'titulo' => 'text',
                'descricao' => 'textarea',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'publico' => [
            'table' => 'publico',
            'title' => 'Para quem é',
            'upload_folder' => '',
            'fields' => [
                'titulo' => 'text',
                'descricao' => 'textarea',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'experiencias' => [
            'table' => 'experiencias',
            'title' => 'Experiências',
            'upload_folder' => 'experiencias',
            'fields' => [
                'icone' => 'text',
                'titulo' => 'text',
                'descricao' => 'textarea',
                'imagem' => 'file',
                'destaque' => 'checkbox',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'depoimentos' => [
            'table' => 'depoimentos',
            'title' => 'Depoimentos',
            'upload_folder' => 'depoimentos',
            'fields' => [
                'nome' => 'text',
                'cargo' => 'text',
                'texto' => 'textarea',
                'foto' => 'file',
                'destaque' => 'checkbox',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'instagram' => [
            'table' => 'instagram_posts',
            'title' => 'Instagram',
            'upload_folder' => 'instagram',
            'fields' => [
                'categoria' => 'text',
                'titulo' => 'text',
                'imagem' => 'file',
                'link' => 'text',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],
        'parceiros' => [
            'table' => 'parceiros',
            'title' => 'Parceiros e apoiadores',
            'upload_folder' => 'parceiros',
            'fields' => [
                'nome' => 'text',
                'logo' => 'file',
                'link' => 'text',
                'destaque_carrossel' => 'checkbox',
                'ordem' => 'number',
                'ativo' => 'checkbox'
            ],
        ],

        
    ];

    return $configs[$type] ?? null;
}
 