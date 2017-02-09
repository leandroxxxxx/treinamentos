-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Fev-2017 às 19:21
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treinamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamentos`
--

CREATE TABLE `treinamentos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `observacao` text,
  `chave` varchar(20) NOT NULL,
  `contato` varchar(50) DEFAULT NULL,
  `ordem` int(1) NOT NULL,
  `data_inclusao` datetime NOT NULL,
  `data_modificado` datetime DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `tempo_inicio` time NOT NULL,
  `tempo_fim` time NOT NULL,
  `criado_por` varchar(50) NOT NULL,
  `modificado_por` varchar(50) DEFAULT NULL,
  `concluido` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `treinamentos`
--

INSERT INTO `treinamentos` (`id`, `id_usuario`, `observacao`, `chave`, `contato`, `ordem`, `data_inclusao`, `data_modificado`, `data_inicio`, `tempo_inicio`, `tempo_fim`, `criado_por`, `modificado_por`, `concluido`) VALUES
(8, 1, 'Alterado por teste', 'FLOR', 'Aline', 1, '2017-01-27 16:32:41', '2017-01-30 17:08:56', '2017-01-27', '14:00:00', '15:00:00', '1', '1', 'n'),
(9, 1, '', 'CASADESAUDE', 'Kellen', 1, '2017-01-30 10:56:25', '2017-01-30 17:09:03', '2017-01-30', '15:00:00', '16:00:00', '1', '1', 'n'),
(10, 7, 'ModificaÃ§Ã£o feita pelo Rafael', 'CADI', 'Elza', 2, '2017-01-30 16:48:14', '2017-01-30 17:33:44', '2017-01-30', '17:00:00', '18:00:00', '1', '7', 's'),
(11, 1, '', 'GENESE', 'Fabrizia', 1, '2017-01-30 16:49:14', NULL, '2017-01-31', '15:00:00', '16:00:00', '1', NULL, 'n'),
(12, 1, '', 'CADI', 'Elza', 1, '2017-01-31 09:23:59', NULL, '2017-01-31', '17:00:00', '18:00:00', '1', NULL, 'n'),
(13, 1, '', 'FLOR', 'Aline', 1, '2017-01-31 09:45:18', NULL, '2017-01-31', '13:00:00', '14:00:00', '1', NULL, 'n'),
(15, 1, 'ObservaÃ§Ã£o qualquer', 'GENESE', 'Adrian', 1, '2017-01-31 09:50:36', NULL, '2017-02-01', '13:00:00', '14:00:00', '1', NULL, 's'),
(16, 1, '', 'GENESE', 'Adrian', 2, '2017-01-31 17:40:36', NULL, '2017-02-01', '15:00:00', '16:00:00', '1', NULL, 'n'),
(17, 7, '', 'CASADESAUDE', 'Amanda', 1, '2017-02-01 13:05:41', NULL, '2017-02-02', '15:00:00', '16:00:00', '7', NULL, 's'),
(18, 7, '', 'CASADESAUDE', 'Amanda', 2, '2017-02-01 13:18:45', NULL, '2017-02-01', '18:00:00', '19:00:00', '7', NULL, 's'),
(19, 7, '', 'GENERAL', 'Adrian', 1, '2017-02-01 15:47:16', NULL, '2017-02-02', '09:30:00', '10:30:00', '7', NULL, 's'),
(20, 7, '', 'GENERAL', 'Adrian', 2, '2017-02-01 15:50:30', NULL, '2017-02-03', '16:00:00', '17:00:00', '7', NULL, 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `nivel`) VALUES
(1, 'Leandro Nascimento', 'leandroxxxxx', '1986f38eb113602f69ed42e8feebaf05', 2),
(2, 'Teste', 'teste', '202cb962ac59075b964b07152d234b70', 1),
(7, 'Rafael', 'rafael', '202cb962ac59075b964b07152d234b70', 1),
(9, 'Administrador', 'adm', 'b09c600fddc573f117449b3723f23d64', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `treinamentos`
--
ALTER TABLE `treinamentos`
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
-- AUTO_INCREMENT for table `treinamentos`
--
ALTER TABLE `treinamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
