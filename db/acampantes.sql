-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11-Abr-2017 às 05:14
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `acampantes`
--

CREATE TABLE IF NOT EXISTS `acampantes` (
  `nome` varchar(60) NOT NULL,
  `conta` decimal(4,2) DEFAULT NULL,
  `equipe` varchar(30) CHARACTER SET utf8 NOT NULL,
`id` int(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `acampantes`
--

INSERT INTO `acampantes` (`nome`, `conta`, `equipe`, `id`) VALUES
('zezinho', '50.00', 'Adoratubers', 1),
('Rodrigo', '50.00', 'Adoratubers', 2),
('Juninho', '9.20', 'Adoratubers', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
`id` int(255) NOT NULL,
  `acampante_id` int(255) NOT NULL,
  `valor_compra` decimal(4,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
