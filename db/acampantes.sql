-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Abr-2017 às 18:02
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acampantes`
--

CREATE DATABASE IF NOT EXISTS acampantes;
USE acampantes;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acampantes`
--

CREATE TABLE IF NOT EXISTS `acampantes` (
  `nome` varchar(60) NOT NULL,
  `conta` decimal(5,2) DEFAULT NULL,
  `equipe` varchar(30) CHARACTER SET utf8 NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
`id` int(255) NOT NULL,
  `acampante_id` int(255) NOT NULL,
  `valor_compra` decimal(5,2) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acampantes`
--
ALTER TABLE `acampantes`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acampantes`
--
ALTER TABLE `acampantes`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
