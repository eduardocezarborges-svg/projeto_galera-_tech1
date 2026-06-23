<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galera Tech 2026 - Powered by Apeti</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* ── VARIÁVEIS GLOBAIS (MODO CLARO) ── */
 :root {

    /* AZUL DA LOGO */
    --azul: #0099D6;
    --azul-escuro: #0078A8;
    --azul-claro: #EAF7FD;

    /* AMARELO DA LOGO */
    --amarelo: #F5B400;
    --laranja-gt: #F5B400;
    --laranja: #F5B400;

    /* CINZAS DA LOGO */
    --cinza: #6B6B6B;
    --cinza-escuro: #4F4F4F;
    --cinza-claro: #F0F4F8;;

    /* BRANCO */
    --branco: #FFFFFF;

    /* NAVBAR */
    --navbar-bg: #ffffff;

    /* HERO */
    --hero-grad-1: #ffffff00;
    --hero-grad-2: #f3fafd00;

    /* TEXTOS */
    --texto-p: #707070;

    /* CARDS */
    --card-dados-bg: #FFFFFF;
    --card-dados-shadow: rgba(0,153,214,.12);

    /* SEÇÕES */
    --bg-container-destaque: #F7FBFD;

    /* BOX AZUL */
    --bg-para-quem: #0087BF;
    --texto-para-quem-p: rgba(255,255,255,.85);

    /* BORDAS */
    --roxo: #0099D6;
}

        /* ── VARIÁVEIS (MODO ESCURO) ── */
        [data-bs-theme="dark"] {
            --cinza: #ced4da;
            --cinza-escuro: #f8f9fa;
            --cinza-claro: #0f172a; 
            --branco: #1e293b;      
            --navbar-bg: #1e293b;
            --azul-claro: #0f2d4a; 
            --hero-grad-1: #0f172a;
            --hero-grad-2: #1e293b;
            --texto-p: #cbd5e1;
            --card-dados-bg: #0f172a;
            --card-dados-shadow: rgba(0, 0, 0, 0.5);
            --bg-container-destaque: #1e293b; 

            /* TOM DE AZUL AJUSTADO PARA O MODO ESCURO */
            --bg-para-quem: #163654; 
            --texto-para-quem-p: #cbd5e1;
        }

        /* ── RESET E BASE ── */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: var(--cinza);
            background-color: var(--cinza-claro); 
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
            position: relative;
        }

        html { scroll-behavior: smooth; }

        section { scroll-margin-top: 90px; }

        /* ── NAVBAR & LOGOS ── */
        .navbar {
            background-color: var(--navbar-bg);
            box-shadow: 0 4px 8px rgba(159, 172, 160, 0.74);/**/
            padding: 5px 0;
            transition: background-color 0.3s ease;
        }
        
        .brand-logos {
            display: flex;
            align-items: center;
            gap: 12px; 
        }
        
        .brand-logos img {
            height: 50px; 
            width: auto;
            object-fit: contain;
        }

        body[data-bs-theme="light"] .logo-dark-mode { display: none !important; }
        body[data-bs-theme="dark"] .logo-light-mode { display: none !important; }

        .dark-mode-toggle {
            cursor: pointer;
            font-size: 1.3rem;
            color: var(--azul);
            background: none;
            border: none;
            padding: 5px 12px;
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
        }
        .dark-mode-toggle:hover { transform: scale(1.1); }

        /* ── MENU ANIMADO ── */
        .navigation ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 5px;
        }
        .navigation ul li {
            position: relative;
            width: 90px;
            height: 60px;
            z-index: 1;
        }
        .navigation ul li a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: var(--cinza);
            font-size: 0.7rem;
            font-weight: 700;
        }
        .navigation ul li .icon {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            transition: 0.5s;
            text-align: center;
            padding: 5px;
            white-space: nowrap;
        }
        .navigation ul li.active .icon {
            background: #1ea5dab6;
            color: #fff;
            transform: translateY(-12px);
            height: 45px;
            box-shadow: 0 4px 8px rgba(159, 172, 160, 0.774);/**/
            border: 3px solid var(--navbar-bg);
        }

        /* ── HERO SECTION ── */
        .hero {
            background: linear-gradient(135deg, var(--hero-grad-1) 0%, var(--hero-grad-2) 100%);
            transition: background 0.3s ease;
            min-height: 500px;
        }
        .hero h1 { font-size: 3rem; font-weight: 900; color: var(--cinza-escuro); line-height: 1.1; }
        .hero h1 span { color: var(--laranja); } /*span*/
        .hero p { color: var(--texto-p); }

        .carousel-item {
            will-change: transform, opacity; 
            transition: opacity 0.8s cubic-bezier(0.25, 1, 0.5, 1) !important;
        }

        .tag {
            background: var(--azul-claro);
            color: var(--azul);
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.85rem;
            margin-bottom: 15px;
            display: inline-block;
        }

        .btn-gt {
            background-color: var(--azul);
            color: #fff;
            border-radius: 40px;
            padding: 12px 30px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }
        .btn-gt:hover { background-color: var(--azul-escuro); color: #fff; transform: scale(1.05); }

    .hero-image img {
    width: 100%;
    aspect-ratio: 4 / 3; /* Mantém todas as imagens na mesma proporção retangular */
    object-fit: cover;
    border-radius: 34px;
    box-shadow: 0 8px 20px var(--card-dados-shadow);
    display: block;
}

    .carousel-indicators button { background-color: var(--azul) !important; }

    /* ── CONTAINERS DE SEÇÃO ── */
    .secao-container {
            background-color: var(--branco);
            border-radius: 28px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08); 
            padding: 60px 50px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

    .secao-container.bg-destaque {
            background-color: var(--bg-container-destaque);
        }

      
    .sobre-img-box {
    border-radius: 20px;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.sobre-img-box img {
    width: 100%;
    aspect-ratio: 4 / 3; /* Mantém todas as imagens na mesma proporção retangular */
    object-fit: cover;
    border-radius: 34px;
    /* box-shadow: 0 8px 20px var(--card-dados-shadow); */
     box-shadow: 0 4px 8px rgba(159, 172, 160, 0.8);
    display: block;
}
        
        .secao-header h2 {
            font-size: 2.6rem;
            font-weight: 800;
            color: var(--cinza-escuro);
            margin-bottom: 15px;
        }
        .secao-header p {
            color: var(--texto-p);
            max-width: 750px;
            margin: 0 auto 40px auto;
        }

        /* ── BOX "PARA QUEM É" - NOVO TOM AZUL COMBINADO E DESTACADO ── */
        /* Efeito de zoom na box azul */
.secao-container.para-quem-azul-box {
    background-color: var(--bg-para-quem);
    box-shadow: 0 12px 30px rgba(0, 92, 138, 0.2);
    margin-top: 40px;
    text-align: left;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    cursor: pointer;
}

/* Quando o mouse passa em cima */
.secao-container.para-quem-azul-box:hover {
    transform: scale(1.03) translateY(-5px);
    box-shadow: 0 20px 45px rgba(0, 155, 214, 0.35);
}

        .para-quem-tag {
            background-color: var(--branco);
            color: var(--azul-escuro);
            padding: 6px 18px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 20px;
        }

        [data-bs-theme="dark"] .para-quem-tag {
            background-color: var(--azul-claro);
            color: #fff;
        }

        .secao-container.para-quem-azul-box h3 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff; /* Texto branco para leitura perfeita no fundo azul */
            line-height: 1.2;
            margin-bottom: 15px;
        }

        .secao-container.para-quem-azul-box p.desc-principal {
            color: var(--texto-para-quem-p);
            font-size: 1.05rem;
            line-height: 1.6;
            margin: 0;
        }

        .para-quem-lista {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .para-quem-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .para-quem-item i {
            font-size: 1.6rem;
            color: #ffffff; /* Ícones brancos para harmonizar */
            margin-top: 2px;
            opacity: 0.9;
        }

        .para-quem-item h5 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .para-quem-item p {
            font-size: 0.95rem;
            color: var(--texto-para-quem-p);
            margin: 0;
        }
   /* ── ESTRUTURA BOX PRINCIPAL ── */
        .experiencias-container-box {
            background-color: var(--bg-container-destaque);
            padding: 60px;
            border-radius: 40px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        /* ── TAG DESTAQUE AZUL ── */
        .tag-destaque {
            display: inline-block;
            background-color: var(--azul);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        /* ── TOPO E GRID ── */
        .experiencias-topo { max-width: 760px; margin-bottom: 50px; }
        .experiencias-topo h2 { font-size: 3rem; font-weight: 800; color: var(--cinza-escuro); margin-bottom: 20px; }
        .experiencias-topo p { font-size: 1.1rem; line-height: 1.8; color: var(--texto-p); }
        .experiencias-grid { display: grid; grid-template-columns: 1.1fr 1fr; gap: 28px; }

        /* ── CARD GRANDE COM ANIMACAO ── */
        .card-experiencia-grande {
            position: relative; height: 540px; border-radius: 32px; overflow: hidden; cursor: pointer;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }
        .card-experiencia-grande img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
        .overlay-experiencia { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.80), rgba(0,0,0,0.05)); }
        .conteudo-grande { position: absolute; bottom: 35px; left: 35px; right: 35px; z-index: 2; color: white; }
        .card-experiencia-grande:hover { transform: translateY(-10px); box-shadow: 0 25px 50px rgba(0, 155, 214, 0.25); }
        .card-experiencia-grande:hover img { transform: scale(1.08); }

        /* ── MINI CARDS COM ANIMACAO ── */
        .cards-direita { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
        .mini-card {
            background: var(--branco); border: 1px solid var(--cinza-claro); border-radius: 28px;
            padding: 35px 28px; position: relative; overflow: hidden; min-height: 250px;
            transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
        }
        .mini-card::before {
            content: ""; position: absolute; top: -100%; left: -60%; width: 200%; height: 250%;
            background: linear-gradient(120deg, transparent, rgba(0,155,214,0.08), transparent);
            transform: rotate(25deg); transition: 0.8s;
        }
        .mini-card:hover { transform: translateY(-8px); border-color: rgba(0,155,214,0.3); box-shadow: 0 20px 40px rgba(0,155,214,0.12); }
        .mini-card:hover::before { left: 120%; }
        
        .icone-box { width: 70px; height: 70px; border-radius: 50%; background: var(--azul-claro); display: flex; align-items: center; justify-content: center; margin-bottom: 28px; transition: 0.4s; }
        .icone-box i { font-size: 2rem; color: var(--azul); transition: 0.4s; }
        .mini-card:hover .icone-box { transform: scale(1.08) rotate(6deg); background: var(--azul); }
        .mini-card:hover .icone-box i { color: white; }

        /* .arrow { position: absolute; right: 2.mini-card:hover .arrow { transform: translateX(8px); }8px; bottom: 25px; font-size: 1.5rem; color: var(--azul); transition: 0.3s; } */
        

        @media (max-width: 991px) {
            .experiencias-container-box { padding: 30px; }
            .experiencias-grid { grid-template-columns: 1fr; }
            .cards-direita { grid-template-columns: 1fr; }
        }

/* =========================
   DEPOIMENTOS MODERNOS
========================= */

.section-padding {
    padding: 80px 0;
}

/* CARD PRINCIPAL */
.main-testimonial {
    background: var(--card-dados-bg);
    border-radius: 28px;
    padding: 45px;
    height: 100%;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
}

.main-testimonial:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 155, 214, 0.20);
}

.quote-icon {
    font-size: 4rem;
    color: var(--laranja-gt);
    line-height: 1;
    margin-bottom: 15px;
}

.testimonial-text {
    font-size: 1.8rem;
    line-height: 1.5;
    color: var(--cinza-escuro);
    margin: 20px 0 35px;
    font-style: italic;
}

/* FOTO E AUTOR NO CARD PRINCIPAL */
.main-testimonial img {
    width: 85px;
    height: 85px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid var(--azul-claro);
}

.main-testimonial h5 {
    color: var(--azul);
    font-weight: 700;
    font-size: 1.2rem;
}

.main-testimonial small {
    color: var(--texto-p);
    font-size: 0.95rem;
}

/* CARDS LATERAIS (MINI DEPOIMENTOS) */
.side-testimonial {
    background: var(--card-dados-bg);
    border-left: 5px solid var(--azul);
    border-radius: 22px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    transition: all 0.35s ease;
}

.side-testimonial:hover {
    transform: translateX(8px);
    box-shadow: 0 15px 30px rgba(0, 155, 214, 0.15);
}

.side-testimonial p {
    font-size: 1.05rem;
    color: var(--cinza-escuro);
    margin-bottom: 15px;
    line-height: 1.6;
}

.side-testimonial strong {
    display: block;
    font-size: 1.1rem;
    color: var(--azul);
    font-weight: 700;
}

.side-testimonial small {
    color: var(--texto-p);
    font-size: 0.9rem;
}

/* RESPONSIVO */
@media (max-width: 991px) {
    .section-padding {
        padding: 50px 0;
    }
    
    .testimonial-text {
        font-size: 1.4rem;
    }

    .main-testimonial {
        padding: 30px;
    }
    
    .main-testimonial img {
        width: 70px;
        height: 70px;
    }
}

/* =========================================
   ANIMAÇÕES EXTRAS - DEPOIMENTOS
========================================= */

/* 1-Efeito de zoom diretamente na foto do depoimento */
.main-testimonial img, 
.autor-box img {
    transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s ease, border-color 0.4s ease;
    cursor: pointer;
}

.main-testimonial img:hover, 
.autor-box img:hover {
    transform: scale(1.15); /* Amplia a foto em 15% */
    box-shadow: 0 10px 25px rgba(0, 153, 214, 0.35); /* Sombra elegante no tom azul do projeto */
    border-color: var(--laranja-gt); /* Opcional: muda a borda para a cor laranja */
}

/* 2- Efeito na borda esquerda dos mini depoimentos */
.side-testimonial:hover {
    border-left-color: var(--laranja-gt); /* Troca a bordinha azul por laranja no hover */
}
/* ───────── INSTAGRAM ───────── */
/* =========================
   INSTAGRAM
========================= */

#instagram-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:24px;
}

