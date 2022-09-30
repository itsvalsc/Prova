-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database lunova
CREATE DATABASE IF NOT EXISTS `lunova` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `lunova`;

-- Dump della struttura di tabella lunova.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `IDAmministratore` varchar(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Via` varchar(30) DEFAULT NULL,
  `NCivico` varchar(4) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `Citta` varchar(30) DEFAULT NULL,
  `CAP` varchar(5) DEFAULT NULL,
  `NTelefono` varchar(10) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `Livello` varchar(1) NOT NULL,
  PRIMARY KEY (`IDAmministratore`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.admin: ~0 rows (circa)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.artista
CREATE TABLE IF NOT EXISTS `artista` (
  `IdArtista` varchar(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Via` varchar(30) DEFAULT NULL,
  `NCivico` varchar(4) DEFAULT NULL,
  `Provincia` varchar(2) DEFAULT NULL,
  `Citta` varchar(30) DEFAULT NULL,
  `CAP` varchar(5) DEFAULT NULL,
  `NTelefono` varchar(10) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `Livello` varchar(1) NOT NULL,
  PRIMARY KEY (`IdArtista`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.artista: ~0 rows (circa)
/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.carta
CREATE TABLE IF NOT EXISTS `carta` (
  `NCarta` varchar(16) NOT NULL,
  `Intestatario` varchar(50) NOT NULL,
  `Scadenza` varchar(5) NOT NULL,
  `CVC` varchar(3) NOT NULL,
  `IdCliente` varchar(5) NOT NULL,
  PRIMARY KEY (`NCarta`),
  KEY `FK_carta_cliente` (`IdCliente`),
  CONSTRAINT `FK_carta_cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.carta: ~0 rows (circa)
/*!40000 ALTER TABLE `carta` DISABLE KEYS */;
/*!40000 ALTER TABLE `carta` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.categories: ~2 rows (circa)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Categoria 1'),
	(2, 'Categoria 2');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `IdCliente` varchar(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `NCivico` varchar(4) NOT NULL,
  `Via` varchar(30) NOT NULL,
  `Provincia` varchar(2) NOT NULL,
  `Citta` varchar(30) NOT NULL,
  `CAP` varchar(5) NOT NULL,
  `NTelefono` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Livello` varchar(1) NOT NULL,
  PRIMARY KEY (`IdCliente`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.cliente: ~0 rows (circa)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.immagine
CREATE TABLE IF NOT EXISTS `immagine` (
  `Id` varchar(5) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Formato` blob NOT NULL,
  `IdAppartenenza` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_immagine_artista` (`IdAppartenenza`),
  CONSTRAINT `FK_immagine_artista` FOREIGN KEY (`IdAppartenenza`) REFERENCES `artista` (`IdArtista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_immagine_cliente` FOREIGN KEY (`IdAppartenenza`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_immagine_product` FOREIGN KEY (`IdAppartenenza`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.immagine: ~0 rows (circa)
/*!40000 ALTER TABLE `immagine` DISABLE KEYS */;
/*!40000 ALTER TABLE `immagine` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.ordine
CREATE TABLE IF NOT EXISTS `ordine` (
  `IdOrdine` varchar(5) NOT NULL,
  `CittaSped` varchar(30) NOT NULL,
  `CAPSped` varchar(5) NOT NULL,
  `IndirizzoSped` varchar(30) NOT NULL,
  `ModPagamento` varchar(10) NOT NULL,
  `TotaleOrdine` varchar(10) NOT NULL,
  `Confermato` tinyint(1) NOT NULL,
  `IdCliente` varchar(5) NOT NULL,
  `IdArtista` varchar(5) NOT NULL,
  PRIMARY KEY (`IdOrdine`),
  KEY `FK_ordine_cliente` (`IdCliente`),
  KEY `FK_ordine_artista` (`IdArtista`),
  CONSTRAINT `FK_ordine_artista` FOREIGN KEY (`IdArtista`) REFERENCES `artista` (`IdArtista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ordine_cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.ordine: ~0 rows (circa)
/*!40000 ALTER TABLE `ordine` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordine` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.ordineitem
CREATE TABLE IF NOT EXISTS `ordineitem` (
  `Idordineitem` varchar(5) NOT NULL,
  `Qta` int(11) NOT NULL,
  `PrezzoTot` varchar(10) NOT NULL,
  `IdProdotto` varchar(5) NOT NULL,
  `IdOrdine` varchar(5) NOT NULL,
  PRIMARY KEY (`Idordineitem`),
  KEY `FK_ordineitem_product` (`IdProdotto`),
  KEY `FK_ordineitem_ordine` (`IdOrdine`),
  CONSTRAINT `FK_ordineitem_ordine` FOREIGN KEY (`IdOrdine`) REFERENCES `ordine` (`IdOrdine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ordineitem_product` FOREIGN KEY (`IdProdotto`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.ordineitem: ~0 rows (circa)
/*!40000 ALTER TABLE `ordineitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordineitem` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `category_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_product_categories` (`category_id`),
  CONSTRAINT `FK_product_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.product: ~2 rows (circa)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `description`, `price`, `category_id`) VALUES
	('1', 'Prodotto 1', 'Quetso è ilprodotto 1', 9.00, 1),
	('2', 'Prodotto 2', 'Quetso è ilprodotto 2', 10.00, 2);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dump della struttura di tabella lunova.wallet
CREATE TABLE IF NOT EXISTS `wallet` (
  `IdWallet` varchar(5) NOT NULL,
  `Saldo` varchar(10) NOT NULL,
  `IdCliente` varchar(5) NOT NULL,
  PRIMARY KEY (`IdWallet`),
  KEY `FK_wallet_cliente` (`IdCliente`),
  CONSTRAINT `FK_wallet_cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella lunova.wallet: ~0 rows (circa)
/*!40000 ALTER TABLE `wallet` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallet` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
