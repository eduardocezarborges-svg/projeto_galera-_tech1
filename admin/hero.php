<?php
require_once __DIR__ . '/../config/database.php';

$editando = false;
$slideEditar = null;

if (isset($_GET['editar'])) {
    $id = (int)$_GET['editar'];
    $stmt = $pdo->prepare("SELECT * FROM hero_slides WHERE id = ?");
    $stmt->execute([$id]);
    $slideEditar = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($slideEditar) $editando = true;
}

if (isset($_GET['excluir'])) {
    $id = (int)$_GET['excluir'];
    $stmt = $pdo->prepare("SELECT imagem FROM hero_slides WHERE id = ?");
    $stmt->execute([$id]);
    $slide = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($slide) {
        $arquivo = __DIR__ . '/../' . $slide['imagem'];
        if (file_exists($arquivo)) unlink($arquivo);
        $stmt = $pdo->prepare("DELETE FROM hero_slides WHERE id = ?");
        $stmt->execute([$id]);
    }
    header('Location: hero.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $caminhoBanco = '';
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $pasta = '../uploads/hero/';
        if (!is_dir($pasta)) mkdir($pasta, 0777, true);
        $nomeArquivo = time() . '_' . basename($_FILES['imagem']['name']);
        $destino = $pasta . $nomeArquivo;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            $caminhoBanco = 'uploads/hero/' . $nomeArquivo;
        }
    }

    $tag = trim($_POST['tag']);
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $texto_botao_1 = trim($_POST['texto_botao_1']);
    $link_botao_1 = trim($_POST['link_botao_1']);
    $texto_botao_2 = trim($_POST['texto_botao_2']);
    $link_botao_2 = trim($_POST['link_botao_2']);
    $ordem = (int)$_POST['ordem'];

    if (!empty($_POST['id'])) {
        $idSlide = (int)$_POST['id'];
        $stmtFoto = $pdo->prepare("SELECT imagem FROM hero_slides WHERE id = ?");
        $stmtFoto->execute([$idSlide]);
        $fotoAtual = $stmtFoto->fetchColumn();
        if (!empty($caminhoBanco)) {
            if (!empty($fotoAtual) && file_exists(__DIR__ . '/../' . $fotoAtual)) unlink(__DIR__ . '/../' . $fotoAtual);
        } else {
            $caminhoBanco = $fotoAtual;
        }

        $stmt = $pdo->prepare("UPDATE hero_slides SET tag=?, titulo=?, descricao=?, texto_botao_1=?, link_botao_1=?, texto_botao_2=?, link_botao_2=?, imagem=?, ordem=? WHERE id=?");
        $stmt->execute([$tag, $titulo, $descricao, $texto_botao_1, $link_botao_1, $texto_botao_2, $link_botao_2, $caminhoBanco, $ordem, $idSlide]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO hero_slides (tag, titulo, descricao, texto_botao_1, link_botao_1, texto_botao_2, link_botao_2, imagem, ordem, ativo) VALUES (?,?,?,?,?,?,?,?,?,1)");
        $stmt->execute([$tag, $titulo, $descricao, $texto_botao_1, $link_botao_1, $texto_botao_2, $link_botao_2, $caminhoBanco, $ordem]);
    }
    header('Location: hero.php?sucesso=1');
    exit;
}

