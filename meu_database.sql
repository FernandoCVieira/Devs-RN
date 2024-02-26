-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/02/2024 às 19:16
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meu_database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuidades`
--

DROP TABLE IF EXISTS `anuidades`;
CREATE TABLE IF NOT EXISTS `anuidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ano` int NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `anuidades`
--

INSERT INTO `anuidades` (`id`, `ano`, `valor`) VALUES
(1, 2021, 90.00),
(2, 2022, 100.00),
(3, 2023, 110.00),
(4, 2024, 120.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `associados`
--

DROP TABLE IF EXISTS `associados`;
CREATE TABLE IF NOT EXISTS `associados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `data_filiacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `associados`
--

INSERT INTO `associados` (`id`, `nome`, `email`, `cpf`, `data_filiacao`) VALUES
(1, 'Gold D. Roger', 'goldD@gmail.com', '002.004.025-99', '2023-02-24'),
(5, 'Maria', 'maria@yahoo.com', '123.200.340.00', '2024-02-26'),
(6, 'Flavia ', 'flavia01@hotmail.com', '003.050.912-12', '2024-02-26'),
(4, 'Wall', 'wall12@gmail.com', '123.456.908-88', '2024-02-25'),
(7, 'Chico', 'chico1@outlool.com', '123.050.910-45', '2024-02-25'),
(8, 'Marta', 'marta01@gmail.com', '303.404.080-12', '2024-02-24'),
(9, 'Giulia', 'giulia@gmai.com', '783.666.050-44', '2023-06-03'),
(10, 'Diogo', 'digo@yahoo.com', '444.050.060-88', '2023-06-03'),
(11, 'Diogo', 'digo@yahoo.com', '444.050.060-88', '2023-06-03'),
(12, 'Fernandes', 'fernandevieira@outlook.com', '040.050.070-80', '2021-12-25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `associado_anuidade`
--

DROP TABLE IF EXISTS `associado_anuidade`;
CREATE TABLE IF NOT EXISTS `associado_anuidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_associado` int NOT NULL,
  `id_anuidade` int NOT NULL,
  `pago` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_associado` (`id_associado`),
  KEY `id_anuidade` (`id_anuidade`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `associado_anuidade`
--

INSERT INTO `associado_anuidade` (`id`, `id_associado`, `id_anuidade`, `pago`) VALUES
(1, 4, 4, 0),
(2, 5, 4, 1),
(3, 6, 4, 1),
(4, 7, 4, 1),
(5, 8, 4, 1),
(6, 9, 4, 0),
(7, 10, 4, 0),
(8, 11, 4, 1),
(9, 12, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerentes`
--

DROP TABLE IF EXISTS `gerentes`;
CREATE TABLE IF NOT EXISTS `gerentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `gerentes`
--

INSERT INTO `gerentes` (`id`, `nome`, `email`, `hash_senha`) VALUES
(1, 'João Maria', 'admin@devs.com.br', '$2y$10$2FnTihCURhsMuyAiiu8tmu2dXDdSM90W4wGHOVh0zJpzqx1sP8mWq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
