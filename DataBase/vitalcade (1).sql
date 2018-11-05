-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2018 at 12:47 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitalcade`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `Departamento` varchar(50) NOT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idDepartamento`),
  KEY `idPersona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entidad`
--

DROP TABLE IF EXISTS `entidad`;
CREATE TABLE IF NOT EXISTS `entidad` (
  `idEntidad` int(11) NOT NULL AUTO_INCREMENT,
  `Razonsocial` varchar(50) NOT NULL,
  `Ruc` varchar(13) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`idEntidad`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entidad`
--

INSERT INTO `entidad` (`idEntidad`, `Razonsocial`, `Ruc`, `Direccion`) VALUES
(32, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `entregas`
--

DROP TABLE IF EXISTS `entregas`;
CREATE TABLE IF NOT EXISTS `entregas` (
  `idEntrega` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `Detalle` varchar(50) NOT NULL,
  `Fechaentrega` datetime NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idEntrega`),
  KEY `idDepartamento` (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `idGenero` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(10) NOT NULL,
  `Abrev` char(1) NOT NULL,
  PRIMARY KEY (`idGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`idGenero`, `Descripcion`, `Abrev`) VALUES
(1, 'Masculino', 'M'),
(2, 'Femenino', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCompleto` varchar(100) NOT NULL,
  `CiRuc` varchar(13) NOT NULL,
  `TelCel` varchar(13) NOT NULL,
  `IdGenero` int(11) NOT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `IdGenero` (`IdGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`idPersona`, `NombreCompleto`, `CiRuc`, `TelCel`, `IdGenero`) VALUES
(5, 'Mena Camacho Jefferson Andres ', '2100812839', '0980307834', 1);

-- --------------------------------------------------------

--
-- Table structure for table `politicas`
--

DROP TABLE IF EXISTS `politicas`;
CREATE TABLE IF NOT EXISTS `politicas` (
  `idPolitica` int(11) NOT NULL AUTO_INCREMENT,
  `Politica` varchar(20) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPolitica`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `politicas`
--

INSERT INTO `politicas` (`idPolitica`, `Politica`, `Estado`) VALUES
(1, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `IdPolitica` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `IdPolitica` (`IdPolitica`),
  KEY `idPersona` (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Usuario`, `Clave`, `Estado`, `IdPolitica`, `idPersona`) VALUES
(2, 'jefferson.mena', '123', 1, 1, 5),
(3, 'jefferson.mc', '123', 1, 1, 5),
(4, 'jefferson.mca', '123', 1, 1, 5),
(5, 'jefferson.andres.mc', '123', 1, 1, 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`) ON UPDATE CASCADE;

--
-- Constraints for table `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON UPDATE CASCADE;

--
-- Constraints for table `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`IdGenero`) REFERENCES `genero` (`idGenero`) ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdPolitica`) REFERENCES `politicas` (`idPolitica`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
