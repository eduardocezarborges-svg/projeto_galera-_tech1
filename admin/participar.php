<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();

// Nome da tabela dedicada ao carrossel
$table = 'participar_slides';
$uploadFolder = 'uploads/img_foto';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$editing = null;

// Mensagem de feedback para ações do usuário
$msg = '';
if (isset($_GET['sucesso'])) {
    $msg = 'Operação realizada com sucesso!';
}

// LÓGICA DE EXCLUSÃO (DELETE)
if (isset($_GET['delete'])) {
    $deleteId = (int) $_GET['delete'];
    
    // Opcional: Buscar o caminho do arquivo para dar unlink e economizar espaço no servidor
    $stmtImg = $pdo->prepare("SELECT imagem FROM {$table} WHERE id = ?");
    $stmtImg->execute([$deleteId]);
    $fotoItem = $stmtImg->fetch();
    if ($fotoItem && !empty($fotoItem['imagem']) && file_exists(__DIR__ . '/../' . $fotoItem['imagem'])) {
        @unlink(__DIR__ . '/../' . $fotoItem['imagem']);
    }

    $stmt = $pdo->prepare("DELETE FROM {$table} WHERE id = ?");
    $stmt->execute([$deleteId]);
    header("Location: participar.php?sucesso=1");
    exit;
}

// LÓGICA DE BUSCA PARA EDIÇÃO
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM {$table} WHERE id = ?");
    $stmt->execute([$id]);
    $editing = $stmt->fetch();
}

// LÓGICA DE ENVIO (POST - CADASTRO / EDIÇÃO)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ordem = (int) ($_POST['ordem'] ?? 0);
    $ativo = isset($_POST['ativo']) ? 1 : 0;

    // Tratamento de Upload da Imagem utilizando a função helper do seu sistema
    $uploadedFile = upload_file('imagem', $uploadFolder);
    $imagemFinal = $uploadedFile ?: ($_POST['imagem_atual'] ?? '');

    if (empty($imagemFinal)) {
        exit('É obrigatório enviar uma imagem para o carrossel.');
    }

    if (!empty($_POST['id'])) {
        // Modo Edição
        $updateId = (int) $_POST['id'];
        $stmtUpdate = $pdo->prepare("UPDATE {$table} SET imagem = ?, ordem = ?, ativo = ? WHERE id = ?");
        $stmtUpdate->execute([$imagemFinal, $ordem, $ativo, $updateId]);
    } else {
        // Modo Cadastro
        $stmtInsert = $pdo->prepare("INSERT INTO {$table} (imagem, ordem, ativo) VALUES (?, ?, ?)");
        $stmtInsert->execute([$imagemFinal, $ordem, $ativo]);
    }

    header("Location: participar.php?sucesso=1");
    exit;
}

// Listar todos os slides salvos no banco de dados
$rows = $pdo->query("SELECT * FROM {$table} ORDER BY ordem ASC, id DESC")->fetchAll();

$pageTitle = "Carrossel Participar - Admin";
require_once __DIR__ . '/includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Carrossel da Seção Participar</h1>
    <a href="dashboard.php" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Voltar para o Painel
    </a>
</div>

<?php if(!empty($msg)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <h5 class="card-title mb-4"><?= $editing ? 'Editar Slide do Carrossel' : 'Adicionar Novo Slide de Fundo' ?></h5>
        
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars((string)($editing['id'] ?? '')) ?>">

            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Imagem de Fundo (.jpg, .png, .webp)</label>
                        <input type="file" name="imagem" class="form-control" <?= !$editing ? 'required' : '' ?>>
                        
                        <?php if ($editing && !empty($editing['imagem'])): ?>
                            <div class="mt-3">
                                <span class="d-block text-muted small mb-2">Imagem configurada atualmente:</span>
                                <div class="p-2 border rounded-3 bg-light d-inline-block" style="max-width: 250px;">
                                    <img src="../<?= htmlspecialchars($editing['imagem']) ?>" style="width: 100%; height: auto; border-radius: 4px;">
                                </div>
                                <input type="hidden" name="imagem_atual" value="<?= htmlspecialchars($editing['imagem']) ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Ordem de Exibição</label>
                        <input type="number" name="ordem" class="form-control" value="<?= htmlspecialchars((string)($editing['ordem'] ?? '0')) ?>" placeholder="Ex: 1">
                    </div>
                </div>

                <div class="col-md-6 pt-md-4">
                    <div class="form-check mt-md-2">
                        <input type="checkbox" name="ativo" value="1" id="slide_ativo" class="form-check-input" <?= ($editing === null || !empty($editing['ativo'])) ? 'checked' : '' ?>>
                        <label for="slide_ativo" class="form-check-label fw-bold">
                            Slide Ativo (Exibir na rotação de fundos do site)
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-sm px-4">
                    <?= $editing ? 'Salvar Alterações' : 'Cadastrar Slide' ?>
                </button>
                <?php if ($editing): ?>
                    <a href="participar.php" class="btn btn-light btn-sm px-3">Cancelar Edição</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<h2 class="h5 mb-3 mt-5">Slides Cadastrados no Banco</h2>
<div class="row g-4">
    <?php foreach ($rows as $row): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm d-flex flex-column">
                
                <div class="d-flex justify-content-center align-items-center bg-light border-bottom" style="height: 150px; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem; overflow: hidden;">
                    <?php if (!empty($row['imagem'])): ?>
                        <img src="../<?= htmlspecialchars($row['imagem']) ?>" alt="Slide" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div class="text-secondary" style="font-size: 2rem;"><i class="bi bi-image"></i></div>
                    <?php endif; ?>
                </div>

                <div class="card-body p-3 d-flex flex-column flex-grow-1">
                    <div class="mb-2 d-flex gap-1 flex-wrap">
                        <span class="badge text-bg-<?= !empty($row['ativo']) ? 'success' : 'danger' ?> small">
                            <?= !empty($row['ativo']) ? 'Ativo' : 'Inativo' ?>
                        </span>
                        <span class="badge text-bg-secondary small">ID: <?= htmlspecialchars((string)$row['id']) ?></span>
                    </div>
                    
                    <p class="text-muted small mb-3">Ordem na fila: <strong><?= htmlspecialchars((string)($row['ordem'] ?? '0')) ?></strong></p>
                    
                    <div class="mt-auto pt-2 border-top d-flex gap-2">
                        <a href="participar.php?id=<?= htmlspecialchars((string)$row['id']) ?>" class="btn btn-outline-warning btn-sm flex-grow-1">Editar</a>
                        <a href="participar.php?delete=<?= htmlspecialchars((string)$row['id']) ?>" class="btn btn-outline-danger btn-sm flex-grow-1" onclick="return confirm('Tem certeza que deseja apagar essa imagem do carrossel?');">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if (!$rows): ?>
        <div class="col-12">
            <div class="alert alert-light text-center border shadow-sm p-4 text-muted">
                <i class="bi bi-images d-block mb-2" style="font-size: 2rem;"></i>
                Nenhuma imagem de fundo cadastrada para o carrossel.
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>