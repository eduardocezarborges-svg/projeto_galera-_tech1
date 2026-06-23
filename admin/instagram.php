<?php

require_once __DIR__ . '/../config/database.php';

$editando = false;
$postEditar = null;

// Verificar se está editando
if (isset($_GET['editar'])) {
    $id = (int)$_GET['editar'];

    $stmt = $pdo->prepare("
        SELECT *
        FROM instagram_posts
        WHERE id = ?
    ");
    $stmt->execute([$id]);
    $postEditar = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($postEditar) {
        $editando = true;
    }
}

// Excluir post
if (isset($_GET['excluir'])) {

    $id = (int)$_GET['excluir'];

    // Busca a imagem
    $stmt = $pdo->prepare("
        SELECT imagem
        FROM instagram_posts
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {

        $arquivo = __DIR__ . '/../' . $post['imagem'];

        if (file_exists($arquivo)) {
            unlink($arquivo);
        }

        $stmt = $pdo->prepare("
            DELETE FROM instagram_posts
            WHERE id = ?
        ");

        $stmt->execute([$id]);
    }

    header('Location: instagram.php');
    exit;
}

$msg = '';

if (isset($_GET['sucesso'])) {
    $msg = 'Operação realizada com sucesso!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $caminhoBanco = '';

    // Processamento de Upload de imagem
    if (
        isset($_FILES['imagem']) &&
        $_FILES['imagem']['error'] === UPLOAD_ERR_OK
    ) {

        $pasta = '../uploads/instagram/';

        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $nomeArquivo =
            time() . '_' .
            basename($_FILES['imagem']['name']);

        $destino = $pasta . $nomeArquivo;

        if (
            move_uploaded_file(
                $_FILES['imagem']['tmp_name'],
                $destino
            )
        ) {
            $caminhoBanco = 'uploads/instagram/' . $nomeArquivo;
        }
    }

    $categoria = trim($_POST['categoria']);
    $titulo = trim($_POST['titulo']);
    $link = trim($_POST['link']);
    $ordem = (int)$_POST['ordem'];

    // Se houver ID oculto enviado, estamos EDITANDO
    if (!empty($_POST['id'])) {
        $idPost = (int)$_POST['id'];

        // Buscar imagem atual caso não tenha subido uma nova
        $stmtFoto = $pdo->prepare("SELECT imagem FROM instagram_posts WHERE id = ?");
        $stmtFoto->execute([$idPost]);
        $registro = $stmtFoto->fetch(PDO::FETCH_ASSOC);
        $fotoAtual = $registro['imagem'] ?? '';

        if (!empty($caminhoBanco)) {
            // Se subiu foto nova, apaga a antiga
            if (!empty($fotoAtual) && file_exists(__DIR__ . '/../' . $fotoAtual)) {
                unlink(__DIR__ . '/../' . $fotoAtual);
            }
        } else {
            // Senão, mantém a atual
            $caminhoBanco = $fotoAtual;
        }

        $stmt = $pdo->prepare("
            UPDATE instagram_posts
            SET categoria = ?, titulo = ?, imagem = ?, link = ?, ordem = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $categoria,
            $titulo,
            $caminhoBanco,
            $link,
            $ordem,
            $idPost
        ]);

    } else {
        // Caso contrário, INSERE novo registro
        $stmt = $pdo->prepare("
            INSERT INTO instagram_posts
            (
                categoria,
                titulo,
                imagem,
                link,
                ordem,
                ativo,
                criado_em
            )
            VALUES
            (
                ?,
                ?,
                ?,
                ?,
                ?,
                1,
                NOW()
            )
        ");

        $stmt->execute([
            $categoria,
            $titulo,
            $caminhoBanco,
            $link,
            $ordem
        ]);
    }

    header('Location: instagram.php?sucesso=1');
    exit;
}

$posts = $pdo->query("
    SELECT *
    FROM instagram_posts
    ORDER BY ordem ASC, id DESC
")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gerenciar Instagram</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f5f7fa;
    padding:40px;
}

.container{
    max-width:1200px;
    margin:auto;
}

h1{
    margin-bottom:30px;
    color:#333;
}

.msg{
    background:#d4edda;
    color:#155724;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.form-box{
    background:#fff;
    padding:25px;
    border-radius:15px;
    box-shadow:0 3px 12px rgba(0,0,0,.08);
    margin-bottom:40px;
}

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
}

input[type=text],
input[type=number]{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
}

input[type=file]{
    width:100%;
}

button{
    background:#009bd6;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    opacity:.9;
}

.grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fill,minmax(280px,1fr));
    gap:20px;
}

.card{
    background:#fff;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 3px 12px rgba(0,0,0,.08);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card-body{
    padding:15px;
}

