-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Fev-2023 às 01:10
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
(198113253, 8, 'Felps', 'usuario@site.com', '$2y$10$8J0fKQWl63bAMLb4H0TO8u3fHQ6ipkz/IKmf5uItTFs4Fes5pWLTa', 'Administrador', 'ativo');

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
(189445466, 'Teste de inserção de imagem', '', '#000000', '#000000', '', '', 'publicado', 2),
(232866377, 'Novo teste de slide', 'f9226b5710b5d4ea7072b0dfd43c6086 (1).jpg', '#ff2e2e', '#6f55ce', 'Saiba mais', 'http://meusite.com', 'publicado', 3);

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
(9938773, 'Mundo Irrigação - Consultorias em projetos de irrigação', 'Consultoria é a criação de um projeto de irrigação personalizado.', 'irrigação, projeto pivo central, plantação, fazendas, agricultura, hectares, solo, energia, água, reaproveitamento, econimia, dourados, Brasil, index, MS, mato grosso do sul.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `ordem`, `titulo`, `descricao`, `link`, `status`, `data`) VALUES
(274939142, 1, 'RESERVATÓRIO COM 80 MILHÕES DE LITROS PARA PIVÔ CENTRAL', 'Faaaala Irrigantes, segue mais uma super obra com um reservatório gigantesco para pivô central. Acompanhe os detalhes de construção e tire todas as suas dúvidas no instagram pivo_central.', '3TcHGYXJjWA', 'publicado', '22 de Setembro de 2022 às 20:57:08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`ordem`);

--
-- Índices para tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`ordem`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`ordem`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `ordem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
