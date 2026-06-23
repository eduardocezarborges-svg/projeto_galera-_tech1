<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();
csrf_check();

$type = $_GET['type'] ?? '';
$configTable = get_table_config($type);

if (!$configTable) {
    exit('Seção inválida.');
}

$table = $configTable['table'];
$fields = $configTable['fields'];
$title = $configTable['title'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$editing = null;

if (isset($_GET['delete'])) {
    $deleteId = (int) $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM {$table} WHERE id = ?");
    $stmt->execute([$deleteId]);
    redirect_admin("manage.php?type={$type}");
}

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM {$table} WHERE id = ?");
    $stmt->execute([$id]);
    $editing = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [];

    foreach ($fields as $field => $kind) {
        if ($kind === 'file') {
            $uploaded = upload_file($field, $configTable['upload_folder']);
            $data[$field] = $uploaded ?: ($_POST[$field . '_atual'] ?? null);
        } elseif ($kind === 'checkbox') {
            $data[$field] = isset($_POST[$field]) ? 1 : 0;
        } else {
            $data[$field] = trim($_POST[$field] ?? '');
        }
    }

    if (!empty($_POST['id'])) {
        $updateId = (int) $_POST['id'];
        $set = implode(', ', array_map(fn($field) => "{$field} = ?", array_keys($data)));
        $stmt = $pdo->prepare("UPDATE {$table} SET {$set} WHERE id = ?");
        $stmt->execute([...array_values($data), $updateId]);
    } else {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $stmt = $pdo->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})");
        $stmt->execute(array_values($data));
    }

    redirect_admin("manage.php?type={$type}");
}

$rows = $pdo->query("SELECT * FROM {$table} ORDER BY ordem ASC, id DESC")->fetchAll();

$pageTitle = $title . ' - Admin';
require_once __DIR__ . '/includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0"><?= e($title) ?></h1>
        <a href="dashboard.php" class="small">Voltar ao dashboard</a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h2 class="h5 mb-3"><?= $editing ? 'Editar item' : 'Novo item' ?></h2>

        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
            <input type="hidden" name="id" value="<?= e((string)($editing['id'] ?? '')) ?>">

            <div class="row g-3">
                <?php foreach ($fields as $field => $kind): ?>
                    <div class="col-md-<?= $kind === 'textarea' ? '12' : '6' ?>">
                        <label class="form-label"><?= e(ucfirst(str_replace('_', ' ', $field))) ?></label>

                        <?php if ($kind === 'textarea'): ?>
                            <textarea name="<?= e($field) ?>" class="form-control" rows="4"><?= e($editing[$field] ?? '') ?></textarea>

                        <?php elseif ($kind === 'file'): ?>
                            <?php if (!empty($editing[$field])): ?>
                                <div class="mb-2">
                                    <img src="../<?= e($editing[$field]) ?>" style="max-height: 80px;" alt="">
                                    <input type="hidden" name="<?= e($field) ?>_atual" value="<?= e($editing[$field]) ?>">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="<?= e($field) ?>" class="form-control">

                        <?php elseif ($kind === 'checkbox'): ?>
                            <div class="form-check mt-2">
                                <input type="checkbox" name="<?= e($field) ?>" value="1" class="form-check-input"
                                    <?= !empty($editing[$field]) ? 'checked' : '' ?>>
                                <label class="form-check-label">Sim</label>
                            </div>

                        <?php else: ?>
                            <input type="<?= e($kind) ?>" name="<?= e($field) ?>" class="form-control" value="<?= e((string)($editing[$field] ?? '')) ?>">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="btn btn-primary mt-4"><?= $editing ? 'Salvar alterações' : 'Cadastrar' ?></button>
            <?php if ($editing): ?>
                <a href="manage.php?type=<?= e($type) ?>" class="btn btn-outline-secondary mt-4">Cancelar</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <h2 class="h5 mb-3">Itens cadastrados</h2>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Resumo</th>
                        <th>Ordem</th>
                        <th>Ativo</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?= e((string)$row['id']) ?></td>
                            <td>
                                <?= e($row['titulo'] ?? $row['nome'] ?? $row['numero'] ?? $row['tag'] ?? 'Item') ?>
                            </td>
                            <td><?= e((string)($row['ordem'] ?? '-')) ?></td>
                            <td><?= !empty($row['ativo']) ? 'Sim' : 'Não' ?></td>
                            <td class="text-end">
                                <a href="manage.php?type=<?= e($type) ?>&id=<?= e((string)$row['id']) ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                <a href="manage.php?type=<?= e($type) ?>&delete=<?= e((string)$row['id']) ?>" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Excluir este item?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (!$rows): ?>
                        <tr>
                            <td colspan="5" class="text-muted">Nenhum item cadastrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