#instagram-grid a,
.instagram-card{
    position:relative;
    display:block;
    height:340px;

    border-radius:28px;
    overflow:hidden;

    text-decoration:none;

    box-shadow:0 10px 25px rgba(0,0,0,0.08);

    transition:
        transform .45s ease,
        box-shadow .45s ease;
}

/* Imagem */

#instagram-grid img{
    width:100%;
    height:100%;
    object-fit:cover;

    transition:transform .8s ease;
}

/* Overlay escuro */

#instagram-grid a::after,
.instagram-card::after{
    content:"";

    position:absolute;
    inset:0;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,.88),
            rgba(0,0,0,.10)
        );

    z-index:1;
}

/* Brilho animado */

#instagram-grid a::before,
.instagram-card::before{
    content:"";

    position:absolute;

    top:-120%;
    left:-50%;

    width:200%;
    height:250%;

    background:
        linear-gradient(
            120deg,
            transparent,
            rgba(255,255,255,.15),
            transparent
        );

    transform:rotate(25deg);

    transition:.9s;

    z-index:3;

    pointer-events:none;
}

#instagram-grid a:hover::before,
.instagram-card:hover::before{
    left:120%;
}

/* Hover */

#instagram-grid a:hover,
.instagram-card:hover{
    transform:translateY(-12px);

    box-shadow:
        0 25px 50px rgba(0,155,214,.22);
}

#instagram-grid a:hover img,
.instagram-card:hover img{
    transform:scale(1.10);
}
/* Estilização da caixa de informações dentro do card do Instagram */
.instagram-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 25px;
    z-index: 2; /* Fica acima do overlay escuro */
    text-align: left;
}

/* Tag amarela (ex: Aulas práticas, Conexões) */
.instagram-info h4 {
    display: inline-block;
    background-color: var(--amarelo);
    color: #000000;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Título descritivo do post */
.instagram-info p {
    color: #ffffff;
    font-size: 1.15rem;
    font-weight: 700;
    line-height: 1.3;
    margin: 0;
}

/* Responsivo */

@media(max-width:992px){

    #instagram-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){

    #instagram-grid{
        grid-template-columns:1fr;
    }
}
/* ───────── PARCEIROS ESTILO STRIPE ───────── */
#parceiros .secao-container {
    overflow: hidden;
}

.parceiros-stripe {
    overflow: hidden;
    width: 100%;
    position: relative;
}

.parceiros-track {
    display: flex;
    align-items: center;
    gap: 70px;

    width: fit-content;

    animation: scrollParceiros 30s linear infinite;
}

/* PAUSAR AO PASSAR O MOUSE */
.parceiros-track:hover {
    animation-play-state: paused;
}

.logo-item {
    flex: 0 0 auto;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;
}

.logo-item:hover img {
    transform: scale(1.08);
    opacity: 1;
} 

.logo-item img {
    width: 120px;
    max-width: 120px;

    object-fit: contain;

    display: block;

    opacity: 0.9;

    transition:
        transform 0.35s ease,
        opacity 0.35s ease;
}

@keyframes scrollParceiros {

    from {
        transform: translate3d(0,0,0);
    }

    to {
        transform: translate3d(-50%,0,0);
    }
}


/* RESPONSIVO */

@media (max-width: 768px) {

    .parceiros-track {
        gap: 50px;

        /* MOBILE UM POUCO MAIS LENTO */
        animation: scrollParceiros 30s linear infinite;
    }

    .logo-item img {
        width: 90px;
    }
}
/* RESPONSIVO */

@media (max-width: 991px) {

    .instagram-grid {
        grid-template-columns: 1fr;
    }

    .instagram-content h4 {
        font-size: 1.3rem;
    }
}
/* ───────── APOIADORES ───────── */

.apoiadores-box {

    margin-top: 50px;

    background: var(--branco);

    border-radius: 32px;

    padding: 35px 30px;

    text-align: center;

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.apoiadores-box h4 {

    font-size: 1.3rem;
    font-weight: 700;

    color: var(--cinza-escuro);

    margin-bottom: 30px;
}

.apoiadores-grid {

    display: flex;

    justify-content: center;
    align-items: center;

    gap: 40px;

    flex-wrap: wrap;
}

.apoiadores-grid img {

    width: 95px;

    object-fit: contain;

    opacity: 0.7;

    filter: grayscale(100%);

    transition: 0.35s ease;
}

.apoiadores-grid img:hover {

    opacity: 1;

    transform: scale(1.08);

    filter: grayscale(0%);
}

        /* ── GRID E CARDS PADRONIZADOS ── */
        .grid-cards-gt {
            display: flex;
            gap: 22px;
            justify-content: space-between;
        }

        .card-custom-gt {
            background-color: var(--card-dados-bg);
            border: 2px solid rgba(159, 172, 160, 0.8);
         /*Bordas das box estatisticas*/
            border-radius: 20px;
            padding: 35px 25px;
            flex: 1;
            box-shadow: 0 4px 8px rgba(159, 172, 160, 0.8);
            transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.3s ease;
            position: relative;
        }

        .card-custom-gt:hover {
            transform: translateY(-8px); 
            box-shadow: 0 4px 8px rgba(159, 172, 160, 0.8);
        }

        .card-custom-gt i.icon-card {
            font-size: 2.2rem;
            color: var(--laranja); /*icones*/
            display: block;
            margin-bottom: 15px;
        }

        .card-custom-gt h3 {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--azul);
            margin-bottom: 8px;
        }

        .card-custom-gt h4 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--cinza-escuro);
            margin-bottom: 12px;
        }

        .card-custom-gt p {
            font-size: 0.95rem;
            color: var(--texto-p);
            margin: 0;
            line-height: 1.6;
        }

        .passo-numero {
            width: 42px;
            height: 42px;
            background-color: var(--laranja-gt);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(230, 126, 34, 0.25);
        }
        /* ───────── CTA COM SLIDER ───────── */

.cta-slider-box {

    position: relative;

    height: 420px;

    border-radius: 34px;

    overflow: hidden;

    margin-bottom: 70px;

    box-shadow:
        0 20px 50px rgba(0,0,0,0.15);
}

