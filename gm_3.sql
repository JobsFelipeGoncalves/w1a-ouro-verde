-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Maio-2023 às 23:19
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gm_3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `ordem`, `nome`, `email`, `senha`, `nivel`, `status`) VALUES
(842870242, 5, 'Testess', 'teste@teste.com', '6ca29d9bb530402bd09fe026ee838148', 'Padrão', 'lixeira'),
(629051831, 6, 'Felipe', 'l.felipe.m.goncalves@gmail.com', '$2y$10$UgfZiSE2rn5eBolvZsNbRutYq6qFYKl3gpWNrQGcLT20Yod5g9.ue', 'Administrador', 'ativo'),
(844119111, 7, 'Roberto Venture', 'usuario@novosite.com', '$2y$10$.7WOV8D7pKixkIh1kBwcheTHiCvBO1pojpCWtAG3CuRxm0TLwguXe', 'Administrador', 'ativo'),
(198113253, 8, 'Felps', 'usuario@site.com', '$2y$10$8J0fKQWl63bAMLb4H0TO8u3fHQ6ipkz/IKmf5uItTFs4Fes5pWLTa', 'Administrador', 'ativo'),
(650592887, 9, 'Padrão', 'padrao@teste.com', '$2y$10$QDxvUVPZOQHdUbCebtYqDuDeEZyazo0xXMdP0967H6smlT1PiNBjG', 'Padrão', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `depoimentos` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `nome_completo`, `depoimentos`, `status`, `ordem`) VALUES
(2312423, 'Rogerio Gomes', 'Com a FatCred você tem a tranquilidade de contratar alguns tipos de seguros no conforto da sua casa, de forma rápida, simples e sem burocracia.', 'publicado', 1),
(31292604, 'teste', 'teste', 'publicado', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaques`
--

CREATE TABLE `destaques` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_fundo` varchar(255) NOT NULL,
  `cor_botao` varchar(255) NOT NULL,
  `texto_botao` varchar(255) NOT NULL,
  `link_botao` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `destaques`
--

INSERT INTO `destaques` (`id`, `titulo`, `img`, `img_fundo`, `cor_botao`, `texto_botao`, `link_botao`, `status`, `ordem`) VALUES
(134204185, 'Consulte seu FGTS agora mesmo!', 'fgts.png', '#2888a5', '#ffffff', 'Solicitar consulta', 'http://www.fatcred.com.br/#mensagem', 'publicado', 12),
(309633086, 'Temos a força que você precisa', 'slide.png', '#125d30', '#125d30', 'Faça seu orçamento', '#mensagem', 'publicado', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `palavras_chave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `seo`
--

INSERT INTO `seo` (`id`, `titulo`, `descricao`, `palavras_chave`) VALUES
(9938773, 'Ouro Verde - Guindastes e Muncks', 'Serviços de guindastes em construção civil, Serviços de guindastes em redes de alta tensão, Serviços de guindastes em usinas de álcool e açúcar e Serviços de Munck\r\n\r\n:: Locação de Muncks por hora\r\n\r\n:: Serviços de remoção e outros\r\n\r\n:: Locação de guindaste, munck e prancha\r\n\r\n:: Comércio de sucatas', 'Guindastes, Caminhões Munck, Empilhadeira, Locação de equipamentos, Dourados MS, Mato Grosso do Sul, Metalúrgica Dourados, Locação de Guindaste, Locação de Munck, Dourados, Locação de Equipamentos em Dourados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slides_simples`
--

CREATE TABLE `slides_simples` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link_botao` varchar(255) NOT NULL,
  `texto_botao` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `slides_simples`
--

INSERT INTO `slides_simples` (`id`, `titulo`, `subtitulo`, `img`, `link_botao`, `texto_botao`, `status`, `ordem`) VALUES
(508382817, 'Temos a força que você precisa', 'Guindastes e Muncks para diversos usos.', 'slide.png', '#contato', 'Faça seu orçamento', 'publicado', 3),
(634564961, 'Preparado e reforçado para tudo.', 'Tecnologia e força ao seu favor', 'Mobile-crane-Tadano-Marbella_2_1_2048px-1-1024x512.jpg', '#contato', 'Faça seu orçamento', 'publicado', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`ordem`);

--
-- Índices para tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`ordem`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `slides_simples`
--
ALTER TABLE `slides_simples`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ordem` (`ordem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `slides_simples`
--
ALTER TABLE `slides_simples`
  MODIFY `ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
