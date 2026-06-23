<?php

require_once __DIR__ . '/../config/database.php';

$editando = false;
$depoimentoEditar = null;

if (isset($_GET['editar'])) {

    $id = (int)$_GET['editar'];

    $stmt = $pdo->prepare("
        SELECT *
        FROM depoimentos
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    $depoimentoEditar = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($depoimentoEditar) {
        $editando = true;
    }
}

/* =========================
   EXCLUIR DEPOIMENTO
========================= */
if (isset($_GET['excluir'])) {

    $id = (int)$_GET['excluir'];

    $stmt = $pdo->prepare("
        SELECT foto
        FROM depoimentos
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    $depoimento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($depoimento) {

        if (!empty($depoimento['foto'])) {

            $arquivo = __DIR__ . '/../' . $depoimento['foto'];

            if (file_exists($arquivo)) {
                unlink($arquivo);
            }
        }

        $stmt = $pdo->prepare("
            DELETE FROM depoimentos
            WHERE id = ?
        ");

        $stmt->execute([$id]);
    }

    header('Location: depoimentos.php');
    exit;
}

/* =========================
   MENSAGEM
========================= */

$msg = '';

if (isset($_GET['sucesso'])) {
    $msg = 'Depoimento cadastrado com sucesso!';
}

/* =========================
   CADASTRAR
========================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fotoBanco = '';

    if (
        isset($_FILES['foto']) &&
        $_FILES['foto']['error'] === UPLOAD_ERR_OK
    ) {

        $pasta = '../uploads/depoimentos/';

        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $nomeArquivo =
            time() . '_' .
            basename($_FILES['foto']['name']);

        $destino = $pasta . $nomeArquivo;

        if (
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $destino
            )
        ) {

            $fotoBanco =
                'uploads/depoimentos/' .
                $nomeArquivo;
        }
    }

    $nome = trim($_POST['nome']);
    $cargo = trim($_POST['cargo']);
    $empresa = trim($_POST['empresa']);
    $texto = trim($_POST['texto']);
    $tipo = trim($_POST['tipo']);
    $ordem = (int)$_POST['ordem'];

    $destaque =
        isset($_POST['destaque']) ? 1 : 0;

    $ativo =
        isset($_POST['ativo']) ? 1 : 0;

    if (!empty($_POST['id'])) {

    $stmtFoto = $pdo->prepare("
        SELECT foto
        FROM depoimentos
        WHERE id = ?
    ");

    $stmtFoto->execute([(int)$_POST['id']]);
    $registro = $stmtFoto->fetch(PDO::FETCH_ASSOC);
    $fotoAtual = $registro['foto'] ?? '';

    if (!empty($fotoBanco)) {
        if (!empty($fotoAtual) && file_exists(__DIR__ . '/../' . $fotoAtual)) {
            unlink(__DIR__ . '/../' . $fotoAtual);
        }
    } else {
        $fotoBanco = $fotoAtual;
    }

    $stmt = $pdo->prepare("
        UPDATE depoimentos
        SET nome=?, cargo=?, empresa=?, texto=?, foto=?, tipo=?, destaque=?, ordem=?, ativo=?
        WHERE id=?
    ");

    $stmt->execute([
        $nome,$cargo,$empresa,$texto,$fotoBanco,$tipo,$destaque,$ordem,$ativo,(int)$_POST['id']
    ]);

} else {

    $stmt = $pdo->prepare("
        INSERT INTO depoimentos
        (
            nome,cargo,empresa,texto,foto,tipo,destaque,ordem,ativo
        )
        VALUES
        (
            ?,?,?,?,?,?,?,?,?
        )
    ");

    $stmt->execute([
        $nome,$cargo,$empresa,$texto,$fotoBanco,$tipo,$destaque,$ordem,$ativo
    ]);
}

    header('Location: depoimentos.php?sucesso=1');
    exit;
}

/* =========================
   LISTAR
========================= */

$depoimentos = $pdo->query("
    SELECT *
    FROM depoimentos
    ORDER BY ordem ASC, id DESC
")->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gerenciar Depoimentos</title>

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
    margin-bottom:20px;
}

.btn-voltar{
    display:inline-block;
    margin-bottom:30px;
    padding:12px 20px;
    background:#009bd6;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.form-box{
    background:#fff;
    padding:25px;
    border-radius:15px;
    margin-bottom:40px;
    box-shadow:0 3px 12px rgba(0,0,0,.08);
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
}

input[type=text],
input[type=number],
textarea,
select{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
}

textarea{
    min-height:120px;
}

button{
    background:#009bd6;
    color:#fff;
    border:none;
    padding:12px 25px;
    border-radius:8px;
    cursor:pointer;
}

.grid{
    display:grid;
    grid-template-columns:
    repeat(auto-fill,minmax(320px,1fr));
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

.btn-excluir{
    display:inline-block;
    margin-top:15px;
    padding:10px 15px;
    background:#dc3545;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
}

.msg{
    background:#d4edda;
    color:#155724;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
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
}

.btn-editar:hover{
    background:#e0a800;
}

</style>

</head>
<body>

<div class="container">

<h1>Gerenciar Depoimentos</h1>

<a href="dashboard.php" class="btn-voltar">
    ← Voltar ao Dashboard
</a>

<?php if($msg): ?>
<div class="msg">
    <?= $msg ?>
</div>
<?php endif; ?>

<div class="form-box">

<form method="POST" enctype="multipart/form-data">
    <input
    type="hidden"
    name="id"
    value="<?= $editando ? $depoimentoEditar['id'] : '' ?>">

<div class="form-group">
<label>Nome</label>
<input
    type="text"
    name="nome"
    value="<?= $editando ? htmlspecialchars($depoimentoEditar['nome']) : '' ?>"
    required>
</div>

<div class="form-group">
<label>Cargo</label>
<input
    type="text"
    name="cargo"
    value="<?= $editando ? htmlspecialchars($depoimentoEditar['cargo']) : '' ?>">
</div>

<div class="form-group">
<label>Empresa</label>
<input
    type="text"
    name="empresa"
    value="<?= $editando ? htmlspecialchars($depoimentoEditar['empresa']) : '' ?>">
</div>

<div class="form-group">
<label>Texto</label>
<textarea
    name="texto"
    required><?= $editando ? htmlspecialchars($depoimentoEditar['texto']) : '' ?></textarea>
</div>

<div class="form-group">
<label>Tipo</label>

<select name="tipo">
<option value="aluno">Aluno</option>
<option value="mentor">Mentor</option>
<option value="padrinho">Padrinho</option>
</select>

</div>

<div class="form-group">
<label>Ordem</label>
<input
    type="number"
    name="ordem"
    value="<?= $editando ? (int)$depoimentoEditar['ordem'] : 1 ?>">
</div>

<div class="form-group">
    <label>Foto</label>

    <input
        type="file"
        name="foto"
        accept="image/*">

    <?php if($editando && !empty($depoimentoEditar['foto'])): ?>

        <br><br>

        <img
            src="../<?= htmlspecialchars($depoimentoEditar['foto']) ?>"
            style="
                width:120px;
                height:120px;
                object-fit:cover;
                border-radius:10px;
            ">

    <?php endif; ?>

</div>

<div class="form-group">
<label>
<input type="checkbox" name="destaque">
 Destaque
</label>
</div>

<div class="form-group">
<label>
<input type="checkbox" name="ativo" checked>
 Ativo
</label>
</div>

<button type="submit">
Salvar Depoimento
</button>

</form>

</div>

<div class="grid">

<?php foreach($depoimentos as $dep): ?>

<div class="card">

<?php if(!empty($dep['foto'])): ?>
<img src="../<?= htmlspecialchars($dep['foto']) ?>">
<?php endif; ?>

<div class="card-body">

<h3><?= htmlspecialchars($dep['nome']) ?></h3>

<p>
<strong><?= htmlspecialchars($dep['cargo']) ?></strong>
</p>

<p>
<?= htmlspecialchars($dep['empresa']) ?>
</p>

<br>

<p>
<?= htmlspecialchars($dep['texto']) ?>
</p>

<br>

<p>
Tipo: <?= htmlspecialchars($dep['tipo']) ?>
</p>

<p>
Ordem: <?= (int)$dep['ordem'] ?>
</p>

<a
href="?editar=<?= $dep['id'] ?>"
class="btn-editar">

Editar

</a>

<a
href="?excluir=<?= $dep['id'] ?>"
class="btn-excluir"
onclick="return confirm('Deseja excluir este depoimento?');">

Excluir

</a>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</body>
</html>