/* IMAGENS */

.cta-bg {

    position: absolute;

    inset: 0;

    background-size: cover;
    background-position: center;

    opacity: 0;

    transform: scale(1.08);

    transition:
        opacity 1.2s ease,
        transform 7s ease;
}

.cta-bg.active {

    opacity: 1;

    transform: scale(1);
}

/* OVERLAY */

.cta-overlay {

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            rgba(0,0,0,0.55),
            rgba(0,0,0,0.65)
        );

    z-index: 2;
}

/* CONTEÚDO */

.cta-content {

    position: relative;

    z-index: 3;

    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    text-align: center;

    padding: 40px;
}

/* TAG */

.cta-tag {

    background: white;

    color: var(--azul);

    font-weight: 700;

    padding: 8px 18px;

    border-radius: 30px;

    margin-bottom: 25px;
}

/* TITULO */

.cta-content h2 {

    color: white;

    font-size: 3rem;

    font-weight: 800;

    max-width: 900px;

    margin-bottom: 18px;
}

/* TEXTO */

.cta-content p {

    color: rgba(255,255,255,0.85);

    font-size: 1.1rem;

    margin-bottom: 35px;
}

/* BOTÕES */

.cta-buttons {

    display: flex;

    gap: 18px;

    flex-wrap: wrap;

    justify-content: center;
}

.btn-cta-primary {

    background: white;

    color: black;

    padding: 15px 32px;

    border-radius: 50px;

    font-weight: 700;

    text-decoration: none;

    transition: 0.35s ease;
}

.btn-cta-primary:hover {

    transform: translateY(-5px);

    color: black;
}

.btn-cta-outline {

    border: 1.5px solid rgba(255,255,255,0.7);

    color: white;

    padding: 15px 32px;

    border-radius: 50px;

    font-weight: 700;

    text-decoration: none;

    transition: 0.35s ease;
}

.btn-cta-outline:hover {

    background: white;

    color: black;

    transform: translateY(-5px);
}

/* ───────── FOOTER ───────── */

.footer-gt {

    padding-top: 10px;
}

.footer-grid {

    display: grid;

    grid-template-columns: 1.4fr 1fr 1fr;

    gap: 40px;

    padding-bottom: 35px;

    border-bottom: 1px solid rgba(0,0,0,0.08);
}

/* LOGO */

.footer-logo {

    width: 180px;

    margin-bottom: 20px;
}

.footer-text {

    color: var(--texto-p);

    line-height: 1.7;

    max-width: 420px;
}

/* TÍTULOS */

.footer-grid h4 {

    font-size: 1.5rem;

    font-weight: 700;

    color: var(--cinza-escuro);

    margin-bottom: 22px;
}

/* LINKS */

.footer-links {

    list-style: none;

    padding: 0;
}

.footer-links li {

    margin-bottom: 14px;

    color: var(--texto-p);

    display: flex;
    align-items: center;
    gap: 10px;
}

/* COPYRIGHT */

.footer-copy {

    text-align: center;

    padding-top: 28px;

    color: var(--texto-p);

    font-size: 0.95rem;
}

/* RESPONSIVO */