$slides = $pdo->query("SELECT * FROM hero_slides ORDER BY ordem ASC, id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Carrossel Hero</title>
    <style>
        body{background:#f5f7fa;padding:40px;font-family:Arial;}
        .container{max-width:1000px;margin:auto;}
        .form-box{background:#fff;padding:25px;border-radius:15px;box-shadow:0 3px 12px rgba(0,0,0,.08);margin-bottom:40px;}
        .form-group{margin-bottom:15px;}
        label{display:block;margin-bottom:5px;font-weight:bold;}
        input, textarea{width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;}
        button{background:#009bd6;color:white;border:none;padding:12px 25px;border-radius:8px;cursor:pointer;font-weight:bold;}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px;}
        .card{background:#fff;border-radius:15px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);padding:15px;}
        .card img{width:100%;height:150px;object-fit:cover;border-radius:10px;}
        .btn-editar{background:#ffc107;padding:8px;border-radius:5px;text-decoration:none;color:#000;display:inline-block;margin-top:10px;}
        .btn-excluir{background:#dc3545;padding:8px;border-radius:5px;text-decoration:none;color:#fff;display:inline-block;margin-top:10px;}
    </style>
</head>
<body>
<div class="container">
    <h1>Gerenciar Carrossel Hero</h1>
    <a href="dashboard.php" style="display:inline-block;margin-bottom:20px;text-decoration:none;color:#009bd6;font-weight:bold;">← Voltar ao Painel</a>
    <div class="form-box">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $editando ? $slideEditar['id'] : '' ?>">
            <div class="form-group"><label>Tag (Rótulo)</label><input type="text" name="tag" value="<?= $editando ? htmlspecialchars($slideEditar['tag']) : '' ?>" required></div>
            <div class="form-group"><label>Título</label><input type="text" name="titulo" value="<?= $editando ? htmlspecialchars($slideEditar['titulo']) : '' ?>" required></div>
            <div class="form-group"><label>Descrição</label><textarea name="descricao" required><?= $editando ? htmlspecialchars($slideEditar['descricao']) : '' ?></textarea></div>
            
            <div style="display:flex;gap:15px;">
                <div class="form-group" style="flex:1;"><label>Texto Botão 1</label><input type="text" name="texto_botao_1" value="<?= $editando ? htmlspecialchars($slideEditar['texto_botao_1']) : '' ?>" required></div>
                <div class="form-group" style="flex:1;"><label>Link Botão 1</label><input type="text" name="link_botao_1" value="<?= $editando ? htmlspecialchars($slideEditar['link_botao_1']) : '' ?>" required></div>
            </div>

            <div style="display:flex;gap:15px;">
                <div class="form-group" style="flex:1;"><label>Texto Botão 2 (Opcional)</label><input type="text" name="texto_botao_2" value="<?= $editando ? htmlspecialchars($slideEditar['texto_botao_2']) : '' ?>"></div>
                <div class="form-group" style="flex:1;"><label>Link Botão 2 (Opcional)</label><input type="text" name="link_botao_2" value="<?= $editando ? htmlspecialchars($slideEditar['link_botao_2']) : '' ?>"></div>
            </div>

            <div class="form-group"><label>Ordem</label><input type="number" name="ordem" value="<?= $editando ? (int)$slideEditar['ordem'] : 1 ?>"></div>
            <div class="form-group"><label>Imagem</label><input type="file" name="imagem" <?= $editando ? '' : 'required' ?>></div>
            <button type="submit"><?= $editando ? 'Atualizar Slide' : 'Salvar Slide' ?></button>
            <?php if($editando): ?><a href="hero.php" style="margin-left:10px;color:#666;text-decoration:none;">Cancelar</a><?php endif; ?>
        </form>
    </div>
    <div class="grid">
        <?php foreach($slides as $s): ?>
        <div class="card">
            <img src="../<?= htmlspecialchars($s['imagem']) ?>">
            <h3 style="margin:10px 0;font-size:18px;"><?= htmlspecialchars($s['titulo']) ?></h3>
            <p style="font-size:13px;color:#666;"><?= htmlspecialchars($s['texto_botao_1']) ?> | <?= htmlspecialchars($s['texto_botao_2'] ?: '-') ?></p>
            <a href="hero.php?editar=<?= $s['id'] ?>" class="btn-editar">Editar</a>
            <a href="hero.php?excluir=<?= $s['id'] ?>" class="btn-excluir" onclick="return confirm('Tem certeza?')">Excluir</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>