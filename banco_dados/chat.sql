-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Maio-2020 às 18:08
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `mensagem`, `email`, `foto`, `hora`, `ip`) VALUES
(1, 'Samuquis', 'Opa', 'samuel@gmail.com', 'King.jpg', '19:23:14', '::1'),
(2, 'Sarasa', 'Qual foi?', 'sa@gmail.com', 'kratos.jpg', '19:23:27', '::1'),
(3, 'Samuquis', 'OlÃ¡ meu fi...', 'samuel@gmail.com', 'King.jpg', '20:53:10', '::1'),
(4, 'Sarasa', 'EAE MEN...', 'sa@gmail.com', 'kratos.jpg', '20:53:21', '::1'),
(5, 'Marandai', 'Opa pessoal como vai?', 'm@gmail.com', NULL, '20:56:53', '::1'),
(6, 'Marandai', 'Mudei a foto do perfil', 'm@gmail.com', 'banner modelo.png', '20:58:06', '::1'),
(7, 'Samuquis', 'NinguÃ©m perguntou', 'samuel@gmail.com', 'King.jpg', '20:58:26', '::1'),
(8, 'Marandai', 'Nosfa', 'm@gmail.com', 'banner modelo.png', '21:23:15', '::1'),
(9, 'Samuquis', 'Opa, como vÃ£o meus amigos?', 'samuel@gmail.com', 'King.jpg', '10:29:29', '::1'),
(10, 'Samuquis', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'samuel@gmail.com', 'King.jpg', '22:59:16', '::1'),
(11, 'Samuquis', 'sas', 'samuel@gmail.com', 'King.jpg', '12:58:25', '::1'),
(12, 'Samuquis', 'Opa, Demorei, mas cheguei<br />\n', 'samuel@gmail.com', 'King.jpg', '11:27:11', '::1'),
(13, 'Sarasa', 'Opa', 'sa@gmail.com', 'kratos.jpg', '11:28:10', '::1'),
(14, 'Sarasa', 'Como vÃ£o meus qeuridos amigos da internet?', 'sa@gmail.com', 'kratos.jpg', '11:28:32', '::1'),
(15, 'Sarasa', 'sssssssssssssssssssssdadadadsaddsfdfsssssssssssssssssssssssssssssssssssfsdfsfsffsdfsdfsdfsfsdfdfbcvcvbdfbfgbfgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'sa@gmail.com', 'kratos.jpg', '11:28:55', '::1'),
(20, 'FN', 'Opa, pessoal, sou novo por aqui, como cÃªs tÃ£o?<br />\n', 'fr@gmail.com', NULL, '20:04:33', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `moderador`
--

CREATE TABLE `moderador` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `moderador`
--

INSERT INTO `moderador` (`id`, `nome`, `senha`) VALUES
(1, 'Samuel', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `nomecompleto` varchar(200) DEFAULT NULL,
  `nomeusuario` varchar(200) NOT NULL,
  `pais` varchar(250) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `motivo` text NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id` int(11) NOT NULL,
  `email_de` varchar(100) NOT NULL,
  `email_para` varchar(100) NOT NULL,
  `amigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nomecompleto` varchar(200) DEFAULT NULL,
  `nomeusuario` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(9) NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nomecompleto`, `nomeusuario`, `pais`, `genero`, `email`, `senha`, `foto`) VALUES
(1, 'Samuel Edson Ribeiro Sampaio', 'Samuquis', 'Brasil', 'M', 'samuel@gmail.com', '123', 'King.jpg'),
(2, 'Sarasa', 'Sarasa', 'PaÃ­s da AmÃ©rica do Sul', 'M', 'sa@gmail.com', '123', 'kratos.jpg'),
(3, 'Maranda', 'Marandai', 'PaÃ­s da AmÃ©rica Central', 'M', 'm@gmail.com', '123', 'banner modelo.png'),
(5, 'Ryan da Silva Games', 'Mininu Ryan', 'BolÃ­via', 'M', 'ry@gmail.com', '123', NULL),
(6, 'Fernando Noranho', 'FN', 'Argentina', 'Outro', 'fr@gmail.com', '123', 'elfo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderador`
--
ALTER TABLE `moderador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `moderador`
--
ALTER TABLE `moderador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