@media (max-width: 991px) {

    .cta-slider-box {

        height: auto;

        min-height: 480px;
    }

    .cta-content h2 {

        font-size: 2rem;
    }

    .footer-grid {

        grid-template-columns: 1fr;

        gap: 30px;
    }
}

        /* ── WHATSAPP ── */
        .whatsapp-container {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1000;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .whatsapp-float {
            background-color: #25d366;
            color: white;
            border-radius: 50px;
            height: 60px;
            display: flex;
            align-items: center;
            box-shadow: 2px 4px 15px rgba(0,0,0,0.2);
            text-decoration: none;
            overflow: hidden;
            white-space: nowrap;
            transition: background-color 0.3s, box-shadow 0.3s, transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .whatsapp-float i {
            font-size: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px; height: 60px;
            flex-shrink: 0;
            background-color: #25d366;
            border-radius: 50px;
            z-index: 2;
        }
        .whatsapp-text {
            display: inline-block;
            font-weight: 600;
            font-size: 14px;
            padding-left: 25px;
            margin-right: -10px;
            z-index: 1;
            max-width: 0;
            opacity: 0;
            transform: translateX(20px);
            transition: max-width 0.35s ease, opacity 0.2s ease, transform 0.35s cubic-bezier(0.19, 1, 0.22, 1);
        }
        .whatsapp-container:hover .whatsapp-float { background-color: #20ba56; transform: scale(1.02); }
        .whatsapp-container:hover .whatsapp-text { max-width: 250px; opacity: 1; transform: translateX(0); margin-right: 12px; }

        @media (max-width: 991px) {
            .navigation ul { flex-wrap: wrap; justify-content: center; }
            .navigation ul li { width: 80px; height: 50px; }
            .navigation ul li.active .icon { transform: translateY(0); }
            .hero h1 { font-size: 2.2rem; }
            .secao-header h2 { font-size: 1.8rem; }
            .secao-container { padding: 40px 25px; border-radius: 20px; }
            .secao-container.para-quem-azul-box { padding: 40px 25px; }
            .secao-container.para-quem-azul-box h3 { font-size: 1.7rem; }
            .sobre-img-box { min-height: 250px; }
            .grid-cards-gt { flex-direction: column; gap: 20px; } 
            .grid-cards-gt.stats { margin-top: 40px; }
        }

        /* ==========================
   SCROLL REVEAL
========================== */

.reveal-left,
.reveal-right,
.reveal-up {

    opacity: 0;

    transition:
        opacity .9s ease,
        transform .9s ease;

    will-change: transform, opacity;
}

.reveal-left {
    transform: translateX(-80px);
}

.reveal-right {
    transform: translateX(80px);
}

.reveal-up {
    transform: translateY(60px);
}

.reveal-active {

    opacity: 1 !important;

    transform: translate(0,0) !important;
}

.indicador-icon{
    font-size: 2rem;
    color: #ffd43b;
    margin-bottom: 20px;
    display:block;
}

  .admin-container-footer{
    display:flex;
    justify-content:center;
    margin:30px 0 50px;
}

.admin-btn{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 22px;
    background:rgba(255,255,255,0.08);
    border:1px solid rgba(255,255,255,0.15);
    border-radius:999px;
    color:#888;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    transition:all .3s ease;
}

.admin-btn i{
    font-size:16px;
}

.admin-btn:hover{
    color:#fff;
    background:var(--azul);
    border-color:var(--azul);
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}
/* Container Flutuante na Lateral */
.acessibilidade-flutuante {
    position: fixed;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    background-color: var(--bs-body-bg);
    border: 1px solid var(--bs-border-color);
    border-radius: 30px; /* Formato de cápsula vertical super elegante */
    padding: 6px;
    gap: 6px;
    z-index: 1060; /* Fica acima de quase tudo */
    transition: all 0.3s ease;
}

/* Botões Circulares Internos */
.acessibilidade-flutuante button {
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background-color: transparent;
    color: var(--bs-body-color);
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.2s ease, color 0.2s ease;
}

/* Efeito ao passar o mouse */
.acessibilidade-flutuante button:hover {
    background-color: var(--bs-secondary-bg);
    color: #ff0014; /* Vermelho institucional APETI de destaque no hover */
}

/* Ícones pequenos dentro dos botões */
.acessibilidade-flutuante button i {
    font-size: 10px;
    margin-right: 1px;
}

/* Esconder ou reajustar em telas muito pequenas (opcional) */
@media (max-width: 768px) {
    .acessibilidade-flutuante {
        right: 10px;
        transform: translateY(0);
        top: auto;
        bottom: 80px; /* Move para o canto inferior no celular */
    }
}

/* ── INSTAGRAM ── */
.instagram-container {
    position: fixed;
    bottom: 100px; /* acima do WhatsApp */
    right: 25px;
    z-index: 1000;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.instagram-float {
    background: linear-gradient(
        45deg,
        #f58529,
        #dd2a7b,
        #8134af,
        #515bd4
    );
    color: white;
    border-radius: 50px;
    height: 60px;
    display: flex;
    align-items: center;
    text-decoration: none;
    overflow: hidden;
    white-space: nowrap;
    box-shadow: 2px 4px 15px rgba(0,0,0,0.2);
    transition:
        box-shadow 0.3s,
        transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.instagram-float i {
    font-size: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    z-index: 2;
}

.instagram-text {
    display: inline-block;
    font-weight: 600;
    font-size: 14px;
    padding-left: 25px;
    margin-right: -10px;
    max-width: 0;
    opacity: 0;
    transform: translateX(20px);
    transition:
        max-width 0.35s ease,
        opacity 0.2s ease,
        transform 0.35s cubic-bezier(0.19, 1, 0.22, 1);
}

.instagram-container:hover .instagram-float {
    transform: scale(1.02);
    box-shadow: 4px 6px 20px rgba(0,0,0,0.3);
}

.instagram-container:hover .instagram-text {
    max-width: 250px;
    opacity: 1;
    transform: translateX(0);
    margin-right: 12px;
}
/* ============================================
   1. ESTILOS BÁSICOS DO BOTÃO
   ============================================ */

/* Botão padrão com estilo moderno */
[vw-access-button] {
    background-color: #667eea !important;
    border: none !important;
    border-radius: 50px !important;
    width: 60px !important;
    height: 60px !important;
    bottom: 30px !important;
    right: 18px !important;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4) !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

/* Efeito hover */
[vw-access-button]:hover {
    background-color: #764ba2 !important;
    box-shadow: 0 6px 16px rgba(118, 75, 162, 0.5) !important;
    transform: scale(1.1) !important;
}

/* Efeito ativo/clicado */
[vw-access-button]:active {
    transform: scale(0.95) !important;
}

/* ============================================
   2. VARIAÇÕES DE COR
   ============================================ */

/* Tema Azul */
.vlibras-theme-blue [vw-access-button] {
    background-color: #0066cc !important;
}

.vlibras-theme-blue [vw-access-button]:hover {
    background-color: #0052a3 !important;
}

/* Tema Verde */
.vlibras-theme-green [vw-access-button] {
    background-color: #27ae60 !important;
}

.vlibras-theme-green [vw-access-button]:hover {
    background-color: #229954 !important;
}

/* Tema Vermelho */
.vlibras-theme-red [vw-access-button] {
    background-color: #e74c3c !important;
}

.vlibras-theme-red [vw-access-button]:hover {
    background-color: #c0392b !important;
}

/* Tema Laranja */
.vlibras-theme-orange [vw-access-button] {
    background-color: #f39c12 !important;
}

.vlibras-theme-orange [vw-access-button]:hover {
    background-color: #d68910 !important;
}

/* Tema Roxo */
.vlibras-theme-purple [vw-access-button] {
    background-color: #9b59b6 !important;
}

.vlibras-theme-purple [vw-access-button]:hover {
    background-color: #8e44ad !important;
}

/* ============================================
   3. VARIAÇÕES DE TAMANHO
   ============================================ */

/* Botão Pequeno */
.vlibras-size-small [vw-access-button] {
    width: 45px !important;
    height: 45px !important;
    bottom: 20px !important;
    right: 20px !important;
    font-size: 20px !important;
}

/* Botão Grande */
.vlibras-size-large [vw-access-button] {
    width: 80px !important;
    height: 80px !important;
    bottom: 40px !important;
    right: 40px !important;
    font-size: 40px !important;
}

/* Botão Extra Grande */
.vlibras-size-xlarge [vw-access-button] {
    width: 100px !important;
    height: 100px !important;
    bottom: 50px !important;
    right: 50px !important;
    font-size: 50px !important;
}

/* ============================================
   4. VARIAÇÕES DE POSIÇÃO
   ============================================ */

/* Canto inferior esquerdo */
.vlibras-position-bottom-left [vw-access-button] {
    bottom: 30px !important;
    left: 30px !important;
    right: auto !important;
}

/* Canto superior direito */
.vlibras-position-top-right [vw-access-button] {
    top: 30px !important;
    bottom: auto !important;
    right: 30px !important;
}

/* Canto superior esquerdo */
.vlibras-position-top-left [vw-access-button] {
    top: 30px !important;
    bottom: auto !important;
    left: 30px !important;
    right: auto !important;
}

/* Centro da tela (horizontal) */
.vlibras-position-center [vw-access-button] {
    left: 50% !important;
    right: auto !important;
    transform: translateX(-50%) !important;
    bottom: 30px !important;
}

/* ============================================
   5. ESTILOS ESPECIAIS
   ============================================ */

/* Botão com borda */
.vlibras-style-bordered [vw-access-button] {
    border: 3px solid white !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3) !important;
}

/* Botão com gradiente */
.vlibras-style-gradient [vw-access-button] {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

/* Botão com efeito de pulso */
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
    }
}

.vlibras-style-pulse [vw-access-button] {
    animation: pulse 2s infinite !important;
}

/* Botão com efeito de brilho */
@keyframes glow {
    0%, 100% {
        box-shadow: 0 0 5px rgba(102, 126, 234, 0.5);
    }
    50% {
        box-shadow: 0 0 20px rgba(102, 126, 234, 0.8);
    }
}

.vlibras-style-glow [vw-access-button] {
    animation: glow 2s ease-in-out infinite !important;
}

/* Botão com efeito de rotação no hover */
.vlibras-style-rotate [vw-access-button]:hover {
    transform: rotate(360deg) !important;
    transition: transform 0.6s ease !important;
}

/* ============================================
   6. RESPONSIVIDADE
   ============================================ */

/* Tablets */
@media (max-width: 768px) {
    [vw-access-button] {
        width: 50px !important;
        height: 50px !important;
        bottom: 20px !important;
        right: 20px !important;
        font-size: 24px !important;
    }
}

/* Smartphones */
@media (max-width: 480px) {
    [vw-access-button] {
        width: 45px !important;
        height: 45px !important;
        bottom: 15px !important;
        right: 15px !important;
        font-size: 20px !important;
    }
}

/* ============================================
   7. ACESSIBILIDADE
   ============================================ */

/* Focus visível para navegação por teclado */
[vw-access-button]:focus {
    outline: 3px solid #667eea !important;
    outline-offset: 2px !important;
}

/* Modo escuro */
@media (prefers-color-scheme: dark) {
    [vw-access-button] {
        background-color: #5568d3 !important;
        box-shadow: 0 4px 12px rgba(85, 104, 211, 0.6) !important;
    }

    [vw-access-button]:hover {
        background-color: #6b7dd9 !important;
    }
}

/* Respeitar preferência de movimento reduzido */
@media (prefers-reduced-motion: reduce) {
    [vw-access-button] {
        transition: none !important;
        animation: none !important;
    }

    [vw-access-button]:hover {
        transform: none !important;
    }
}

/* ============================================
   8. COMBINAÇÕES DE CLASSES
   ============================================ */

/* Exemplo: Botão grande, azul, no canto superior esquerdo */
.vlibras-combo-1 [vw-access-button] {
    background-color: #0066cc !important;
    width: 80px !important;
    height: 80px !important;
    top: 30px !important;
    bottom: auto !important;
    left: 30px !important;
    right: auto !important;
}

/* Exemplo: Botão pequeno, verde, com borda */
.vlibras-combo-2 [vw-access-button] {
    background-color: #27ae60 !important;
    width: 45px !important;
    height: 45px !important;
    border: 2px solid white !important;
}

/* Exemplo: Botão com gradiente e efeito de brilho */
.vlibras-combo-3 [vw-access-button] {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    animation: glow 2s ease-in-out infinite !important;
}

/* ============================================
   9. CONTAINER DO VLIBRAS
   ============================================ */

/* Estilo do container principal */
[vw] {
    z-index: 9999 !important;
}

/* Wrapper do plugin */
[vw-plugin-wrapper] {
    z-index: 9998 !important;
}

/* Botão Flutuante Principal  */
  #accessibility-toggle {
    position: fixed;
    right: 25px;
    top: 100px; /* Posicionado no canto superior direito, acima do VLibras */
    background-color: #0056b3;
    color: white;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 24px;
    cursor: pointer;
    z-index: 99999;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    transition: background-color 0.2s, transform 0.3s ease;
  }

  #accessibility-toggle:hover {
    background-color: #004085;
    transform: scale(1.1);
  }

  /* Menu de Opções Lateral */
  #accessibility-menu {
    position: fixed;
    right: 100px; /* Abre à esquerda do botão */
    top: 100px;
    background: white;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    z-index: 100000; /* Um nível acima do botão */
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 220px;
  }

  /* Garante que o menu apareça bem legível mesmo em Dark Mode */
  #accessibility-menu h3 {
    margin: 0;
    font-size: 16px;
    text-align: center;
    color: #333 !important;
  }

  #accessibility-menu button {
    background: #f8f9fa;
    color: #333 !important;
    border: 1px solid #ddd;
    padding: 8px 12px;
    text-align: left;
    cursor: pointer;
    border-radius: 4px;
    font-size: 14px;
    transition: background 0.2s;
  }

  #accessibility-menu button:hover {
    background: #e2e6ea;
  }

  .hidden {
    display: none !important;
  }

  /* Classe para Destacar Links */
  body.acc-links a {
    text-decoration: underline !important;
    background-color: yellow !important;
    color: black !important;
    font-weight: bold !important;
  }

  /* Ajuste para o novo ícone de braços abertos */
.icon-acessibilidade {
  width: 30px;
  height: 30px;
  color: white; /* Cor do bonequinho */
  display: block;
}

/* Modificação rápida no botão para centralizar o SVG */
#accessibility-toggle {
  display: flex !important;
  align-items: center;
  justify-content: center;
}

/* Ajuste Responsivo para Mobile */
@media (max-width: 768px) {
    #accessibility-toggle {
        right: 20px;
        top: 80px;
        width: 50px;
        height: 50px;
    }
    #accessibility-menu {
        right: 80px;
        top: 80px;
        width: 180px;
    }
}
 </style>

   
</head>
<body data-bs-theme="light">

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand brand-logos" href="#">
                <img src="uploads/img_logo/logo_galeratech_light.png" alt="Galera Tech" class="logo-light-mode">
                <!-- <img src="uploads/img_logo/logo_apeti.png" alt="Apeti" class="logo-light-mode"> -->
                
                <img src="uploads/img_logo/logo_galeratech_dark.webp" alt="Galera Tech" class="logo-dark-mode">
                <!-- <img src="uploads/img_logo/logo_apeti_dark.webp" alt="Apeti" class="logo-dark-mode"> -->
            </a>
            
            <div class="d-flex align-items-center order-lg-last ms-2">
                <button class="dark-mode-toggle" id="darkModeBtn" title="Alternar tema">
                    <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
                </button>
                <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="menu">
                <div class="navigation mt-3 mt-lg-0">
                    <ul id="nav-list">
                        <li class="active"><a href="#inicio"><span class="icon">Início</span></a></li>
                        <li><a href="#sobre"><span class="icon">Sobre</span></a></li>
                        <li><a href="#jornada"><span class="icon">Jornada</span></a></li>
                        <li><a href="#aprendizado"><span class="icon">Aprendizado</span></a></li>
                        <li><a href="#experiencias"><span 
                        class="icon">Experiências</span></a></li>
                        <li><a href="#depoimentos"><span 
                        class="icon">Depoimentos</span></a></li>
                        <li><a href="#instagram"><span class="icon">Instagram</span></a></li>
                        <li><a href="#parceiros"><span class="icon">Parceiros</span></a></li>
                        <li><a href="#participar"><span class="icon">Participar</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </nav>

   <section id="inicio" class="hero">
    <div id="carouselExample" class="carousel slide carousel-fade">
        <div class="carousel-indicators" id="hero-indicators"></div>
        <div class="carousel-inner" id="hero-inner">
            <div class="carousel-item active">
                <div class="container py-5 text-center">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next"></span>
        </button>
    </div>
