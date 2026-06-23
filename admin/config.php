<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();

$pageTitle = "Configurações Gerais do Site";
require_once __DIR__ . '/includes/header.php';

$msg = '';
if (isset($_GET['sucesso'])) {
    $msg = 'Configurações atualizadas com sucesso!';
}

// Busca as configurações globais do banco (ID 1)
$stmt = $pdo->query("SELECT * FROM rodape_config WHERE id = 1");
$config = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto_sobre = trim($_POST['texto_sobre']);
    $link_instagram = trim($_POST['link_instagram']);
    $link_whatsapp = trim($_POST['link_whatsapp']);
    $texto_whatsapp = trim($_POST['texto_whatsapp']);
    $link_mapa = trim($_POST['link_mapa']);
    $texto_mapa = trim($_POST['texto_mapa']);
    
    $link_util_1 = trim($_POST['link_util_1']);
    $texto_util_1 = trim($_POST['texto_util_1']);
    $link_util_2 = trim($_POST['link_util_2']);
    $texto_util_2 = trim($_POST['texto_util_2']);
    $link_util_3 = trim($_POST['link_util_3']);
    $texto_util_3 = trim($_POST['texto_util_3']);

    $stmtUpdate = $pdo->prepare("
        UPDATE rodape_config SET 
            texto_sobre = ?, link_instagram = ?, link_whatsapp = ?, texto_whatsapp = ?, 
            link_mapa = ?, texto_mapa = ?, link_util_1 = ?, texto_util_1 = ?, 
            link_util_2 = ?, texto_util_2 = ?, link_util_3 = ?, texto_util_3 = ?
        WHERE id = 1
    ");
    $stmtUpdate->execute([
        $texto_sobre, $link_instagram, $link_whatsapp, $texto_whatsapp,
        $link_mapa, $texto_mapa, $link_util_1, $texto_util_1,
        $link_util_2, $texto_util_2, $link_util_3, $texto_util_3
    ]);

    // Redireciona para o novo nome do arquivo
    header('Location: config.php?sucesso=1');
    exit;
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Configurações do Site (Rodapé e Contatos)</h1>
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
        <form method="POST">
            
            <h5 class="card-title text-primary mb-3"><i class="bi bi-building"></i> Bloco Institucional</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label fw-bold">Texto de Introdução (Resumo)</label>
                    <textarea name="texto_sobre" class="form-control" rows="3" required><?= htmlspecialchars($config['texto_sobre'] ?? '') ?></textarea>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <h5 class="card-title text-primary mb-3"><i class="bi bi-telephone"></i> Informações de Contato</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Link do Perfil do Instagram</label>
                    <input type="url" name="link_instagram" class="form-control" value="<?= htmlspecialchars($config['link_instagram'] ?? '') ?>" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label fw-bold">Link da API do WhatsApp</label>
                    <input type="text" name="link_whatsapp" class="form-control" value="<?= htmlspecialchars($config['link_whatsapp'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Texto de Exibição do WhatsApp</label>
                    <input type="text" name="texto_whatsapp" class="form-control" value="<?= htmlspecialchars($config['texto_whatsapp'] ?? '') ?>" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Link de Localização (Google Maps)</label>
                    <input type="text" name="link_mapa" class="form-control" value="<?= htmlspecialchars($config['link_mapa'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Texto de Exibição da Localização</label>
                    <input type="text" name="texto_mapa" class="form-control" value="<?= htmlspecialchars($config['texto_mapa'] ?? '') ?>" required>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <h5 class="card-title text-primary mb-3"><i class="bi bi-link-45deg"></i> Links Úteis do Rodapé</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Texto do Link 1</label>
                    <input type="text" name="texto_util_1" class="form-control" value="<?= htmlspecialchars($config['texto_util_1'] ?? '') ?>" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-bold">URL de Destino 1</label>
                    <input type="text" name="link_util_1" class="form-control" value="<?= htmlspecialchars($config['link_util_1'] ?? '') ?>" required>
                </div>

                <div class="col-md-4 mt-3">
                    <label class="form-label fw-bold">Texto do Link 2</label>
                    <input type="text" name="texto_util_2" class="form-control" value="<?= htmlspecialchars($config['texto_util_2'] ?? '') ?>" required>
                </div>
                <div class="col-md-8 mt-3">
                    <label class="form-label fw-bold">URL de Destino 2</label>
                    <input type="text" name="link_util_2" class="form-control" value="<?= htmlspecialchars($config['link_util_2'] ?? '') ?>" required>
                </div>

                <div class="col-md-4 mt-3">
                    <label class="form-label fw-bold">Texto do Link 3</label>
                    <input type="text" name="texto_util_3" class="form-control" value="<?= htmlspecialchars($config['texto_util_3'] ?? '') ?>" required>
                </div>
                <div class="col-md-8 mt-3">
                    <label class="form-label fw-bold">URL de Destino 3</label>
                    <input type="text" name="link_util_3" class="form-control" value="<?= htmlspecialchars($config['link_util_3'] ?? '') ?>" required>
                </div>
            </div>

            <div class="pt-2 border-top">
                <button type="submit" class="btn btn-primary btn-sm px-4">Salvar Configurações</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>