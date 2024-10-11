-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11.10.2024 klo 09:10
-- Palvelimen versio: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retrogamehouse_high_score_hall_of_fame`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `juoksu_tulokset`
--

DROP TABLE IF EXISTS `juoksu_tulokset`;
CREATE TABLE IF NOT EXISTS `juoksu_tulokset` (
  `sijoitus` int DEFAULT NULL,
  `kayttajanimi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tulos_metreina` int DEFAULT NULL,
  `paivamaara` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `juoksu_tulokset`
--

INSERT INTO `juoksu_tulokset` (`sijoitus`, `kayttajanimi`, `tulos_metreina`, `paivamaara`) VALUES
(1, 'PlayerOne', 1500, '2024-09-01'),
(2, 'GamerGirl', 1450, '2024-09-01'),
(3, 'FastFingers', 1400, '2024-09-01'),
(4, 'SpeedyConzales', 1350, '2024-09-01'),
(5, 'QuickShot', 1300, '2024-09-01');

-- --------------------------------------------------------

--
-- Rakenne taululle `kuulantyöntö_tulokset`
--

DROP TABLE IF EXISTS `kuulantyöntö_tulokset`;
CREATE TABLE IF NOT EXISTS `kuulantyöntö_tulokset` (
  `sijoitus` int DEFAULT NULL,
  `kayttajanimi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tulos` text,
  `paivamaara` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `kuulantyöntö_tulokset`
--

INSERT INTO `kuulantyöntö_tulokset` (`sijoitus`, `kayttajanimi`, `tulos`, `paivamaara`) VALUES
(1, 'KuulaKing', '21.50 m', '2024-09-08'),
(2, 'PowerPusher', '20.75 m', '2024-09-08'),
(3, 'StrongShot', '20.10 m', '2024-09-08'),
(4, 'MightyThrow', '19.85 m', '2024-09-08'),
(5, 'HeavyHitter', '19.50 m', '2024-09-08');

-- --------------------------------------------------------

--
-- Rakenne taululle `pituushyppy_tulokset`
--

DROP TABLE IF EXISTS `pituushyppy_tulokset`;
CREATE TABLE IF NOT EXISTS `pituushyppy_tulokset` (
  `sijoitus` int DEFAULT NULL,
  `kayttajanimi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tulos` text,
  `paivamaara` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `pituushyppy_tulokset`
--

INSERT INTO `pituushyppy_tulokset` (`sijoitus`, `kayttajanimi`, `tulos`, `paivamaara`) VALUES
(1, 'LongLeaper', '8.25 m', '2024-09-15'),
(2, 'SkyJumper', '8.10 m', '2024-09-15'),
(3, 'FarFlyer', '7.95 m', '2024-09-15'),
(4, 'JumpMaster', '7.80 m', '2024-09-15'),
(5, 'SandSprinter', '7.65 m', '2024-09-15');

-- --------------------------------------------------------

--
-- Rakenne taululle `sivustolle_kirjautuminen`
--

DROP TABLE IF EXISTS `sivustolle_kirjautuminen`;
CREATE TABLE IF NOT EXISTS `sivustolle_kirjautuminen` (
  `kayttajatunnus` text,
  `salasana` varchar(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `sivustolle_kirjautuminen`
--

INSERT INTO `sivustolle_kirjautuminen` (`kayttajatunnus`, `salasana`) VALUES
('siiri.toivanen@edu.sakky.fi', 'AuRiNkO2'),
('nella.näpäkkä@edu.fi', 'kissa'),
('pekka.testattava@edu.fi', 'tuoli'),
('matti.testaaja@edu.fi', '444'),
('joona', '444');

-- --------------------------------------------------------

--
-- Rakenne taululle `uinti_tulokset`
--

DROP TABLE IF EXISTS `uinti_tulokset`;
CREATE TABLE IF NOT EXISTS `uinti_tulokset` (
  `sijoitus` int DEFAULT NULL,
  `kayttajanimi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tulos_sekunteina` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `paivamaara` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `uinti_tulokset`
--

INSERT INTO `uinti_tulokset` (`sijoitus`, `kayttajanimi`, `tulos_sekunteina`, `paivamaara`) VALUES
(1, 'SwimStar', '50.25 s', '2024-09-23'),
(2, 'AquaAce', '51.10 s', '2024-09-23'),
(3, 'FastFish', '51.75 s', '2024-09-23'),
(4, 'WaveRider', '52.30 s', '2024-09-23'),
(5, 'SplashMaster', '52.85 s', '2024-09-23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
