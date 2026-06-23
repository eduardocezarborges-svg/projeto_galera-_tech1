<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/admin_helpers.php';

require_admin();

$pageTitle = "Dashboard";

require_once __DIR__ . '/includes/header.php';

$pageTitle = "Dashboard - Galera Tech";

// Elementos Card com a adição de ícones correspondentes a cada seção
$cards = [
    ['Hero', 'Slides principais do carrossel', 'hero.php', 'bi-images'],
    ['Indicadores', 'Números de impacto', 'indicadores.php', 'bi-graph-up-arrow'],
    // ['Sobre', 'Texto Institucional', 'manage.php?type=sobre', 'bi-info-circle'],
    // ['Jornada', 'Etapas da experiência', 'manage.php?type=jornada', 'bi-signpost-split'],
    // ['Aprendizado', 'Cards de competência', 'manage.php?type=aprendizado', 'bi-book'],
    // ['Para quem é', 'Públicos da landing page', 'manage.php?type=publico', 'bi-people'],
    // ['Experiências', 'Vivências, visitas e networking', 'manage.php?type=experiencias', 'bi-calendar-event'],
    ['Depoimentos', 'Falas de alunos e parceiros', 'depoimentos.php', 'bi-chat-quote'],
    ['Instagram', 'Posts destacados', 'instagram.php', 'bi-instagram'],
    ['Padrinhos', 'Carrossel e mini logos', 'parceiros.php', 'bi-award'],
    ['CTA', 'Chamada final', 'participar.php', 'bi-megaphone'],
    ['Configurações', 'Logo, contatos e links', 'config.php', 'bi-gear'],
];
?>

<!-- Estilos customizados para elevar a estética do Dashboard -->
<style>
    .custom-card {
        transition: all 0.3s ease-in-out;
        border-top: 4px solid #0d6efd !important; /* Borda superior com a cor primária */
    }
    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.125) !important;
    }
    .icon-box {
        width: 48px;
        height: 48px;
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.75rem;
        font-size: 1.5rem;
    }
</style>

<!-- Certifique-se de carregar os ícones do Bootstrap no seu header.php, caso não tenha, descomente a linha abaixo: -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h1 class="h3 fw-bold text-secondary mb-0">Painel Administrador</h1>
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">Galera Tech v1.0</span>
    </div>

    <div class="row g-4">
        <?php foreach($cards as $card) : ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm custom-card">
                <div class="card-body d-flex flex-column p-4">
                    
                    <!-- Topo do Card: Título + Ícone -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 fw-bold mb-0 text-dark"><?= $card[0] ?></h2>
                        <div class="icon-box">
                            <i class="bi <?= $card[3] ?>"></i>
                        </div>
                    </div>
                    
                    <!-- Descrição -->
                    <p class="text-muted small flex-grow-1"><?= $card[1] ?></p>
                    
                    <!-- Ação -->
                    <div class="mt-3 pt-3 border-top border-light">
                        <a href="<?= $card[2] ?>" class="btn btn-primary btn-sm w-100 py-2 rounded-2 d-flex align-items-center justify-content-center gap-2">
                            <span>Gerenciar</span>
                            <i class="bi bi-arrow-right-short fs-5"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>