</section>

    
    <section id="sobre" class="container py-5">
        <div class="secao-container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6  reveal-left"><div class="sobre-img-box">
                    <img src="uploads/img_foto/sobre.jpg" alt="Equipe Galera Tech">
                     
                </div></div>
                <div class="col-lg-6  reveal-right">
                    <span class="tag">Sobre o projeto</span>
                    <h2 class="fw-bold mb-4" style="color: var(--cinza-escuro); font-size: 2.5rem;">Muito além de um<br>curso de tecnologia</h2>
                    <p class="fs-5 mb-4" style="color: var(--texto-p); text-align: justify; line-height: 1.6;">O Galera Tech é uma iniciativa de formação gratuita para jovens do ensino médio, com foco em programação, habilidades profissionais, empreendedorismo e conexão com o mercado.</p>
                    <p class="fs-5" style="color: var(--texto-p); text-align: justify; line-height: 1.6;">A proposta é criar uma experience prática, acolhedora e transformadora, aproximando os participantes de empresas, profissionais e oportunidades reais no setor de tecnologia.</p>
                </div>
            </div>
<div class="container my-5">
   <div id="indicadores-container-dinamico"
     class="grid-cards-gt mt-5">
</div>
    </section>

    <section id="jornada" class="container py-5">
        <div class="secao-container bg-destaque text-center">
            <div class="secao-header reveal-up">
                <span class="tag">Jornada do participante</span>
                <h2>Como a experiência acontece</h2>
                <p class="fs-5">Uma trilha organizada para que o jovem entre, aprenda, pratique, se conecte com pessoas e enxergue novas possibilidades.</p>
            </div>

            <div class="grid-cards-gt text-start">
                <div class="card-custom-gt ">
                    <div class="passo-numero">1</div>
                    <h4>Inscrição</h4>
                    <p>O jovem se inscreve e participa do processo de seleção.</p>
                </div>
                <div class="card-custom-gt ">
                    <div class="passo-numero">2</div>
                    <h4>Formação</h4>
                    <p>Aulas práticas com tecnologia, programação e desafios criativos.</p>
                </div>
                <div class="card-custom-gt ">
                    <div class="passo-numero">3</div>
                    <h4>Mentoria</h4>
                    <p>Contato com profissionais, empresas e experiências reais de mercado.</p>
                </div>
                <div class="card-custom-gt ">
                    <div class="passo-numero">4</div>
                    <h4>Futuro</h4>
                    <p>O aluno sai mais preparado para estudar, trabalhar e empreender.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="aprendizado" class="container py-5">
        
        <div class="secao-container text-center">
            <div class="secao-header reveal-up">
                <span class="tag">Aprendizado</span>
                <h2>O que o aluno desenvolve</h2>
                <p class="fs-5">A formação combina conhecimento técnico, competências humanas e visão de carreira.</p>
            </div>

            <div class="grid-cards-gt text-start">
                <div class="card-custom-gt">
                    <i class="bi bi-code-slash icon-card"></i>
                    <h4>Programação</h4>
                    <p>Raciocínio lógico, desenvolvimento de soluções e primeiros códigos.</p>
                </div>
                <div class="card-custom-gt">
                    <i class="bi bi-people icon-card"></i>
                    <h4>Trabalho em equipe</h4>
                    <p>Comunicação, colaboração, criatividade e responsabilidade coletiva.</p>
                </div>
                <div class="card-custom-gt">
                    <i class="bi bi-lightbulb icon-card"></i>
                    <h4>Empreendedorismo</h4>
                    <p>Como transformar ideias em possibilidades reais de projeto e negócio.</p>
                </div>
                <div class="card-custom-gt">
                    <i class="bi bi-briefcase icon-card"></i>
                    <h4>Carreira</h4>
                    <p>Contato com empresas, mercado de trabalho e oportunidades profissionais.</p>
                </div>
            </div>
        </div>

        <div class="secao-container para-quem-azul-box">
            <div class="row align-items-center g-4">
                <div class="col-lg-5 pe-lg-4 reveal-up">
                    <div class="para-quem-tag">Para quem é</div>
                    <h3>Uma oportunidade para jovens que querem começar</h3>
                    <p class="desc-principal">O Galera Tech é voltado para estudantes que desejam conhecer tecnologia, desenvolver habilidades e se aproximar do mercado.</p>
                </div>
                
                <div class="col-lg-7">
                    <div class="para-quem-lista">
                        <div class="para-quem-item reveal-left">
                            <i class="bi bi-people-fill"></i>
                            <div>
                                <h5>Jovens do ensino médio</h5>
                                <p>Principalmente estudantes de escolas públicas.</p>
                            </div>
                        </div>
                        <div class="para-quem-item reveal-left">
                            <i class="bi bi-code-square"></i>
                            <div>
                                <h5>Iniciantes em tecnologia</h5>
                                <p>Não precisa ter experiência prévia para começar.</p>
                            </div>
                        </div>
                        <div class="para-quem-item reveal-left">
                            <i class="bi bi-building-check"></i>
                            <div>
                                <h5>Empresas apoiadoras</h5>
                                <p>Organizações que desejam investir em impacto social.</p>
                            </div>
                        </div>
                        <div class="para-quem-item reveal-left">
                            <i class="bi bi-person-bounding-box"></i>
                            <div>
                                <h5>Mentores e parceiros</h5>
                                <p>Profissionais que podem contribuir com conhecimento.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <section id="experiencias" class="container py-5" style="min-height: 200px;">

        <div class="experiencias-container-box">
            
            <div class="experiencias-topo">
                <div class="tag-destaque">Experiências</div>
                <h2>Vivências que aproximam os jovens do mercado</h2>
                <p>Além das aulas, o Galera Tech promove encontros, visitas, conversas e atividades que ampliam a visão dos participantes sobre carreira, tecnologia e futuro.</p>
            </div>

            <div class="experiencias-grid">
                <div class="card-experiencia-grande reveal-left">
                    <img src="uploads/img_foto/experiencias.jpg" alt="Experiência">
                    <div class="overlay-experiencia"></div>
                    <div class="conteudo-grande">
                        <h3>Tecnologia na prática</h3>
                        <p>Os participantes entram em contato com desafios reais, profissionais e ambientes de inovação.</p>
                    </div>
                </div>

                <div class="cards-direita">
                    <div class="mini-card reveal-right">
                        <div class="icone-box"><i class="bi bi-building"></i></div>
                        <h4>Workshops:</h4>
                        <p>Aulas com especialistas para aprender na prática.</p>
                        <!-- <span class="arrow"><i class="bi bi-arrow-right"></i></span> -->
                    </div>
                    <div class="mini-card reveal-right">
                        <div class="icone-box"><i class="bi bi-person-video3"></i></div>
                        <h4>Visitas Técnicas:</h4>
                        <p> Contato com ambientes reais de inovação e tecnólogia.

</p>
                        <!-- <span class="arrow"><i class="bi bi-arrow-right"></i></span> -->
                    </div>
                    <div class="mini-card reveal-right">
                        <div class="icone-box"><i class="bi bi-lightning"></i></div>
                        <h4>Desafios práticos</h4>
                        <p>Atividades para criar, experimentar e resolver problemas.
</p>
                        <!-- <span class="arrow"><i class="bi bi-arrow-right"></i></span> -->
                    </div>
                    <div class="mini-card reveal-right">
                        <div class="icone-box"><i class="bi bi-people-fill"></i></div>
                        <h4>Networking</h4>
                        <p>Conexão com empresas, mentores, colegas e oportunidades.</p>
                        <!-- <span class="arrow"><i class="bi bi-arrow-right"></i></span> -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    

 <!-- DEPOIMENTOS MODERNOS DINÂMICOS -->
   <!-- DEPOIMENTOS MODERNOS DINÂMICOS -->
<section id="depoimentos" class="container py-5" style="min-height: 200px;">
    <!-- Adicionamos a secao-container aqui para criar a box branca -->
    <div class="secao-container">
        
        <div class="text-center mb-5 reveal-up">
            <span class="tag">Depoimentos</span>
            <h2 class="fw-bold mb-3" style="font-size: 2.6rem; color: var(--cinza-escuro);">Histórias que mostram o impacto do Galera Tech</h2>
            <p class="fs-5 mx-auto" style="max-width: 720px; color: var(--texto-p);">
                Alunos, padrinhos, mentores e parceiros compartilham como o projeto transforma trajetórias.
            </p>
        </div>

        <!-- Adicionamos text-start para garantir que o texto dos cards fique alinhado à esquerda -->
        <div class="row g-4 align-items-stretch text-start">
            
            <div class="col-lg-7 reveal-left">
                <div class="main-testimonial" id="depoimentoPrincipal">
                    <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                    </div>

                    <p class="testimonial-text">
                        Carregando depoimento...
                    </p>

                    <div class="d-flex align-items-center gap-3 mt-4">
                        <img src="img/depoimento-aluno.jpg" alt="Depoimento Galera Tech">
                        <div>
                            <h5 class="mb-0">Galera Tech</h5>
                            <small>Depoimento</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 reveal-right" id="depoimentosLaterais">
                <div class="side-testimonial mb-4">
                    <p>Carregando depoimentos...</p>
                    <strong>Galera Tech</strong>
                    <small>Depoimento</small>
                </div>
            </div>
            
        </div>
    </div>
<!-- ───────── SEÇÃO INSTAGRAM ───────── -->
<section id="instagram" class="container py-5">
    <div class="secao-container">
        
        <!-- Topo da Seção: Títulos na esquerda, Botão na direita -->
        <div class="row align-items-center mb-5 g-4 text-start">
            <div class="col-md-8 reveal-left">
                <span class="tag">Instagram</span>
                <h2 class="fw-bold mb-3" style="font-size: 2.8rem; color: var(--cinza-escuro); line-height: 1.2;">
                    Acompanhe os bastidores do<br>Galera Tech
                </h2>
                <p class="fs-5 mb-0" style="color: var(--texto-p); max-width: 650px;">
                    Veja registros das aulas, experiências, alunos, padrinhos e momentos que fazem parte dessa transformação.
                </p>
            </div>
            <div class="col-md-4 text-md-end reveal-right">
                <a href="https://www.instagram.com/galera_tech" target="_blank" class="btn-gt d-inline-flex align-items-center gap-2">
                    <i class="bi bi-instagram"></i> Seguir no Instagram
                </a>
            </div>
        </div>

        <!-- Grid onde os cards dinâmicos do banco de dados vão aparecer -->
        <div id="instagram-grid" class="reveal-up">
            <!-- Os cards serão injetados aqui pelo seu JavaScript -->
        </div>

    </div>
