-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2026 às 22:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `galeratech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `apoiadores`
--

CREATE TABLE `apoiadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `apoiadores`
--

INSERT INTO `apoiadores` (`id`, `nome`, `logo`, `link`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Apoiador 1', 'uploads/apoiadores/mini-apoio-1.png', '#', 1, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(2, 'Apoiador 2', 'uploads/apoiadores/mini-apoio-2.png', '#', 2, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(3, 'Apoiador 3', 'uploads/apoiadores/mini-apoio-3.png', '#', 3, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(4, 'Apoiador 4', 'uploads/apoiadores/mini-apoio-4.png', '#', 4, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(5, 'Apoiador 5', 'uploads/apoiadores/mini-apoio-5.png', '#', 5, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(6, 'Apoiador 6', 'uploads/apoiadores/mini-apoio-6.png', '#', 6, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aprendizado`
--

CREATE TABLE `aprendizado` (
  `id` int(11) NOT NULL,
  `icone` varchar(80) DEFAULT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aprendizado`
--

INSERT INTO `aprendizado` (`id`, `icone`, `titulo`, `descricao`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'bi-code-slash', 'Programação', 'Raciocínio lógico, desenvolvimento de soluções e primeiros códigos.', 1, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(2, 'bi-people', 'Trabalho em equipe', 'Comunicação, colaboração, criatividade e responsabilidade coletiva.', 2, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(3, 'bi-lightbulb', 'Empreendedorismo', 'Como transformar ideias em possibilidades reais de projeto e negócio.', 3, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(4, 'bi-briefcase', 'Carreira', 'Contato com empresas, mercado de trabalho e oportunidades profissionais.', 4, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `botoes_cta`
--

CREATE TABLE `botoes_cta` (
  `id` int(11) NOT NULL,
  `localizacao` varchar(80) NOT NULL,
  `texto` varchar(80) NOT NULL,
  `link` varchar(255) NOT NULL,
  `estilo` enum('principal','secundario','claro','escuro') DEFAULT 'principal',
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `botoes_cta`
--

INSERT INTO `botoes_cta` (`id`, `localizacao`, `texto`, `link`, `estilo`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'cta_final', 'Quero participar', 'https://forms.gle/VkdRtm56oPH4AWgf9', 'claro', 1, 1, '2026-05-28 19:46:47', '2026-06-18 16:59:04'),
(2, 'cta_final', 'Quero apoiar', 'https://wa.me/17996442507', 'secundario', 2, 1, '2026-05-28 19:46:47', '2026-06-18 17:00:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracoes_site`
--

CREATE TABLE `configuracoes_site` (
  `id` int(11) NOT NULL,
  `nome_site` varchar(150) NOT NULL,
  `titulo_seo` varchar(180) DEFAULT NULL,
  `descricao_seo` text DEFAULT NULL,
  `palavras_chave` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `texto_rodape` text DEFAULT NULL,
  `texto_whatsapp` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `configuracoes_site`
--

INSERT INTO `configuracoes_site` (`id`, `nome_site`, `titulo_seo`, `descricao_seo`, `palavras_chave`, `logo`, `favicon`, `instagram`, `facebook`, `linkedin`, `whatsapp`, `email`, `telefone`, `endereco`, `texto_rodape`, `texto_whatsapp`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Galera Tech', 'Galera Tech - Capacitação gratuita em tecnologia para jovens', 'Projeto de formação gratuita em tecnologia para jovens, conectando educação, empresas, mentores e oportunidades.', 'tecnologia, programação, jovens, capacitação, Galera Tech, Apeti, Rio Preto', 'uploads/config/logo-galera-tech.png', 'uploads/config/favicon.png', 'https://instagram.com/galeratech', NULL, NULL, '5517999999999', 'contato@galeratech.com.br', '(17) 99999-9999', 'São José do Rio Preto - SP', 'Formação gratuita em tecnologia para jovens, conectando educação, empresas e oportunidades.', 'Olá! Gostaria de saber mais sobre o Galera Tech.', 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cargo` varchar(150) DEFAULT NULL,
  `empresa` varchar(150) DEFAULT NULL,
  `texto` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipo` enum('aluno','padrinho','mentor','parceiro') DEFAULT 'aluno',
  `destaque` tinyint(1) DEFAULT 0,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `nome`, `cargo`, `empresa`, `texto`, `foto`, `tipo`, `destaque`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Eduardo Cezar Borges', 'Aluno Galera Tech', '', 'Participar do Galera Tech foi uma experiência incrível. As aulas e dinâmicas sobre inteligência emocional, acessibilidade e programação tornaram o aprendizado muito envolvente. Além de adquirir novos conhecimentos, desenvolvi habilidades importantes para minha vida profissional e pessoal, ampliando minha visão sobre o futuro.', 'uploads/depoimentos/1781803707_foto_aluno_eduardo.png', 'aluno', 1, 1, 1, '2026-05-28 19:46:47', '2026-06-18 17:28:27'),
(2, 'João Paulo', 'Presidente da Apeti', 'Apeti', 'Estivemos presentes desde a concepção e montagem dessa capacitação e, hoje, ver que ela já está em sua jornada de sucesso por várias edições é um orgulho. Todos os anos fazemos questão de renovar essa parceria com o Senac, que sempre nos atende com excelência. Como podem ver, o pessoal está em aula exatamente agora. Para nós, este é, sem dúvidas, um projeto de grande sucesso.', 'uploads/depoimentos/1781807552_tecnologia-rio-pretense-para-rio-preto-e-para-o-mundo.url', 'aluno', 1, 2, 1, '2026-05-28 19:46:47', '2026-06-18 18:32:32'),
(3, 'André Ferreira', 'Padrinho', 'Mercatus', 'Eu vejo o Galera Tech como extremamente valioso para essa nova juventude que está surgindo. Ele possibilita a exploração de novos talentos é o ingresso desses novos alunos, dessas novas pessoas, no mercado. É um projeto muito valioso, de extrema importância e, acredito eu, que está proporcionando muitas oportunidades para esses jovens em relação ao futuro.', 'uploads/depoimentos/1781804432_mercatus.png', 'padrinho', 1, 3, 1, '2026-05-28 19:46:47', '2026-06-18 17:40:32'),
(4, 'Samuel Volpi Picolo', 'Aluno Galera Tech', '', 'O Galera Tech transformou minha forma de enxergar a tecnologia. Foi através dele que descobri meu interesse pela programação e um talento que eu nem imaginava ter. Além de aprender algo novo, percebi que a programação pode abrir muitas portas e criar grandes oportunidades para o futuro.', 'uploads/depoimentos/1781803906_foto_volpi.png', 'aluno', 1, 4, 1, '2026-05-28 19:46:47', '2026-06-18 17:38:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `id` int(11) NOT NULL,
  `icone` varchar(80) DEFAULT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT 0,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `experiencias`
--

INSERT INTO `experiencias` (`id`, `icone`, `titulo`, `descricao`, `imagem`, `destaque`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, NULL, 'Tecnologia na prática', 'Os participantes entram em contato com desafios reais, profissionais e ambientes de inovação.', 'uploads/experiencias/experiencia-principal.jpg', 1, 1, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(2, 'bi-building', 'Visitas técnicas', 'Contato com ambientes reais de inovação e tecnologia.', NULL, 0, 2, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(3, 'bi-person-video3', 'Palestras', 'Conversas com profissionais e especialistas do mercado.', NULL, 0, 3, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(4, 'bi-lightning-charge', 'Desafios práticos', 'Atividades para criar, experimentar e resolver problemas.', NULL, 0, 4, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(5, 'bi-people-fill', 'Networking', 'Conexão com empresas, mentores, colegas e oportunidades.', NULL, 0, 5, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `hero_slides`
--

CREATE TABLE `hero_slides` (
  `id` int(11) NOT NULL,
  `tag` varchar(120) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `destaque` varchar(150) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `texto_botao_1` varchar(80) DEFAULT NULL,
  `link_botao_1` varchar(255) DEFAULT NULL,
  `texto_botao_2` varchar(80) DEFAULT NULL,
  `link_botao_2` varchar(255) DEFAULT NULL,
  `titulo_card` varchar(150) DEFAULT NULL,
  `texto_card` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `hero_slides`
--

INSERT INTO `hero_slides` (`id`, `tag`, `titulo`, `destaque`, `descricao`, `texto_botao_1`, `link_botao_1`, `texto_botao_2`, `link_botao_2`, `titulo_card`, `texto_card`, `imagem`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Capacitação gratuita em tecnologia', 'Jovens preparados para o futuro da tecnologia', 'futuro da tecnologia', 'O Galera Tech conecta estudantes, empresas, mentores e oportunidades reais para transformar conhecimento em carreira, autonomia e futuro profissional.', 'Quero participar', '#participar', 'Quero apoiar', '#participar', 'Powered by Apeti', 'Uma iniciativa conectada ao ecossistema de tecnologia e inovação de Rio Preto.', 'uploads/hero/1781810142_foto_carrossel1.jpg', 1, 1, '2026-05-28 19:46:47', '2026-06-18 19:17:27'),
(2, 'Aprender, praticar e se conectar', 'Experiências que aproximam jovens do mercado', 'mercado', 'Aulas práticas, desafios, mentorias e contato com profissionais ajudam os participantes a enxergar caminhos possíveis dentro da tecnologia.', 'Ver experiências', '#experiencias', 'Conheça o projeto', '#sobre', 'Formação com propósito', 'Tecnologia, carreira, empreendedorismo e desenvolvimento humano em uma jornada prática.', 'uploads/hero/1781810170_foto_carrossel2.jpg', 2, 1, '2026-05-28 19:46:47', '2026-06-18 19:16:10'),
(3, 'Empresas, mentores e parceiros', 'Juntos, abrimos portas para novas trajetórias', 'novas trajetórias', 'Padrinhos e parceiros fortalecem o projeto e ajudam jovens a transformar aprendizado em possibilidades reais de futuro.', 'Quero ser parceiro', '#participar', 'Ver bastidores', '#instagram', 'Impacto social e conexão com o futuro', 'Apoiar o Galera Tech é investir em formação, empregabilidade e inclusão digital.', 'uploads/hero/1781810225_carrosel.jpg', 3, 1, '2026-05-28 19:46:47', '2026-06-18 19:17:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `indicadores`
--

CREATE TABLE `indicadores` (
  `id` int(11) NOT NULL,
  `icone` varchar(80) DEFAULT NULL,
  `numero` varchar(50) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `indicadores`
--

INSERT INTO `indicadores` (`id`, `icone`, `numero`, `texto`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'bi-calendar-event', '+5', 'edições realizadas com jovens da região.', 1, 1, '2026-05-28 19:46:47', '2026-06-15 19:11:30'),
(2, 'bi-clock-history', '+1200h', 'de aulas, mentorias e experiências práticas.', 2, 1, '2026-05-28 19:46:47', '2026-06-18 19:47:47'),
(3, 'bi-mortarboard', '+90', 'alunos impactados por tecnologia e oportunidades.', 3, 1, '2026-05-28 19:46:47', '2026-06-18 19:47:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `instagram_posts`
--

CREATE TABLE `instagram_posts` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `titulo` varchar(180) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `instagram_posts`
--

INSERT INTO `instagram_posts` (`id`, `categoria`, `titulo`, `imagem`, `link`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Workshop Profissional', 'Aprendizado prático para construir uma carreira de sucesso.', 'uploads/instagram/1781805062_1781703437_workshop.png', 'https://www.instagram.com/reel/DX9m7lguuWI/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', 1, 1, '2026-05-28 19:46:47', '2026-06-18 18:08:50'),
(2, 'Trends', 'Explorando tendências digitais e transformando criatividade em aprendizado.', 'uploads/instagram/1781805074_1781703362_papoquerola.jfif', 'https://www.instagram.com/reel/DXpXGUzFhdR/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', 2, 1, '2026-05-28 19:46:47', '2026-06-18 18:03:53'),
(3, 'Vida de TI', 'Situações e momentos que fazem parte do universo da tecnologia.', 'uploads/instagram/1781805098_1781703474_saladeti.jfif', 'https://www.instagram.com/reel/DYxmMqhMznV/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==', 3, 1, '2026-05-28 19:46:47', '2026-06-18 18:07:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jornada`
--

CREATE TABLE `jornada` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jornada`
--

INSERT INTO `jornada` (`id`, `numero`, `titulo`, `descricao`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, '1', 'Inscrição', 'O jovem se inscreve e participa do processo de seleção.', 1, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(2, '2', 'Formação', 'Aulas práticas com tecnologia, programação e desafios criativos.', 2, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(3, '3', 'Mentoria', 'Contato com profissionais, empresas e experiências reais de mercado.', 3, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(4, '4', 'Futuro', 'O aluno sai mais preparado para estudar, trabalhar e empreender.', 4, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs_admin`
--

CREATE TABLE `logs_admin` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `acao` varchar(150) NOT NULL,
  `tabela_afetada` varchar(100) DEFAULT NULL,
  `registro_id` int(11) DEFAULT NULL,
  `detalhes` text DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `destaque_carrossel` tinyint(1) DEFAULT 1,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `nome`, `logo`, `link`, `destaque_carrossel`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Apeti', 'uploads/parceiros/1781806252_apeti_light.webp', '#', 1, 1, 1, '2026-05-28 19:46:47', '2026-06-18 18:10:52'),
(2, 'Senac', 'uploads/parceiros/1781806271_senac.png', '#', 1, 2, 1, '2026-05-28 19:46:47', '2026-06-18 18:11:11'),
(3, 'App Sistemas', 'uploads/parceiros/1781806299_appSistemas.png', '#', 1, 3, 1, '2026-05-28 19:46:47', '2026-06-18 18:11:39'),
(4, 'ATM', 'uploads/parceiros/1781806328_atmOut.png', '#', 1, 4, 1, '2026-05-28 19:46:47', '2026-06-18 18:12:08'),
(5, 'Escale', 'uploads/parceiros/1781806345_escale.png', '#', 1, 5, 1, '2026-05-28 19:46:47', '2026-06-18 18:12:25'),
(6, 'Salomé', 'uploads/parceiros/1781806372_expressoSalome.png', '#', 1, 6, 1, '2026-05-28 19:46:47', '2026-06-18 18:12:52'),
(7, 'Field', 'uploads/parceiros/1781806395_fielControl.png', '#', 1, 7, 1, '2026-05-28 19:46:47', '2026-06-18 18:13:15'),
(8, 'Gold System', 'uploads/parceiros/1781806440_goldSystem.png', '#', 1, 8, 1, '2026-05-28 19:46:47', '2026-06-18 18:14:00'),
(9, 'Gubolin Co', 'uploads/parceiros/1781806483_gubolin.png', '#', 1, 9, 1, '2026-05-28 19:46:47', '2026-06-18 18:14:43'),
(10, 'HDAUFF', 'uploads/parceiros/1781806530_hdauff.png', '#', 1, 10, 1, '2026-05-28 19:46:47', '2026-06-18 18:15:30'),
(11, 'GVC', 'uploads/parceiros/1781806561_gvc.png', '#', 1, 11, 1, '2026-05-28 19:46:47', '2026-06-18 18:16:01'),
(12, 'Hublab', 'uploads/parceiros/1781806606_hublab.png', '#', 1, 12, 1, '2026-05-28 19:46:47', '2026-06-18 18:16:46'),
(14, 'Informa', 'uploads/parceiros/1781806643_informaS.png', '#', 1, 13, 1, '2026-06-18 18:17:23', '2026-06-18 18:17:23'),
(15, 'ICAV', 'uploads/parceiros/1781806676_icav.png', '#', 1, 14, 1, '2026-06-18 18:17:56', '2026-06-18 18:17:56'),
(16, 'WZ Tech', 'uploads/parceiros/1781806722_wztech.png', '#', 1, 15, 1, '2026-06-18 18:18:42', '2026-06-18 18:18:42'),
(17, 'Mercatus', 'uploads/parceiros/1781806846_mercatus.png', '#', 1, 16, 1, '2026-06-18 18:20:46', '2026-06-18 18:20:46'),
(18, 'Cashfast', 'uploads/parceiros/1781806880_cashfast.png', '#', 1, 17, 1, '2026-06-18 18:21:20', '2026-06-18 18:21:20'),
(19, '2S Portaria', 'uploads/parceiros/1781806912_2sPortaria.png', '#', 1, 18, 1, '2026-06-18 18:21:52', '2026-06-18 18:21:52'),
(20, 'Netspeed', 'uploads/parceiros/1781806938_netspeed.png', '#', 1, 19, 1, '2026-06-18 18:22:18', '2026-06-18 18:22:18'),
(21, 'Proansi', 'uploads/parceiros/1781806961_proansi.png', '#', 1, 20, 1, '2026-06-18 18:22:41', '2026-06-18 18:22:41'),
(22, 'Ouro', 'uploads/parceiros/1781807027_ouro.png', '#', 1, 21, 1, '2026-06-18 18:23:47', '2026-06-18 18:24:28'),
(23, 'Topaz', 'uploads/parceiros/1781807097_topaz.png', '#', 1, 22, 1, '2026-06-18 18:24:57', '2026-06-18 18:24:57'),
(24, 'Unimed', 'uploads/parceiros/1781807113_unimed.png', '#', 1, 23, 1, '2026-06-18 18:25:13', '2026-06-18 18:25:13'),
(25, 'Grupo Visual', 'uploads/parceiros/1781807157_visualStudio.png', '#', 1, 24, 1, '2026-06-18 18:25:57', '2026-06-18 18:25:57'),
(26, 'Shift', 'uploads/parceiros/1781807212_shift.png', '#', 1, 25, 1, '2026-06-18 18:26:52', '2026-06-18 18:26:52'),
(27, 'Tereos', 'uploads/parceiros/1781807232_tereos.png', '#', 0, 1, 1, '2026-06-18 18:27:12', '2026-06-18 18:27:12'),
(28, 'Maluf', 'uploads/parceiros/1781807261_maluf.png', '#', 0, 2, 1, '2026-06-18 18:27:41', '2026-06-18 18:27:41'),
(29, 'LZ Tecnologia', 'uploads/parceiros/1781807302_lzTecnologia.png', '#', 0, 3, 1, '2026-06-18 18:28:22', '2026-06-18 18:28:22'),
(30, 'Dr. Uniforme', 'uploads/parceiros/1781807331_drUniforme.png', '#', 0, 4, 1, '2026-06-18 18:28:51', '2026-06-18 18:28:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participar_slides`
--

CREATE TABLE `participar_slides` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `participar_slides`
--

INSERT INTO `participar_slides` (`id`, `imagem`, `ordem`, `ativo`, `criado_em`) VALUES
(1, 'uploads/img_foto/carrosel_img1.jpg', 1, 1, '2026-06-17 15:00:07'),
(2, 'uploads/img_foto/login.jpg', 2, 1, '2026-06-17 15:00:07'),
(3, 'uploads/img_foto/carrosel_img3.jpg', 3, 1, '2026-06-17 15:00:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publico_alvo`
--

CREATE TABLE `publico_alvo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descricao` text NOT NULL,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `publico_alvo`
--

INSERT INTO `publico_alvo` (`id`, `titulo`, `descricao`, `ordem`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'Jovens do ensino médio', 'Principalmente estudantes de escolas públicas.', 1, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(2, 'Iniciantes em tecnologia', 'Não precisa ter experiência prévia para começar.', 2, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(3, 'Empresas apoiadoras', 'Organizações que desejam investir em impacto social.', 3, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(4, 'Mentores e parceiros', 'Profissionais que podem contribuir com conhecimento.', 4, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rodape_config`
--

CREATE TABLE `rodape_config` (
  `id` int(11) NOT NULL,
  `texto_sobre` text DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_whatsapp` varchar(255) DEFAULT NULL,
  `texto_whatsapp` varchar(50) DEFAULT NULL,
  `link_mapa` varchar(255) DEFAULT NULL,
  `texto_mapa` varchar(100) DEFAULT NULL,
  `link_util_1` varchar(255) DEFAULT NULL,
  `texto_util_1` varchar(100) DEFAULT NULL,
  `link_util_2` varchar(255) DEFAULT NULL,
  `texto_util_2` varchar(100) DEFAULT NULL,
  `link_util_3` varchar(255) DEFAULT NULL,
  `texto_util_3` varchar(100) DEFAULT NULL,
  `atualizado_em` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `rodape_config`
--

INSERT INTO `rodape_config` (`id`, `texto_sobre`, `link_instagram`, `link_whatsapp`, `texto_whatsapp`, `link_mapa`, `texto_mapa`, `link_util_1`, `texto_util_1`, `link_util_2`, `texto_util_2`, `link_util_3`, `texto_util_3`, `atualizado_em`) VALUES
(1, 'Formação gratuita em tecnologia para jovens, conectando educação, empresas e oportunidades.', 'https://instagram.com/galera_tech', 'https://wa.me/5517996197053', '(17) 99619-7053', 'https://maps.app.goo.gl/9Usk2iD7Dzm8M8DLA', 'São José do Rio Preto - SP', 'https://www.apeti.org.br', 'Apeti', 'https://forms.gle/VkdRtm56oPH4AWgf9', 'Inscrições', 'https://wa.me/5517996442507', 'Seja padrinho', '2026-06-18 17:10:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `secoes_conteudo`
--

CREATE TABLE `secoes_conteudo` (
  `id` int(11) NOT NULL,
  `chave` varchar(80) NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` text DEFAULT NULL,
  `texto_1` text DEFAULT NULL,
  `texto_2` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `texto_botao` varchar(80) DEFAULT NULL,
  `link_botao` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `secoes_conteudo`
--

INSERT INTO `secoes_conteudo` (`id`, `chave`, `tag`, `titulo`, `subtitulo`, `texto_1`, `texto_2`, `imagem`, `texto_botao`, `link_botao`, `ativo`, `criado_em`, `atualizado_em`) VALUES
(1, 'sobre', 'Sobre o projeto', 'Muito além de um curso de tecnologia', NULL, 'O Galera Tech é uma iniciativa de formação gratuita para jovens do ensino médio, com foco em programação, habilidades profissionais, empreendedorismo e conexão com o mercado.', 'A proposta é criar uma experiência prática, acolhedora e transformadora, aproximando os participantes de empresas, profissionais e oportunidades reais no setor de tecnologia.', 'uploads/sobre/sobre-galera-tech.jpg', NULL, NULL, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(2, 'jornada_intro', 'Jornada do participante', 'Como a experiência acontece', 'Uma trilha organizada para que o jovem entre, aprenda, pratique, se conecte com pessoas e enxergue novas possibilidades.', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(3, 'aprendizado_intro', 'Aprendizado', 'O que o aluno desenvolve', 'A formação combina conhecimento técnico, competências humanas e visão de carreira.', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(4, 'publico_intro', 'Para quem é', 'Uma oportunidade para jovens que querem começar', 'O Galera Tech é voltado para estudantes que desejam conhecer tecnologia, desenvolver habilidades e se aproximar do mercado.', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(5, 'experiencias_intro', 'Experiências', 'Vivências que aproximam os jovens do mercado', 'Além das aulas, o Galera Tech promove encontros, visitas, conversas e atividades que ampliam a visão dos participantes sobre carreira, tecnologia e futuro.', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(6, 'instagram_intro', 'Instagram', 'Acompanhe os bastidores do Galera Tech', 'Veja registros das aulas, experiências, alunos, padrinhos e momentos que fazem parte dessa transformação.', NULL, NULL, NULL, 'Seguir no Instagram', 'https://instagram.com/galeratech', 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(7, 'parceiros_intro', 'Apoios e parceiros', 'Quem acredita nessa transformação', 'O Galera Tech é fortalecido por instituições, empresas e profissionais que apoiam a formação de jovens para o futuro da tecnologia.', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47'),
(8, 'cta_final', 'Faça parte', 'Ajude jovens a descobrirem um futuro na tecnologia', 'Participe como aluno, padrinho, mentor, empresa apoiadora ou parceiro institucional.', NULL, NULL, NULL, 'Quero participar', '#', 1, '2026-05-28 19:46:47', '2026-05-28 19:46:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_admin`
--

CREATE TABLE `usuarios_admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` enum('admin','editor') DEFAULT 'admin',
  `ativo` tinyint(1) DEFAULT 1,
  `ultimo_login` datetime DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id`, `nome`, `email`, `senha`, `nivel`, `ativo`, `ultimo_login`, `criado_em`, `atualizado_em`) VALUES
(1, 'Administrador', 'admin@galeratech.local', '$2a$12$orJt0EWq/kAyt1AywDR50OMJK9siVHuq56Foqqt4ph9VDwKcwel.a', 'admin', 1, NULL, '2026-05-28 19:46:47', '2026-06-08 19:15:09');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_aprendizado_ativo`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_aprendizado_ativo` (
`id` int(11)
,`icone` varchar(80)
,`titulo` varchar(120)
,`descricao` text
,`ordem` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_depoimentos_ativos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_depoimentos_ativos` (
`id` int(11)
,`nome` varchar(120)
,`cargo` varchar(150)
,`empresa` varchar(150)
,`texto` text
,`foto` varchar(255)
,`tipo` enum('aluno','padrinho','mentor','parceiro')
,`destaque` tinyint(1)
,`ordem` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_hero_slides_ativos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_hero_slides_ativos` (
`id` int(11)
,`tag` varchar(120)
,`titulo` varchar(255)
,`destaque` varchar(150)
,`descricao` text
,`texto_botao_1` varchar(80)
,`link_botao_1` varchar(255)
,`texto_botao_2` varchar(80)
,`link_botao_2` varchar(255)
,`titulo_card` varchar(150)
,`texto_card` varchar(255)
,`imagem` varchar(255)
,`ordem` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_indicadores_ativos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_indicadores_ativos` (
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_parceiros_carrossel`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_parceiros_carrossel` (
`id` int(11)
,`nome` varchar(150)
,`logo` varchar(255)
,`link` varchar(255)
,`ordem` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura para view `vw_aprendizado_ativo`
--
DROP TABLE IF EXISTS `vw_aprendizado_ativo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_aprendizado_ativo`  AS SELECT `aprendizado`.`id` AS `id`, `aprendizado`.`icone` AS `icone`, `aprendizado`.`titulo` AS `titulo`, `aprendizado`.`descricao` AS `descricao`, `aprendizado`.`ordem` AS `ordem` FROM `aprendizado` WHERE `aprendizado`.`ativo` = 1 ORDER BY `aprendizado`.`ordem` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_depoimentos_ativos`
--
DROP TABLE IF EXISTS `vw_depoimentos_ativos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_depoimentos_ativos`  AS SELECT `depoimentos`.`id` AS `id`, `depoimentos`.`nome` AS `nome`, `depoimentos`.`cargo` AS `cargo`, `depoimentos`.`empresa` AS `empresa`, `depoimentos`.`texto` AS `texto`, `depoimentos`.`foto` AS `foto`, `depoimentos`.`tipo` AS `tipo`, `depoimentos`.`destaque` AS `destaque`, `depoimentos`.`ordem` AS `ordem` FROM `depoimentos` WHERE `depoimentos`.`ativo` = 1 ORDER BY `depoimentos`.`destaque` DESC, `depoimentos`.`ordem` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_hero_slides_ativos`
--
DROP TABLE IF EXISTS `vw_hero_slides_ativos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_hero_slides_ativos`  AS SELECT `hero_slides`.`id` AS `id`, `hero_slides`.`tag` AS `tag`, `hero_slides`.`titulo` AS `titulo`, `hero_slides`.`destaque` AS `destaque`, `hero_slides`.`descricao` AS `descricao`, `hero_slides`.`texto_botao_1` AS `texto_botao_1`, `hero_slides`.`link_botao_1` AS `link_botao_1`, `hero_slides`.`texto_botao_2` AS `texto_botao_2`, `hero_slides`.`link_botao_2` AS `link_botao_2`, `hero_slides`.`titulo_card` AS `titulo_card`, `hero_slides`.`texto_card` AS `texto_card`, `hero_slides`.`imagem` AS `imagem`, `hero_slides`.`ordem` AS `ordem` FROM `hero_slides` WHERE `hero_slides`.`ativo` = 1 ORDER BY `hero_slides`.`ordem` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_indicadores_ativos`
--
DROP TABLE IF EXISTS `vw_indicadores_ativos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_indicadores_ativos`  AS SELECT `indicadores`.`id` AS `id`, `indicadores`.`icone` AS `icone`, `indicadores`.`numero` AS `numero`, `indicadores`.`descricao` AS `descricao`, `indicadores`.`ordem` AS `ordem` FROM `indicadores` WHERE `indicadores`.`ativo` = 1 ORDER BY `indicadores`.`ordem` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para view `vw_parceiros_carrossel`
--
DROP TABLE IF EXISTS `vw_parceiros_carrossel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_parceiros_carrossel`  AS SELECT `parceiros`.`id` AS `id`, `parceiros`.`nome` AS `nome`, `parceiros`.`logo` AS `logo`, `parceiros`.`link` AS `link`, `parceiros`.`ordem` AS `ordem` FROM `parceiros` WHERE `parceiros`.`ativo` = 1 AND `parceiros`.`destaque_carrossel` = 1 ORDER BY `parceiros`.`ordem` ASC ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `apoiadores`
--
ALTER TABLE `apoiadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_apoiadores_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `aprendizado`
--
ALTER TABLE `aprendizado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aprendizado_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `botoes_cta`
--
ALTER TABLE `botoes_cta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `configuracoes_site`
--
ALTER TABLE `configuracoes_site`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_depoimentos_ativo_destaque` (`ativo`,`destaque`);

--
-- Índices de tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_experiencias_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `hero_slides`
--
ALTER TABLE `hero_slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_hero_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_indicadores_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `instagram_posts`
--
ALTER TABLE `instagram_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_instagram_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_jornada_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `logs_admin`
--
ALTER TABLE `logs_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logs_admin_usuario` (`usuario_id`);

--
-- Índices de tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_parceiros_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `participar_slides`
--
ALTER TABLE `participar_slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `publico_alvo`
--
ALTER TABLE `publico_alvo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_publico_ativo_ordem` (`ativo`,`ordem`);

--
-- Índices de tabela `rodape_config`
--
ALTER TABLE `rodape_config`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `secoes_conteudo`
--
ALTER TABLE `secoes_conteudo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chave` (`chave`);

--
-- Índices de tabela `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `apoiadores`
--
ALTER TABLE `apoiadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `aprendizado`
--
ALTER TABLE `aprendizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `botoes_cta`
--
ALTER TABLE `botoes_cta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `configuracoes_site`
--
ALTER TABLE `configuracoes_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `hero_slides`
--
ALTER TABLE `hero_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `instagram_posts`
--
ALTER TABLE `instagram_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `logs_admin`
--
ALTER TABLE `logs_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `participar_slides`
--
ALTER TABLE `participar_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `publico_alvo`
--
ALTER TABLE `publico_alvo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `rodape_config`
--
ALTER TABLE `rodape_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `secoes_conteudo`
--
ALTER TABLE `secoes_conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios_admin`
--
ALTER TABLE `usuarios_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `logs_admin`
--
ALTER TABLE `logs_admin`
  ADD CONSTRAINT `fk_logs_admin_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_admin` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
