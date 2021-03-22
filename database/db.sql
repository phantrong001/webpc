-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: web_maytinh
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accessories`
--

DROP TABLE IF EXISTS `accessories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accessories` (
  `id_acc` int NOT NULL AUTO_INCREMENT,
  `kind_acc` varchar(45) NOT NULL,
  `name_acc` varchar(45) DEFAULT NULL,
  `quantily_acc` int NOT NULL,
  `price_acc` int NOT NULL,
  `img_acc` varchar(45) DEFAULT NULL,
  `firm_acc` varchar(10) DEFAULT NULL,
  `maker_acc` varchar(45) DEFAULT NULL,
  `detail_acc` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_acc`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accessories`
--

LOCK TABLES `accessories` WRITE;
/*!40000 ALTER TABLE `accessories` DISABLE KEYS */;
INSERT INTO `accessories` VALUES (101,'USB','Đầu thu USB Bluetooth 4.0 Orico BTA-403',20,159000,'image/USB001.jpg','Orico',NULL,'Đầu thu USB Bluetooth 4.0 Orico BTA-403\n- Thiết kế nhỏ gọn\n- Cắm là chạy, không cần cài đặt\n- Tương thích tốt với các loại tay cầm chơi game bluetooth như PS4, Xbox One S'),(102,'USB','Đầu thu USB Bluetooth 3.0 Orico',21,120000,NULL,'Orico',NULL,'Đẹp');
/*!40000 ALTER TABLE `accessories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `components` (
  `id_com` int NOT NULL AUTO_INCREMENT,
  `kind_com` varchar(45) NOT NULL,
  `name_com` varchar(100) DEFAULT NULL,
  `quantily` int NOT NULL,
  `price_com` int NOT NULL,
  `img_com` varchar(45) DEFAULT NULL,
  `firm_com` varchar(45) DEFAULT NULL,
  `detail_com` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (201,'CPU','CPU Intel Core i3-9100',20,3090000,'CPU001.jpg','Intel','3.6GHz/ 4C4T/ 6MB/ Coffee Lake-R'),(202,'CPU','CPU Intel Core i3-10100',20,3140000,'CPU002.jpg','Intel','6M Cache, 3.60 GHz up to 4.30 GHz, 4C8T, Socket 1200, Comet Lake-S'),(203,'CPU','CPU Intel Core i5-10400',20,4600000,'CPU003.jpg','Intel','12M Cache, 2.90 GHz up to 4.30 GHz, 6C12T, Socket 1200, Comet Lake-S'),(204,'CPU ','CPU Intel Core i5-9400',20,4300000,'CPU004.jpg','Intel','2.9 Upto 4.1GHz/ 6C6T/ 9MB/ Coffee Lake-R'),(205,'CPU ','CPU Intel Core i5-10500',20,5500000,'CPU005.jpg','Intel','12M Cache, 3.10 GHz up to 4.50 GHz, 6C12T, Socket 1200, Comet Lake-S'),(206,'CPU ','CPU Intel Core i5-10600',20,6000000,'CPU006.jpg','Intel','12M Cache, 3.30 GHz up to 4.80 GHz, 6C12T, Socket 1200, Comet Lake-S'),(207,'CPU ','CPU Intel Core i7-10700',20,8000000,'CPU007.jpg','Intel','16M Cache, 2.90 GHz up to 4.80 GHz, 8C16T, Socket 1200, Comet Lake-S'),(208,'CPU ','CPU Intel Core i7-10700K',20,9500000,'CPU008.jpg','Intel','16M Cache, 3.80 GHz up to 5.10 GHz, 8C16T, Socket 1200, Comet Lake-S'),(209,'CPU ','CPU Intel Core i9-10900',20,11000000,'CPU009.jpg','Intel','20M Cache, 2.80 GHz up to 5.20 GHz, 10C20T, Socket 1200, Comet Lake-S'),(210,'CPU ','CPU Intel Core i9-10900K',20,11900000,'CPU010.jpg','Intel','20M Cache, 3.70 GHz up to 5.30 GHz, 10C20T, Socket 1200, Comet Lake-S'),(211,'CPU ','CPU Intel Pentium G5400',20,1700000,'CPU011.jpg','Intel','3.7GHz, 2C4T, 4MB, 1151 Coffee Lake');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `computer`
--

DROP TABLE IF EXISTS `computer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computer` (
  `id_pc` int NOT NULL AUTO_INCREMENT,
  `name_pc` varchar(45) DEFAULT NULL,
  `quantity_pc` int NOT NULL,
  `price_pc` int NOT NULL,
  `img_pc` varchar(100) NOT NULL,
  `firm_pc` varchar(10) DEFAULT NULL,
  `maker_pc` varchar(30) DEFAULT NULL,
  `config_pc` varchar(45) DEFAULT NULL,
  `detail_pc` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id_pc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computer`
--

LOCK TABLES `computer` WRITE;
/*!40000 ALTER TABLE `computer` DISABLE KEYS */;
INSERT INTO `computer` VALUES (1,'Laptop Acer Gaming Nitro 5 AN515-55-55E3',20,26990000,'image/AC001.jpg','ACER','China','Intel® Core i5-10300H','CPU: Intel® Core i5-10300H (2.50 GHz upto 4.50 GHz, 8MB)\nRAM: 16GB DDR4 2933MHz (2 khe, tối đa 32GB)\nỔ cứng: 512GB PCIe NVMe SSD\nVGA: NVIDIA® GeForce RTX™ 2060 6GB GDDR6\nMàn hình: 15.6\" FHD (1920 x 1080) IPS 144Hz slim bezel LCD\nPin: 4-cell, 57.5 Wh\nCân nặng: 2.3Kg\nTính năng: Đèn nền bàn phím\nMàu sắc: Đen\nOS: Windows 10 Home'),(2,'Laptop Asus TUF Gaming A15 FA506II-AL016T',15,22790000,'image/AS001.jpg','ASUS','China','AMD Ryzen™ R7-4800H','CPU: AMD Ryzen™ R7-4800H (2.90GHz upto 4.20GHz, 8MB)\nRAM: 8GB DDR4 3200MHz (2x SO-DIMM slots)\nỔ cứng: 512G PCIe® Gen3 SSD + 1slot hdd\nVGA: nVidia Geforce GTX 1650Ti 4GB GDDR6\nMàn hình: 15.6 inch FHD (1920x1080) 144Hz\nPin: 3Cell, 48WHr\nCân nặng: 2.3 kg\nTính năng: Đèn nền bàn phím\nOS: Windows 10 64bit'),(3,'Laptop Dell Vostro 15 3500 7G3981',22,15590000,'image/DE001.png','DELL','China','Intel® Core™ i5-1135G7','CPU: Intel® Core™ i5-1135G7 (tối đa 4.20GHz, 8MB)\nRAM: 8GB (8GBx1) DDR4 2666MHz (2 Khe)\nỔ cứng: 256GB M.2 PCIe NVMe + 1 slot 2.5\" (HDD/SSD)\nVGA: Intel® Iris® Xe Graphics\nMàn hình: 15.6-inch FHD (1920 x 1080) Anti-glare LED Backlight Non-Touch Narrow Border WVA Display\nPin: 3-cell, 42 WHr\nCân nặng: 1.78 kg\nMàu sắc: Đen\nOS: Windows 10 Home SL');
/*!40000 ALTER TABLE `computer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id_cus` int NOT NULL AUTO_INCREMENT,
  `name_cus` varchar(45) NOT NULL,
  `phone_cus` char(10) NOT NULL,
  `address_cus` varchar(500) NOT NULL,
  PRIMARY KEY (`id_cus`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id_ord` int NOT NULL AUTO_INCREMENT,
  `date_ord` datetime NOT NULL,
  `status_ord` varchar(15) NOT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `id_cus` int NOT NULL,
  PRIMARY KEY (`id_ord`),
  KEY `fk_id_cus_idx` (`id_cus`),
  CONSTRAINT `fk_id_cus` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id_cus`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetail` (
  `id_ord` int NOT NULL AUTO_INCREMENT,
  `id_product` int NOT NULL,
  `quantity_ord` int NOT NULL,
  `total_ord` int NOT NULL,
  KEY `fk_id_ord_idx` (`id_ord`),
  CONSTRAINT `fk_id_ord` FOREIGN KEY (`id_ord`) REFERENCES `order` (`id_ord`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-22 14:46:58