<section id="parceiros" class="py-5">
        <div class="container text-center">
            
            <div class="secao-container">
                <div class="secao-header">
                    <h2>Quem apoia a nossa jornada</h2>
                    <p>Grandes empresas e marcas parceiras que investem na educação e no futuro da tecnologia local.</p>
                </div>

                <div class="parceiros-stripe">
                    <div id="parceiros-track-dinamico" class="parceiros-track">
                        </div>
                </div>

                <div class="apoiadores-box">
                    <h4>Empresas Apoiadoras complementares</h4>
                    <div id="apoiadores-grid-dinamico" class="apoiadores-grid">
                        </div>
                </div>
            </div>

        </div>
    </section>
   
    <section id="participar" class="container py-5" style="min-height: 200px;">
    <div class="cta-slider-box reveal-left">
        
        <div id="container-cta-backgrounds"></div>

        <div class="cta-overlay"></div>

        <div class="cta-content">
            <span class="cta-tag">Faça parte</span>
            <h2>Ajude jovens a descobrirem um futuro na tecnologia</h2>
            <p>
                Participe como aluno, padrinho, mentor, empresa apoiadora ou parceiro institucional.
            </p>

            <div id="container-cta-botoes" class="cta-buttons"></div>
        </div>
    </div>        
</section>

    <footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <img src="uploads/img_logo/logo_galeratech.png" width="50%" alt="Galera Tech" class="logo-light-mode">
                <img src="uploads/img_logo/logo_galeratech_dark.webp" width="50%" alt="Galera Tech" class="logo-dark-mode">
            
                <p id="footer-texto-sobre" class="mt-3">
                    Carregando descrição institucional...
                </p>
            </div>

            <div class="col-md-4">
                <h5 class="fw-bold">Contato</h5>
                <p class="mb-1">
                    <a id="footer-link-instagram" href="#" target="_blank" class="text-decoration-none text-reset">
                        <i class="bi bi-instagram me-1 text-warning"></i> @galera_tech
                    </a>
                </p>
                <p class="mb-1">
                    <a id="footer-link-whatsapp" href="#" target="_blank" class="text-decoration-none text-reset">
                        <i class="bi bi-whatsapp me-1 text-success"></i> <span id="footer-texto-whatsapp">...</span>
                    </a>
                </p>
                <p class="mb-1">
                    <a id="footer-link-mapa" href="#" target="_blank" class="text-decoration-none text-reset">
                        <i class="bi bi-geo-alt me-1 text-danger"></i> <span id="footer-texto-mapa">...</span>
                    </a>
                </p>
            </div>

            <div class="col-md-4">
                <h5 class="fw-bold">Links úteis</h5>
                <p class="mb-1"><a id="footer-link-util-1" href="#" class="text-decoration-none text-reset">...</a></p>
                <p class="mb-1"><a id="footer-link-util-2" href="#" class="text-decoration-none text-reset">...</a></p>
                <p class="mb-1"><a id="footer-link-util-3" href="#" class="text-decoration-none text-reset">...</a></p>
            </div>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <small>© 2026 Galera Tech | Powered by Apeti. Todos os direitos reservados.</small>
        </div>
    </div>     
</footer>
        <div class="admin-container-footer">
    <a href="admin/login.php" class="admin-btn">
        <i class="bi bi-shield-lock-fill"></i>
        <span>Admin</span>
    </a>
</div>
    <div class="whatsapp-container">
        <a href="https://wa.me/5517996197053" class="whatsapp-float" target="_blank">
            <span class="whatsapp-text">Fale com a gente pelo Whatsapp</span>
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>

    

<div class="instagram-container">
    <a href="https://www.instagram.com/galera_tech" target="_blank" class="instagram-float">
        <span class="instagram-text">Siga-nos no Instagram</span>
        <i class="fab fa-instagram"></i>
    </a>
</div>

<!-- <div class="acessibilidade-flutuante shadow" aria-label="Controle de Acessibilidade">
    <button id="btn-aumentar-fonte" title="Aumentar texto"><i class="bi bi-plus-lg"></i> A</button>
    <button id="btn-resetar-fonte" title="Texto padrão">A</button>
    <button id="btn-diminuir-fonte" title="Diminuir texto"><i class="bi bi-dash-lg"></i> A</button>
</div> -->
<!-- Início do Widget VLibras -->
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app' );
</script>
<!-- Fim do Widget VLibras -->

<button id="accessibility-toggle" aria-label="Abrir opções de acessibilidade">
  <svg class="icon-acessibilidade" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
    <circle cx="12" cy="6" r="1.5" fill="currentColor"/>
    <path d="M6 10C8 9.5 10 9 12 9C14 9 16 9.5 18 10M12 9V14M12 14L9.5 19M12 14L14.5 19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
  </svg>
</button>

<!-- Menu de Acessibilidade -->
<div id="accessibility-menu" class="hidden">
  <h3>Opções de Acessibilidade</h3>
  <button id="btn-increase-font">➕ Aumentar Fonte</button>
  <button id="btn-decrease-font">➖ Diminuir Fonte</button>
  <button id="btn-underline-links">🔗 Destacar Links</button>
  <button id="btn-tts">🔊 Ler texto do site</button>
  <button id="btn-reset">🔄 Redefinir</button>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Lógica de Scroll e Active Menu
        const sections = document.querySelectorAll('section');
        const navLi = document.querySelectorAll('.navigation ul li');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 120) {
                    current = section.getAttribute('id');
                }
            });
            navLi.forEach(li => {
                li.classList.remove('active');
                const href = li.querySelector('a').getAttribute('href').substring(1);
                if (href === current) { li.classList.add('active'); }
            });
        });

        // Toggle Dark Mode
        const darkModeBtn = document.getElementById('darkModeBtn');
        const themeIcon = document.getElementById('themeIcon');
        const body = document.body;

        darkModeBtn.addEventListener('click', () => {
            const isLight = body.getAttribute('data-bs-theme') === 'light';
            body.setAttribute('data-bs-theme', isLight ? 'dark' : 'light');
            themeIcon.classList.toggle('bi-moon-stars-fill', !isLight);
            themeIcon.classList.toggle('bi-sun-fill', isLight);
            localStorage.setItem('theme', isLight ? 'dark' : 'light');
        });

        window.onload = () => {
            if (localStorage.getItem('theme') === 'dark') {
                body.setAttribute('data-bs-theme', 'dark');
                themeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
            }
        };

        /* ───────── TROCA AUTOMÁTICA DE IMAGENS ───────── */

const backgrounds = document.querySelectorAll(".cta-bg");

let currentBg = 0;

setInterval(() => {

    backgrounds[currentBg].classList.remove("active");

    currentBg++;

    if (currentBg >= backgrounds.length) {
        currentBg = 0;
    }

    backgrounds[currentBg].classList.add("active");

}, 4000);

document.addEventListener("DOMContentLoaded", () => {

    const contadores = document.querySelectorAll(".contador");

    function animarContador(contador) {

        const valorFinal = parseInt(
            contador.dataset.valor
        );

        let valorAtual = 0;

        const incremento = valorFinal / 80;

        function atualizar() {

            valorAtual += incremento;

            if (valorAtual < valorFinal) {

                contador.textContent =
                    "+" + Math.floor(valorAtual).toLocaleString("pt-BR");

                requestAnimationFrame(atualizar);

            } else {

                contador.textContent =
                    "+" + valorFinal.toLocaleString("pt-BR");
            }
        }

        atualizar();
    }

    const observer = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                const contador = entry.target;

                contador.textContent = "0";

                animarContador(contador);

            }

        });

    }, {
        threshold: 0.5
    });

    contadores.forEach(contador => {

        contador.dataset.valor =
            contador.textContent.replace(/\D/g, "");

        observer.observe(contador);

    });

});



const reveals = document.querySelectorAll(
'.reveal-left, .reveal-right, .reveal-up'
);

const observer = new IntersectionObserver((entries)=>{

    entries.forEach(entry=>{

        if(entry.isIntersecting){

            entry.target.classList.add('reveal-active');

        } else {

            entry.target.classList.remove('reveal-active');

        }

    });

},{
    threshold:0.15
});

reveals.forEach(el=>observer.observe(el));

//  Depoimentos randômicos via banco de dados 

   function escaparHTML(valor) {
            const div = document.createElement("div");
            div.textContent = valor ?? "";
            return div.innerHTML;
        }

        function montarCargo(depoimento) {
            const cargo = depoimento.cargo || "";
            const empresa = depoimento.empresa || "";
            if (cargo && empresa) {
                return `${cargo} - ${empresa}`;
            }
            return cargo || empresa || depoimento.tipo || "Depoimento Galera Tech";
        }

        async function carregarDepoimentos() {
            const principal = document.getElementById("depoimentoPrincipal");
            const laterais = document.getElementById("depoimentosLaterais");

            try {
                const resposta = await fetch("api/depoimentos.php", {
                    cache: "no-store"
                });

                if (!resposta.ok) {
                    throw new Error("Erro ao buscar depoimentos");
                }

                const dados = await resposta.json();

                if (!dados.principal) {
                    principal.innerHTML = `
                        <div class="quote-icon"><i class="bi bi-quote"></i></div>
                        <p class="testimonial-text">Ainda não há depoimentos cadastrados.</p>
                    `;
                    laterais.innerHTML = "";
                    return;
                }

                const fotoPrincipal = dados.principal.foto || "img/depoimento-aluno.jpg";

                principal.innerHTML = `
                    <div class="quote-icon">
                        <i class="bi bi-quote"></i>
                    </div>

                    <p class="testimonial-text">
                        “${escaparHTML(dados.principal.texto)}”
                    </p>

                    <div class="d-flex align-items-center gap-3 mt-4">
                        <img src="${escaparHTML(fotoPrincipal)}" alt="${escaparHTML(dados.principal.nome)}">
                        <div>
                            <h5 class="mb-0">${escaparHTML(dados.principal.nome)}</h5>
                            <small>${escaparHTML(montarCargo(dados.principal))}</small>
                        </div>
                    </div>
                `;

                laterais.innerHTML = "";

                dados.laterais.forEach((depoimento, indice) => {
                    const margem = indice < dados.laterais.length - 1 ? "mb-4" : "";

                    laterais.innerHTML += `
                        <div class="side-testimonial ${margem}">
                            <p>“${escaparHTML(depoimento.texto)}”</p>
                            <strong>${escaparHTML(depoimento.nome)}</strong>
                            <small>${escaparHTML(montarCargo(depoimento))}</small>
                        </div>
                    `;
                });

            } catch (erro) {
                console.error(erro);

                principal.innerHTML = `
                    <div class="quote-icon"><i class="bi bi-quote"></i></div>
                    <p class="testimonial-text">
                        Não foi possível carregar os depoimentos no momento.
                    </p>
                `;

                laterais.innerHTML = "";
            }
        }

        document.addEventListener("DOMContentLoaded", carregarDepoimentos);

