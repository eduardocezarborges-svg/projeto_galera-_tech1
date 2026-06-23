<?php
if(!isset($pageTitle)){
    $pageTitle = 'Painel Galera Tech';
}
?>
<!doctype html>
<html lang="pt-br" data-bs-theme="light">
    <head>
        <title><?= $pageTitle ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
        <link href="../assets/css/admin.css" rel="stylesheet">
    </head>

    <body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-3 shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        
        <a class="navbar-brand d-flex align-items-center gap-3" href="dashboard.php">

            <img src="apeti_dark.webp" alt="Apeti" height="38" class="d-inline-block align-top">
            
            <div style="width: 1px; height: 30px; background-color: rgba(255,255,255,0.2);"></div>

            <img src="logo_galeratech_dark.webp" alt="Galera Tech" height="42" class="d-inline-block align-top">
           
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavHeader" aria-controls="navbarNavHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavHeader">
            <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
                
                <a href="../index.php" target="_blank" class="btn btn-outline-light btn-sm d-flex align-items-center gap-2 px-3 py-2 border-secondary">
                    <i class="bi bi-globe"></i> Ver Site
                </a>
                
                <a href="logout.php" class="btn btn-danger btn-sm d-flex align-items-center gap-2 px-3 py-2" onclick="return confirm('Tem certeza que deseja sair do painel?');">
                    <i class="bi bi-box-arrow-right"></i> Sair
                </a>

            </div>
        </div>

    </div>
</nav>
<main class="container py-4">