.badge{
    display:inline-block;
    background:#f8b000;
    color:#000;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
    margin-bottom:10px;
}

.card-body h3{
    font-size:18px;
    margin-bottom:10px;
}

.card-body p{
    color:#666;
    font-size:14px;
}

.link{
    margin-top:10px;
    display:block;
    color:#009bd6;
    text-decoration:none;
}
.btn-editar{
    display:inline-block;
    margin-top:15px;
    margin-right:10px;
    padding:10px 15px;
    background:#ffc107;
    color:#000;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    transition:.3s;
}

.btn-editar:hover{
    background:#e0a800;
}

.btn-excluir{
    display:inline-block;
    margin-top:15px;
    padding:10px 15px;
    background:#dc3545;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    transition:.3s;
}

.btn-excluir:hover{
    background:#bb2d3b;
}
.btn-voltar{
    display:inline-block;
    padding:12px 20px;
    background:#009bd6;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
    transition:.3s;
}

.btn-voltar:hover{
    background:#5a6268;
}

</style>

</head>
<body>

<div class="container">

    <h1>Gerenciar Instagram <?= $editando ? '(Editando)' : '' ?></h1>
<div style="margin-bottom:20px;">

    <a href="dashboard.php" class="btn-voltar ">
        ← Voltar ao Painel Administrativo
    </a>

</div>
    <?php if($msg): ?>
        <div class="msg">
            <?= $msg ?>
        </div>
    <?php endif; ?>

    <div class="form-box">

        <form method="POST" enctype="multipart/form-data">
            
            <!-- Campo oculto guardando o ID se estiver editando -->
            <input 
                type="hidden" 
                name="id" 
                value="<?= $editando ? $postEditar['id'] : '' ?>">

            <div class="form-group">
                <label>Categoria</label>
                <input
                    type="text"
                    name="categoria"
                    placeholder="Ex: Aulas práticas"
                    value="<?= $editando ? htmlspecialchars($postEditar['categoria']) : '' ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Título</label>
                <input
                    type="text"
                    name="titulo"
                    placeholder="Título do post"
                    value="<?= $editando ? htmlspecialchars($postEditar['titulo']) : '' ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Link Instagram</label>
                <input
                    type="text"
                    name="link"
                    placeholder="https://instagram.com/..."
                    value="<?= $editando ? htmlspecialchars($postEditar['link']) : '' ?>">
            </div>

            <div class="form-group">
                <label>Ordem</label>
                <input
                    type="number"
                    name="ordem"
                    value="<?= $editando ? (int)$postEditar['ordem'] : 1 ?>">
            </div>

            <div class="form-group">
                <label>Imagem</label>
                <input
                    type="file"
                    name="imagem"
                    accept="image/*"
                    <?= $editando ? '' : 'required' ?>>
                
                <?php if($editando && !empty($postEditar['imagem'])): ?>
                    <br><br>
                    <p style="font-size: 14px; margin-bottom: 5px; color: #666;">Imagem Atual:</p>
                    <img
                        src="../<?= htmlspecialchars($postEditar['imagem']) ?>"
                        style="
                            width:120px;
                            height:120px;
                            object-fit:cover;
                            border-radius:10px;
                        ">
                <?php endif; ?>
            </div>

            <button type="submit">
                <?= $editando ? 'Atualizar Post' : 'Salvar Post' ?>
            </button>
            
            <?php if($editando): ?>
                <a href="instagram.php" style="margin-left: 10px; color: #666; text-decoration: none;">Cancelar Edição</a>
            <?php endif; ?>

        </form>

    </div>

   <div class="grid">

    <?php foreach($posts as $post): ?>

    <div class="card">

        <img
            src="../<?= htmlspecialchars($post['imagem']) ?>"
            alt="Instagram">

        <div class="card-body">

            <span class="badge">
                <?= htmlspecialchars($post['categoria']) ?>
            </span>

            <h3>
                <?= htmlspecialchars($post['titulo']) ?>
            </h3>

            <p>
                Ordem:
                <?= (int)$post['ordem'] ?>
            </p>

            <?php if(!empty($post['link'])): ?>

                <a
                    href="<?= htmlspecialchars($post['link']) ?>"
                    target="_blank"
                    class="link">

                    Abrir link

                </a>

            <?php endif; ?>

            <a
                href="?editar=<?= $post['id'] ?>"
                class="btn-editar">
                Editar
            </a>

            <a
                href="?excluir=<?= $post['id'] ?>"
                class="btn-excluir"
                onclick="return confirm('Deseja realmente excluir este post?');">

                Excluir

            </a>

        </div>

    </div>

    <?php endforeach; ?>

</div>

    </div>

</div>

</body>
</html>