//instagrm banco de dados


document.addEventListener("DOMContentLoaded", async () => {

    const container =
        document.getElementById("instagram-grid");

    try {

        const response =
            await fetch("api/instagram.php");

        const posts =
            await response.json();

        container.innerHTML = "";

        posts.forEach(post => {

            const link =
                post.link && post.link !== "#"
                ? post.link
                : "#";

            container.innerHTML += `
                <a href="${link}"
                   target="_blank"
                   class="instagram-card">

                    <img src="${post.imagem}"
                         alt="${post.titulo}">

                    <div class="instagram-info">
                        <h4>${post.categoria}</h4>
                        <p>${post.titulo}</p>
                    </div>

                </a>
            `;

        });

    } catch(error) {

        console.error(error);

    }

});

// ── BANCO DE DADOS: PARCEIROS COM ANIMAÇÃO INFINITA ORIGINAL ──
document.addEventListener("DOMContentLoaded", async () => {
    const track = document.getElementById("parceiros-track-dinamico");
    const gridApoiadores = document.getElementById("apoiadores-grid-dinamico");

    if (!track || !gridApoiadores) return;

    try {
        const response = await fetch("api/parceiros.php");
        if (!response.ok) throw new Error("Erro ao consultar a API.");

        const dados = await response.json();

        const padrinhos = dados.filter(item => item.destaque_carrossel == 1);
        const apoiadores = dados.filter(item => item.destaque_carrossel == 0);

        // ── CARROSSEL ──
        if (padrinhos.length === 0) {
            track.innerHTML = "<p class='text-muted py-3'>Nenhum padrinho ativo no momento.</p>";
            track.style.animation = "none";
        } else {

            const gerarHtmlLogo = (p) => {
                return `
                    <div class="logo-item">
                        <img src="${p.logo}" alt="Logo ${p.nome}" title="${p.nome}">
                    </div>
                `;
            };

            let htmlOriginal = padrinhos.map(gerarHtmlLogo).join("");

            if (padrinhos.length < 6) {
                track.innerHTML =
                    htmlOriginal +
                    htmlOriginal +
                    htmlOriginal +
                    htmlOriginal;
            } else {
                track.innerHTML =
                    htmlOriginal +
                    htmlOriginal;
            }
        }

        // ── APOIADORES ──
        if (apoiadores.length === 0) {
            gridApoiadores.innerHTML =
                "<p class='text-muted small'>Nenhum apoiador listado.</p>";
        } else {

            gridApoiadores.innerHTML = apoiadores.map(a => `
                <img src="${a.logo}" alt="Logo ${a.nome}" title="${a.nome}">
            `).join("");

        }

    } catch (error) {
        console.error("Falha ao injetar marcas parceiras:", error);
        track.innerHTML =
            "<p class='text-muted small text-danger p-3'>Erro ao carregar os parceiros.</p>";
    }
});

// ── BANCO DE DADOS: INDICADORES DINÂMICOS (MODO CLARO E ESCURO) ──
document.addEventListener("DOMContentLoaded", async () => {
    const containerIndicadores = document.getElementById("indicadores-container-dinamico");
    if (!containerIndicadores) return;

    try {
        const response = await fetch("api/indicadores.php");
        if (!response.ok) throw new Error("Erro ao acessar a API.");

        const dados = await response.json();
        containerIndicadores.innerHTML = "";

        if (dados.length === 0) {
            containerIndicadores.innerHTML = "<p class='text-muted small text-center'>Nenhum indicador ativo no momento.</p>";
            return;
        }

       // Injetar os cards adaptáveis ao tema claro/escuro 
dados.forEach((ind) => {
    const numeroPuro = ind.numero.replace(/[^0-9]/g, '');
    const formatoOriginal = ind.numero;

    containerIndicadores.innerHTML += `
        <div class="col-md-4 mb-4">
            <div class="card-custom-gt h-100">

                <i class="bi ${ind.icone} icon-card"></i>

                <h3 class="contador-num"
                    data-target="${numeroPuro}"
                    data-original="${formatoOriginal}">
                    0
                </h3>

                <p>
                    ${ind.texto}
                </p>

            </div>
        </div>
    `;
});


        // Função de Animação Progressiva
        const animarContagem = (elemento) => {
            const target = parseInt(elemento.getAttribute("data-target"), 10);
            const original = elemento.getAttribute("data-original");
            
            if (isNaN(target) || target === 0) {
                elemento.innerText = original;
                return;
            }

            let inicio = 0;
            const duracao = 1500; 
            const incremento = target / (duracao / 16);

            const atualizarContador = () => {
                inicio += incremento;
                if (inicio < target) {
                    elemento.innerText = Math.ceil(inicio);
                    setTimeout(atualizarContador, 16);
                } else {
                    elemento.innerText = original; 
                }
            };
            atualizarContador();
        };

        // Intersection Observer para rodar ao dar scroll
       const secaoSobre = document.querySelector('#sobre');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {

        if (entry.isIntersecting) {

            document.querySelectorAll('.contador-num').forEach(contador => {

                contador.innerText = "0";

                const target = parseInt(contador.dataset.target);

                let atual = 0;
                const incremento = Math.max(1, Math.ceil(target / 80));

                const animar = () => {
                    atual += incremento;

                    if (atual >= target) {
                        contador.innerText =
                            contador.dataset.original;
                    } else {
                        contador.innerText =
                            atual.toLocaleString('pt-BR');

                        requestAnimationFrame(animar);
                    }
                };

                requestAnimationFrame(animar);
            });

        }

    });
}, {
    threshold: 0.5
});

observer.observe(secaoSobre);

    } catch (error) {
        console.error("Erro ao carregar indicadores:", error);
    }
});



