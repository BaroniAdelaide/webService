-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.32-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database api_quiz
CREATE DATABASE IF NOT EXISTS `api_quiz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `api_quiz`;

-- Dump della struttura di tabella api_quiz.domanda_risposte
CREATE TABLE IF NOT EXISTS `domanda_risposte` (
  `id_domanda` int(11) NOT NULL,
  `id_risposta` int(11) NOT NULL,
  PRIMARY KEY (`id_domanda`,`id_risposta`),
  KEY `id_risposta` (`id_risposta`),
  CONSTRAINT `domanda_risposte_ibfk_1` FOREIGN KEY (`id_domanda`) REFERENCES `domande` (`id_domanda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `domanda_risposte_ibfk_2` FOREIGN KEY (`id_risposta`) REFERENCES `risposte` (`id_risposta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella api_quiz.domande
CREATE TABLE IF NOT EXISTS `domande` (
  `id_domanda` int(11) NOT NULL AUTO_INCREMENT,
  `domanda` varchar(255) NOT NULL,
  `punti` int(11) NOT NULL,
  PRIMARY KEY (`id_domanda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella api_quiz.quiz
CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `punteggio` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella api_quiz.quiz_domande
CREATE TABLE IF NOT EXISTS `quiz_domande` (
  `id_quiz` int(11) NOT NULL,
  `id_domanda` int(11) NOT NULL,
  PRIMARY KEY (`id_quiz`,`id_domanda`),
  KEY `id_domanda` (`id_domanda`),
  CONSTRAINT `quiz_domande_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `quiz_domande_ibfk_2` FOREIGN KEY (`id_domanda`) REFERENCES `domande` (`id_domanda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella api_quiz.risposte
CREATE TABLE IF NOT EXISTS `risposte` (
  `id_risposta` int(11) NOT NULL AUTO_INCREMENT,
  `risposta` varchar(255) NOT NULL,
  `corretta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_risposta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
