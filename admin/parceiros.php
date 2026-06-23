<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();

$pageTitle = "Gerenciar Parceiros e Padrinhos";
require_once __DIR__ . '/includes/header.php';

$editando = false;
$parceiroEditar = null;

/* ==========================================
   MODO EDIÇÃO (BUSCAR DADOS)
   ========================================== */
if (isset($_GET['editar'])) {
    $id = (int)$_GET['editar'];

    $stmt = $pdo->prepare("SELECT * FROM parceiros WHERE id = ?");
    $stmt->execute([$id]);
    $parceiroEditar = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($parceiroEditar) {
        $editando = true;
    }
}

/* ==========================================
   EXCLUIR REGISTO
   ========================================== */
if (isset($_GET['excluir'])) {
    $id = (int)$_GET['excluir'];

    $stmt = $pdo->prepare("SELECT logo FROM parceiros WHERE id = ?");
    $stmt->execute([$id]);
    $parceiro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($parceiro) {
        if (!empty($parceiro['logo'])) {
            $arquivo = __DIR__ . '/../' . $parceiro['logo'];
            if (file_exists($arquivo)) {
                unlink($arquivo);
            }
        }

        $stmt = $pdo->prepare("DELETE FROM parceiros WHERE id = ?");
        $stmt->execute([$id]);
    }

    header('Location: parceiros.php');
    exit;
}

/* ==========================================
   PROCESSAR FORMULÁRIO (SALVAR / ATUALIZAR)
   ========================================== */
$msg = '';
if (isset($_GET['sucesso'])) {
    $msg = 'Registro salvo com sucesso!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $link = trim($_POST['link']);
    $ordem = (int)$_POST['ordem'];
    $destaque_carrossel = isset($_POST['destaque_carrossel']) ? 1 : 0;
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    
    $logoBanco = '';

    // Upload de Imagem
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $pasta = '../uploads/parceiros/';

        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $nomeArquivo = time() . '_' . basename($_FILES['logo']['name']);
        $destino = $pasta . $nomeArquivo;

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $destino)) {
            $logoBanco = 'uploads/parceiros/' . $nomeArquivo;
        }
    }

    if (!empty($_POST['id'])) {
        // --- ATUALIZAR EXISTENTE ---
        $idParceiro = (int)$_POST['id'];

        $stmtLogo = $pdo->prepare("SELECT logo FROM parceiros WHERE id = ?");
        $stmtLogo->execute([$idParceiro]);
        $reg = $stmtLogo->fetch(PDO::FETCH_ASSOC);
        $logoAtual = $reg['logo'] ?? '';

        if (!empty($logoBanco)) {
            if (!empty($logoAtual) && file_exists(__DIR__ . '/../' . $logoAtual)) {
                unlink(__DIR__ . '/../' . $logoAtual);
            }
        } else {
            $logoBanco = $logoAtual;
        }

        $stmt = $pdo->prepare("
            UPDATE parceiros 
            SET nome = ?, logo = ?, link = ?, destaque_carrossel = ?, ordem = ?, ativo = ?, atualizado_em = NOW()
            WHERE id = ?
        ");
        $stmt->execute([$nome, $logoBanco, $link, $destaque_carrossel, $ordem, $ativo, $idParceiro]);

    } else {
        // --- INSERIR NOVO ---
        $stmt = $pdo->prepare("
            INSERT INTO parceiros (nome, logo, link, destaque_carrossel, ordem, ativo, criado_em, atualizado_em) 
            VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())
        ");
        $stmt->execute([$nome, $logoBanco, $link, $destaque_carrossel, $ordem, $ativo]);
    }

    header('Location: parceiros.php?sucesso=1');
    exit;
}