document.addEventListener('DOMContentLoaded', async function() {
    const heroInner = document.getElementById('hero-inner');
    const heroIndicators = document.getElementById('hero-indicators');
    try {
        const response = await fetch('api/hero.php');
        const slides = await response.json();
        if (slides && slides.length > 0) {
            heroInner.innerHTML = '';
            heroIndicators.innerHTML = '';
            slides.forEach((slide, index) => {
                const isActive = index === 0 ? 'active' : '';
                
                // BOTÃO 1 - Usando os nomes exatos do seu banco
                let botao1Html = '';
                if (slide.texto_botao_1 && slide.texto_botao_1.trim() !== '') {
                    botao1Html = `<a href="${slide.link_botao_1}" class="btn-gt">${slide.texto_botao_1}</a>`;
                }

                // BOTÃO 2 - Usando os nomes exatos do seu banco
                let botao2Html = '';
                if (slide.texto_botao_2 && slide.texto_botao_2.trim() !== '') {
                    botao2Html = `<a href="${slide.link_botao_2}" class="btn-gt ms-2" style="background-color: var(--cinza);">${slide.texto_botao_2}</a>`;
                }

                const slideHtml = `
                    <div class="carousel-item ${isActive}" data-bs-interval="4000">
                        <div class="container py-5">
                            <div class="row align-items-center g-5">
                                <div class="col-lg-6">
                                    <span class="tag">${slide.tag}</span>
                                    <h1>${slide.titulo}</h1>
                                    <p class="my-4 fs-5">${slide.descricao}</p>
                                    <div class="d-flex flex-wrap gap-2">
                                        ${botao1Html}
                                        ${botao2Html}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-image">
                                        <img src="${slide.imagem}" alt="${slide.titulo}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                heroInner.insertAdjacentHTML('beforeend', slideHtml);

                const indicatorHtml = `<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="${index}" class="${isActive}" aria-current="${index === 0 ? 'true' : 'false'}"></button>`;
                heroIndicators.insertAdjacentHTML('beforeend', indicatorHtml);
            });

            if (typeof bootstrap !== 'undefined') {
                new bootstrap.Carousel(document.getElementById('carouselExample'), { interval: 4000, ride: 'carousel' });
            }
        }
    } catch (e) { console.error(e); }
});

// ── BANCO DE DADOS: ALIMENTAÇÃO DE CONFIGURAÇÕES GERAIS ──
        document.addEventListener("DOMContentLoaded", async () => {
            try {
                // Modificado aqui para api/config.php
                const response = await fetch("api/config.php"); 
                if (!response.ok) throw new Error("Falha ao ler API de configurações.");
                
                const r = await response.json();
                if (!r) return;

                // Restante do seu código JS de preenchimento do rodapé...
                document.getElementById("footer-texto-sobre").innerText = r.texto_sobre;
                document.getElementById("footer-link-instagram").href = r.link_instagram;
                document.getElementById("footer-link-whatsapp").href = r.link_whatsapp;
                document.getElementById("footer-texto-whatsapp").innerText = r.texto_whatsapp;
                document.getElementById("footer-link-mapa").href = r.link_mapa;
                document.getElementById("footer-texto-mapa").innerText = r.texto_mapa;

                const link1 = document.getElementById("footer-link-util-1");
                link1.href = r.link_util_1; link1.innerText = r.texto_util_1;

                const link2 = document.getElementById("footer-link-util-2");
                link2.href = r.link_util_2; link2.innerText = r.texto_util_2;

                const link3 = document.getElementById("footer-link-util-3");
                link3.href = r.link_util_3; link3.innerText = r.texto_util_3;

            } catch (error) {
                console.error("Erro ao carregar dados dinâmicos:", error);
            }
        });
 // ── BANCO DE DADOS: SEÇÃO PARTICIPAR DINÂMICA & CARROSSEL ──

        document.addEventListener("DOMContentLoaded", async () => {

            const containerBg = document.getElementById("container-cta-backgrounds");

            const containerBtn = document.getElementById("container-cta-botoes");

            if (!containerBg || !containerBtn) return;



            try {

                const response = await fetch("api/participar.php");

                if (!response.ok) throw new Error("Falha ao ler API do carrossel.");

               

                const dados = await response.json();



                // 1. Renderizar Imagens do Carrossel de Fundo

                if (dados.slides && dados.slides.length > 0) {

                    containerBg.innerHTML = dados.slides.map((img, index) => `

                        <div class="cta-bg ${index === 0 ? 'active' : ''}"

                             style="background-image: url('${img}');">

                        </div>

                    `).join('');

                   

                    // Iniciar efeito de rotação de imagens se houver mais de uma

                    if (dados.slides.length > 1) {

                        inicializarTransicaoCta();

                    }

                } else {

                    // Fallback caso não possua imagens cadastradas

                    containerBg.innerHTML = `<div class="cta-bg active" style="background-image: url('uploads/img_foto/carrosel_img1.jpg');"></div>`;

                }



                // 2. Renderizar Botões Dinâmicos vindos da tabela botoes_cta

                if (dados.botoes && dados.botoes.length > 0) {

                    containerBtn.innerHTML = dados.botoes.map((btn, index) => `

                        <a href="${btn.link}" class="${index === 0 ? 'btn-cta-primary' : 'btn-cta-outline'}">

                            ${btn.texto}

                        </a>

                    `).join('');

                } else {

                    // Fallback dos links caso a tabela esteja vazia

                    containerBtn.innerHTML = `

                        <a href="https://forms.gle/VkdRtm56oPH4AWgf9" class="btn-cta-primary">Quero participar</a>

                        <a href="https://wa.me/17996442507" class="btn-cta-outline">Quero apoiar</a>

                    `;

                }



            } catch (error) {

                console.error("Erro ao carregar elementos da seção participar:", error);

            }



            // Função responsável por alternar a classe active entre as imagens de fundo

            function inicializarTransicaoCta() {

                setInterval(() => {

                    const activeBg = containerBg.querySelector(".cta-bg.active");

                    if (!activeBg) return;



                    let nextBg = activeBg.nextElementSibling;

                    if (!nextBg || !nextBg.classList.contains("cta-bg")) {

                        nextBg = containerBg.firstElementChild;

                    }



                    activeBg.classList.remove("active");

                    nextBg.classList.add("active");

                }, 5000); // Executa a troca a cada 5 segundos

            }

        });
//Vlibras
document.addEventListener("DOMContentLoaded", () => {
    const htmlElement = document.documentElement;
    const btnAumentar = document.getElementById("btn-aumentar-fonte");
    const btnDiminuir = document.getElementById("btn-diminuir-fonte");
    const btnResetar = document.getElementById("btn-resetar-fonte");

    // Limites para não quebrar completamente o design do site
    const TAMANHO_MINIMO = 12; // 12px
    const TAMANHO_PADRAO = 16; // 16px
    const TAMANHO_MAXIMO = 24; // 24px
    const PASSO = 2; // Aumenta/diminui de 2 em 2px

    // Recupera o tamanho salvo pelo usuário no passado, se houver
    let tamanhoAtual = parseInt(localStorage.getItem("user-font-size")) || TAMANHO_PADRAO;
    htmlElement.style.fontSize = `${tamanhoAtual}px`;

    // Função para aplicar e salvar o tamanho
    const atualizarFonte = (novoTamanho) => {
        if (novoTamanho >= TAMANHO_MINIMO && novoTamanho <= TAMANHO_MAXIMO) {
            tamanhoAtual = novoTamanho;
            htmlElement.style.fontSize = `${tamanhoAtual}px`;
            localStorage.setItem("user-font-size", tamanhoAtual);
        }
    };

    // Ouvintes de clique dos botões
    if (btnAumentar) {
        btnAumentar.addEventListener("click", () => {
            atualizarFonte(tamanhoAtual + PASSO);
        });
    }

    if (btnDiminuir) {
        btnDiminuir.addEventListener("click", () => {
            atualizarFonte(tamanhoAtual - PASSO);
        });
    }

    if (btnResetar) {
        btnResetar.addEventListener("click", () => {
            atualizarFonte(TAMANHO_PADRAO);
        });
    }
});
(function() {
    // 1. Configurações
    const VLIBRAS_SRC = 'https://vlibras.gov.br/app/vlibras-plugin.js';
    const VLIBRAS_WIDGET_URL = 'https://vlibras.gov.br/app';

    /**
     * Cria a estrutura de elementos necessária para o VLibras
     */
    function createVLibrasStructure() {
        if (document.querySelector('[vw]')) return; // Evita duplicatas

        const vwDiv = document.createElement('div');
        vwDiv.setAttribute('vw', '');
        vwDiv.className = 'enabled';

        vwDiv.innerHTML = `
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        `;

        document.body.appendChild(vwDiv);
    }

    /**
     * Carrega o script externo do VLibras
     */
    function loadVLibrasScript(callback) {
        const script = document.createElement('script');
        script.src = VLIBRAS_SRC;
        script.async = true;
        script.onload = callback;
        document.body.appendChild(script);
    }

    /**
     * Inicializa o Widget
     */
    function initVLibras() {
        if (window.VLibras && typeof window.VLibras.Widget === 'function') {
            new window.VLibras.Widget(VLIBRAS_WIDGET_URL);
            console.log('✅ VLibras inicializado com sucesso.');
        } else {
            console.error('❌ Erro: Biblioteca VLibras não encontrada.');
        }
    }

    // Execução
    window.addEventListener('DOMContentLoaded', () => {
        createVLibrasStructure();
        loadVLibrasScript(initVLibras);
    });
})();

//Acessibilidade menu

  document.addEventListener("DOMContentLoaded", () => {
  const toggleBtn = document.getElementById("accessibility-toggle");
  const menu = document.getElementById("accessibility-menu");
  const ttsBtn = document.getElementById("btn-tts");
  
  let ttsActive = false; // Controla se o modo de clique está ligado
  let currentFontSize = parseInt(localStorage.getItem("fontSize")) || 100;

  // 1. Abrir/Fechar menu
  if (toggleBtn && menu) {
    toggleBtn.addEventListener("click", () => {
      menu.classList.toggle("hidden");
    });
  }

  // 2. Controle do Tamanho da Fonte
  function updateFontSize(size) {
    document.documentElement.style.fontSize = size + "%";
    localStorage.setItem("fontSize", size);
  }
  updateFontSize(currentFontSize);

  document.getElementById("btn-increase-font").addEventListener("click", () => {
    if (currentFontSize < 150) { currentFontSize += 10; updateFontSize(currentFontSize); }
  });

  document.getElementById("btn-decrease-font").addEventListener("click", () => {
    if (currentFontSize > 80) { currentFontSize -= 10; updateFontSize(currentFontSize); }
  });

  // 3. Controle de Destacar Links
  if (localStorage.getItem('acc-links') === 'true') document.body.classList.add('acc-links');
  document.getElementById("btn-underline-links").addEventListener("click", () => {
    document.body.classList.toggle("acc-links");
    localStorage.setItem("acc-links", document.body.classList.contains("acc-links"));
  });

  // 4. LÓGICA DO LEITOR POR CLIQUE
  ttsBtn.addEventListener("click", (e) => {
    e.stopPropagation(); // Impede que o clique no botão ative a leitura dele mesmo
    
    ttsActive = !ttsActive; // Inverte o estado do leitor

    if (ttsActive) {
      // Ativa o leitor por clique
      window.speechSynthesis.cancel(); // Para qualquer fala anterior
      ttsBtn.innerText = "🛑 Desativar Leitor";
      ttsBtn.style.backgroundColor = "#ffc107"; // Muda a cor do botão no menu para indicar ativo
      document.body.style.cursor = "help"; // Muda o mouse do site para indicar interatividade
      
      // Adiciona o evento de clique na página inteira
      document.addEventListener("click", lerElementoClicado);
    } else {
      desativarLeitor();
    }
  });

  // Função que captura o clique e lê o texto do elemento exato
  function lerElementoClicado(event) {
    // Evita ler cliques dentro do próprio menu de acessibilidade
    if (menu.contains(event.target) || event.target === toggleBtn) {
      return;
    }

    event.preventDefault();
    event.stopPropagation();

    // Interrompe leituras passadas para começar a nova imediatamente
    window.speechSynthesis.cancel();

    // Captura o texto do elemento clicado
    const textoDoElemento = event.target.innerText || event.target.textContent;

    if (textoDoElemento && textoDoElemento.trim().length > 0) {
      const utterance = new SpeechSynthesisUtterance(textoDoElemento.trim());
      utterance.lang = "pt-BR";
      window.speechSynthesis.speak(utterance);
    }
  }

  function desativarLeitor() {
    ttsActive = false;
    window.speechSynthesis.cancel();
    ttsBtn.innerText = "🔊 Ler texto do site";
    ttsBtn.style.backgroundColor = ""; // Restaura a cor padrão
    document.body.style.cursor = "default"; // Restaura o mouse original
    document.removeEventListener("click", lerElementoClicado); // Remove a escuta do clique
  }

  // 5. Botão Redefinir
  document.getElementById("btn-reset").addEventListener("click", () => {
    desativarLeitor();
    currentFontSize = 100;
    updateFontSize(currentFontSize);
    document.body.classList.remove("acc-links");
    localStorage.removeItem("acc-links");
    localStorage.removeItem("fontSize");
  });
});

</script>
</body>
</html>
