<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();
csrf_check();

$type = $_GET['type'] ?? '';

$singleConfigs = [
    'sobre' => [
        'table' => 'sobre',
        'title' => 'Sobre o projeto',
        'upload_folder' => 'sobre',
        'fields' => [
            'tag' => 'text',
            'titulo' => 'text',
            'texto_1' => 'textarea',
            'texto_2' => 'textarea',
            'imagem' => 'file',
            'alt_imagem' => 'text',
        ],
    ],
    'cta' => [
        'table' => 'cta',
        'title' => 'CTA final',
        'upload_folder' => '',
        'fields' => [
            'tag' => 'text',
            'titulo' => 'text',
            'descricao' => 'textarea',
            'texto_botao_1' => 'text',
            'link_botao_1' => 'text',
            'texto_botao_2' => 'text',
            'link_botao_2' => 'text',
        ],
    ],
    'config' => [
        'table' => 'site_config',
        'title' => 'Configurações gerais',
        'upload_folder' => 'parceiros',
        'fields' => [
            'titulo_site' => 'text',
            'descricao_site' => 'textarea',
            'logo' => 'file',
            'texto_botao_menu' => 'text',
            'instagram' => 'text',
            'instagram_link' => 'text',
            'whatsapp_formatado' => 'text',
            'whatsapp_link' => 'text',
            'endereco' => 'text',
            'texto_rodape' => 'textarea',
            'link_apeti' => 'text',
            'link_inscricao' => 'text',
            'link_padrinho' => 'text',
        ],
    ],
];

$configSingle = $singleConfigs[$type] ?? null;

if (!$configSingle) {
    exit('Seção inválida.');
}

$table = $configSingle['table'];
$fields = $configSingle['fields'];
$title = $configSingle['title'];

$row = $pdo->query("SELECT * FROM {$table} LIMIT 1")->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [];

    foreach ($fields as $field => $kind) {
        if ($kind === 'file') {
            $uploaded = upload_file($field, $configSingle['upload_folder']);
            $data[$field] = $uploaded ?: ($_POST[$field . '_atual'] ?? null);
        } else {
            $data[$field] = trim($_POST[$field] ?? '');
        }
    }

    if ($row) {
        $set = implode(', ', array_map(fn($field) => "{$field} = ?", array_keys($data)));
        $stmt = $pdo->prepare("UPDATE {$table} SET {$set} WHERE id = ?");
        $stmt->execute([...array_values($data), $row['id']]);
    } else {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $stmt = $pdo->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})");
        $stmt->execute(array_values($data));
    }

    redirect_admin("single.php?type={$type}");
}

$pageTitle = $title . ' - Admin';
require_once __DIR__ . '/includes/header.php';
?>

<div class="mb-4">
    <h1 class="h3 mb-0"><?= e($title) ?></h1>
    <a href="dashboard.php" class="small">Voltar ao dashboard</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">

            <div class="row g-3">
                <?php foreach ($fields as $field => $kind): ?>
                    <div class="col-md-<?= $kind === 'textarea' ? '12' : '6' ?>">
                        <label class="form-label"><?= e(ucfirst(str_replace('_', ' ', $field))) ?></label>

                        <?php if ($kind === 'textarea'): ?>
                            <textarea name="<?= e($field) ?>" class="form-control" rows="4"><?= e($row[$field] ?? '') ?></textarea>

                        <?php elseif ($kind === 'file'): ?>
                            <?php if (!empty($row[$field])): ?>
                                <div class="mb-2">
                                    <img src="../<?= e($row[$field]) ?>" style="max-height: 80px;" alt="">
                                    <input type="hidden" name="<?= e($field) ?>_atual" value="<?= e($row[$field]) ?>">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="<?= e($field) ?>" class="form-control">

                        <?php else: ?>
                            <input type="<?= e($kind) ?>" name="<?= e($field) ?>" class="form-control" value="<?= e((string)($row[$field] ?? '')) ?>">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="btn btn-primary mt-4">Salvar</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