// Buscar todos os registos ordenados
$parceiros = $pdo->query("SELECT * FROM parceiros ORDER BY destaque_carrossel DESC, ordem ASC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Gerenciar Padrinhos e Parceiros</h1>
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
        <h5 class="card-title mb-4"><?= $editando ? 'Editar Registro' : 'Cadastrar Novo Padrinho/Parceiro' ?></h5>
        
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $editando ? $parceiroEditar['id'] : '' ?>">

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Nome da Empresa / Parceiro</label>
                        <input type="text" name="nome" class="form-control" placeholder="Ex: Apeti, Google, etc." value="<?= $editando ? htmlspecialchars($parceiroEditar['nome']) : '' ?>" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Link do Website (URL)</label>
                        <input type="text" name="link" class="form-control" placeholder="Ex: https://empresa.com ou #" value="<?= $editando ? htmlspecialchars($parceiroEditar['link']) : '#' ?>" required>
                    </div>
                </div>
            </div>

            <div class="row g-3 align-items-center mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold">Ordem de Exibição</label>
                        <input type="number" name="ordem" class="form-control" value="<?= $editando ? (int)$parceiroEditar['ordem'] : '1' ?>" required>
                    </div>
                </div>
                
                <div class="col-md-4 pt-4">
                    <div class="form-check">
                        <input type="checkbox" name="destaque_carrossel" id="destaque_carrossel" class="form-check-input" value="1" <?= ($editando && $parceiroEditar['destaque_carrossel'] == 1) ? 'checked' : '' ?>>
                        <label for="destaque_carrossel" class="form-check-label fw-bold">Marcar como Padrinho (Destaque Principal)</label>
                    </div>
                </div>

                <div class="col-md-4 pt-4">
                    <div class="form-check">
                        <input type="checkbox" name="ativo" id="ativo" class="form-check-input" value="1" <?= (!$editando || $parceiroEditar['ativo'] == 1) ? 'checked' : '' ?>>
                        <label for="ativo" class="form-check-label fw-bold">Registro Ativo (Exibir no site)</label>
                    </div>
                </div>
            </div>

            <div class="form-group mb-4">
                <label class="form-label fw-bold">Logotipo da Empresa</label>
                <input type="file" name="logo" class="form-control" accept="image/*" <?= $editando ? '' : 'required' ?>>
                
                <?php if($editando && !empty($parceiroEditar['logo'])): ?>
                    <div class="mt-3">
                        <span class="d-block text-muted small mb-2">Logo atual:</span>
                        <div class="p-2 border rounded-3 bg-light d-inline-block" style="width: 130px; height: 75px;">
                            <img src="../<?= htmlspecialchars($parceiroEditar['logo']) ?>" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm px-4">
                    <?= $editando ? 'Salvar Alterações' : 'Salvar Registro' ?>
                </button>
                <?php if($editando): ?>
                    <a href="parceiros.php" class="btn btn-light btn-sm px-3">Cancelar Edição</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<h2 class="h5 mb-3 mt-5">Registros Cadastrados</h2>
<div class="row g-4">
    <?php foreach($parceiros as $parc): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center bg-light border-bottom p-3" style="height: 140px; border-top-left-radius: 0.375rem; border-top-right-radius: 0.375rem;">
                    <img src="../<?= htmlspecialchars($parc['logo']) ?>" alt="Logo" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>
                <div class="card-body p-3 d-flex flex-column flex-grow-1">
                    <div class="mb-2 d-flex gap-1 flex-wrap">
                        <span class="badge text-bg-<?= $parc['ativo'] == 1 ? 'success' : 'danger' ?> small">
                            <?= $parc['ativo'] == 1 ? 'Ativo' : 'Inativo' ?>
                        </span>
                        <?php if($parc['destaque_carrossel'] == 1): ?>
                            <span class="badge text-bg-warning small text-dark">Padrinho Destaque</span>
                        <?php else: ?>
                            <span class="badge text-bg-secondary small">Apoiador</span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="h6 fw-bold mb-1 text-dark text-truncate" title="<?= htmlspecialchars($parc['nome']) ?>">
                        <?= htmlspecialchars($parc['nome']) ?>
                    </h3>
                    
                    <p class="text-muted small mb-3">Ordem: <?= (int)$parc['ordem'] ?></p>
                    
                    <div class="mt-auto pt-2 border-top d-flex gap-2">
                        <a href="?editar=<?= $parc['id'] ?>" class="btn btn-outline-warning btn-sm flex-grow-1">Editar</a>
                        <a href="?excluir=<?= $parc['id'] ?>" class="btn btn-outline-danger btn-sm flex-grow-1" onclick="return confirm('Deseja realmente excluir este parceiro?');">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>