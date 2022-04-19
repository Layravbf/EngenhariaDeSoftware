-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Abr-2022 às 12:40
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--
CREATE DATABASE IF NOT EXISTS `sistema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sistema`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `email` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos` (
  `periodo` varchar(50) NOT NULL,
  `aprovacao` varchar(50) NOT NULL,
  `email_fk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE `disciplinas` (
  `disciplina` varchar(50) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `nota_final` float(24) NOT NULL,
  `email_fk` varchar(255) NOT NULL,
  `periodo_fk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

DROP TABLE IF EXISTS `atividades`;
CREATE TABLE `atividades` (
  `atividade` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `nota` float(24) NOT NULL,
  `email_fk` varchar(255) NOT NULL,
  `periodo_fk` varchar(50) NOT NULL,
  `disciplina_fk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `periodos`
--
ALTER TABLE `periodos`
  ADD KEY `periodo` (`periodo`),
  ADD KEY `email_fk` (`email_fk`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD KEY `disciplina` (`disciplina`),
  ADD KEY `email_fk` (`email_fk`),
  ADD KEY `periodo_fk` (`periodo_fk`);

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD KEY `atividade` (`atividade`),
  ADD KEY `email_fk` (`email_fk`),
  ADD KEY `periodo_fk` (`periodo_fk`),
  ADD KEY `disciplina_fk` (`disciplina_fk`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `periodos`
--
ALTER TABLE `periodos`
  ADD CONSTRAINT `periodo_email_fk` FOREIGN KEY (`email_fk`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplina_email_fk` FOREIGN KEY (`email_fk`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplina_periodo_fk` FOREIGN KEY (`periodo_fk`) REFERENCES `periodos` (`periodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `atividade_email_fk` FOREIGN KEY (`email_fk`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atividade_periodo_fk` FOREIGN KEY (`periodo_fk`) REFERENCES `periodos` (`periodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atividade_disciplina_fk` FOREIGN KEY (`disciplina_fk`) REFERENCES `disciplinas` (`disciplina`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;