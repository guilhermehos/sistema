-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2016 às 15:39
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistema_informacoes`
--
CREATE DATABASE IF NOT EXISTS `sistema_informacoes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema_informacoes`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `data_img` varchar(255) NOT NULL,
  `faixa` varchar(255) NOT NULL,
  `hora_final` varchar(255) NOT NULL,
  `hora_inicial` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `outrolocal` varchar(255) NOT NULL,
  `publico` varchar(255) NOT NULL,
  `reg_breve_res` varchar(255) NOT NULL,
  `reg_nome_ativ` varchar(255) NOT NULL,
  `reg_responsavel` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `classificacao` varchar(255) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `data_inicial` varchar(255) NOT NULL,
  `data_final` varchar(255) NOT NULL,
  `proponente` varchar(255) NOT NULL,
  `pub_previsto` varchar(255) NOT NULL,
  `pub_efetivo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mat` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
