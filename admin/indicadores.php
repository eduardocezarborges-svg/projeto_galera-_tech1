<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();

$pageTitle = "Gerenciar Indicadores de Impacto";
require_once __DIR__ . '/includes/header.php';

$editando = false;
$indicadorEditar = null;

/* ==========================================
   MODO EDIÇÃO (BUSCAR DADOS)
   ========================================== */
if (isset($_GET['editar'])) {
    $id = (int)$_GET['editar'];

    $stmt = $pdo->prepare("SELECT * FROM indicadores WHERE id = ?");
    $stmt->execute([$id]);
    $indicadorEditar = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($indicadorEditar) {
        $editando = true;
    }
}

/* ==========================================
   EXCLUIR REGISTRO
   ========================================== */
if (isset($_GET['excluir'])) {
    $id = (int)$_GET['excluir'];
    
    $stmt = $pdo->prepare("DELETE FROM indicadores WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: indicadores.php');
    exit;
}

/* ==========================================
   PROCESSAR FORMULÁRIO (SALVAR / ATUALIZAR)
   ========================================== */
$msg = '';
if (isset($_GET['sucesso'])) {
    $msg = 'Indicador salvo com sucesso!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $icone = trim($_POST['icone']);
    $numero = trim($_POST['numero']);
    $texto = trim($_POST['texto']);
    $ordem = (int)$_POST['ordem'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;

    if (!empty($_POST['id'])) {
        // --- ATUALIZAR EXISTENTE ---
        $idIndicador = (int)$_POST['id'];
        $stmt = $pdo->prepare("
            UPDATE indicadores 
            SET icone = ?, numero = ?, texto = ?, ordem = ?, ativo = ?, atualizado_em = NOW()
            WHERE id = ?
        ");
        $stmt->execute([$icone, $numero, $texto, $ordem, $ativo, $idIndicador]);
    } else {
        // --- INSERIR NOVO ---
        $stmt = $pdo->prepare("
            INSERT INTO indicadores (icone, numero, texto, ordem, ativo, criado_em, atualizado_em) 
            VALUES (?, ?, ?, ?, ?, NOW(), NOW())
        ");
        $stmt->execute([$icone, $numero, $texto, $ordem, $ativo]);
    }

    header('Location: indicadores.php?sucesso=1');
    exit;
}

// Buscar todos os indicadores ordenados
$indicadores = $pdo->query("SELECT * FROM indicadores ORDER BY ordem ASC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Gerenciar Indicadores (Impacto em Números)</h1>
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
        <h5 class="card-title mb-4"><?= $editando ? 'Editar Indicador' : 'Cadastrar Novo Indicador' ?></h5>
        
        <form method="POST">
            <input type="hidden" name="id" value="<?= $editando ? $indicadorEditar['id'] : '' ?>">

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Ícone do Bootstrap (Classe)</label>
                        <input type="text" name="icone" class="form-control" placeholder="Ex: bi-code-slash, bi-people, bi-mortarboard" value="<?= $editando ? htmlspecialchars($indicadorEditar['icone']) : '' ?>" required>
                        <div class="form-text small text-muted">Use as classes do <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>.</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Número / Dado de Impacto</label>
                        <input type="text" name="numero" class="form-control" placeholder="Ex: +150, 98%, 4.000" value="<?= $editando ? htmlspecialchars($indicadorEditar['numero']) : '' ?>" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold">Texto Descritivo</label>
                        <input type="text" name="texto" class="form-control" placeholder="Ex: Alunos Formados, Horas de Código" value="<?= $editando ? htmlspecialchars($indicadorEditar['texto']) : '' ?>" required>
                    </div>
                </div>
            </div>

            <div class="row g-3 align-items-center mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label fw-bold">Ordem de Exibição</label>
                        <input type="number" name="ordem" class="form-control" value="<?= $editando ? (int)$indicadorEditar['ordem'] : '1' ?>" required>
                    </div>
                </div>

                <div class="col-md-4 pt-4">
                    <div class="form-check">
                        <input type="checkbox" name="ativo" id="ativo" class="form-check-input" value="1" <?= (!$editando || $indicadorEditar['ativo'] == 1) ? 'checked' : '' ?>>
                        <label for="ativo" class="form-check-label fw-bold">Indicador Ativo (Exibir no site)</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm px-4">
                    <?= $editando ? 'Salvar Alterações' : 'Salvar Indicador' ?>
                </button>
                <?php if($editando): ?>
                    <a href="indicadores.php" class="btn btn-light btn-sm px-3">Cancelar Edição</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<h2 class="h5 mb-3 mt-5">Indicadores Cadastrados</h2>
<div class="row g-4">
    <?php foreach($indicadores as $ind): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm text-center p-3 d-flex flex-column">
                <div class="my-3 text-primary" style="font-size: 2.5rem;">
                    <i class="bi <?= htmlspecialchars($ind['icone']) ?>"></i>
                </div>
                <div class="card-body p-2 d-flex flex-column flex-grow-1">
                    <span class="badge text-bg-<?= $ind['ativo'] == 1 ? 'success' : 'danger' ?> mb-2 align-self-center small">
                        <?= $ind['ativo'] == 1 ? 'Ativo' : 'Inativo' ?>
                    </span>
                    
                    <h3 class="h3 fw-bold mb-1 text-dark"><?= htmlspecialchars($ind['numero']) ?></h3>
                    <p class="text-muted small mb-3"><?= htmlspecialchars($ind['texto']) ?></p>
                    <p class="text-secondary small mb-3"><strong>Ordem:</strong> <?= (int)$ind['ordem'] ?></p>
                    
                    <div class="mt-auto pt-2 border-top d-flex gap-2">
                        <a href="?editar=<?= $ind['id'] ?>" class="btn btn-outline-warning btn-sm flex-grow-1">Editar</a>
                        <a href="?excluir=<?= $ind['id'] ?>" class="btn btn-outline-danger btn-sm flex-grow-1" onclick="return confirm('Deseja realmente excluir este indicador?');">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>