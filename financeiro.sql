-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2016 às 17:37
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `logar`
--

CREATE TABLE `logar` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `logar`
--

INSERT INTO `logar` (`id`, `login`, `senha`) VALUES
(1, 'adm', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento`
--

CREATE TABLE `movimento` (
  `id` int(11) NOT NULL,
  `cat` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `val` float DEFAULT NULL,
  `desk` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `day` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin7 COLLATE=latin7_general_cs;

--
-- Extraindo dados da tabela `movimento`
--

INSERT INTO `movimento` (`id`, `cat`, `val`, `desk`, `day`, `mes`, `ano`) VALUES
(141, 'Produto', 22, 'asdasd', 15, 11, 2016),
(78, 'aaaaa', -2233, 'asdasda', 1, 5, 2016),
(82, 'asdasd', 23, 'asdasd', 8, 12, 2016),
(83, 'asdasd', 34, 'asdsad', 8, 11, 2017),
(136, 'Produto', 333, 'asdasdasd', 15, 11, 2016),
(144, 'Produto', -3, 'asdsad', 21, 11, 2016),
(142, 'Produto', 33, 'asdas', 15, 11, 2016),
(143, 'Produto', -333, 'asdas', 15, 11, 2016),
(161, 'Produto', 22, 'aa', 24, 11, 2016),
(162, 'Produto', 33, 'asdsad', 24, 11, 2016),
(163, 'Serviços', 0, 'aaa', 26, 11, 2016),
(165, 'Serviços', 44, 'qweqweqwççç', 26, 11, 2016);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logar`
--
ALTER TABLE `logar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimento`
--
ALTER TABLE `movimento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logar`
--
ALTER TABLE `logar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `movimento`
--
ALTER TABLE `movimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
