-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: db_test
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identify_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_note` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ADMIN','admin@gmail.com',1,NULL,'$2y$10$jk9AKrnoGj.Vn/ljrk.Lg.37OAkgb8JOj3HUr9wdgjbjxczd5Dxoa',NULL,NULL,NULL,NULL,NULL,'2020-11-24 20:09:35','2022-10-04 10:23:03',NULL,NULL,NULL,NULL),(2,'Tuấn Thanh 03','tuantt@gmail.com',2,NULL,'$2y$10$Gt7T/kgL/cquADLGgR9X1eS5h9e7ZcGJGuVkQ7vF.uXoE.6Gg3IiC',NULL,NULL,NULL,NULL,NULL,'2020-11-24 20:11:52','2022-10-05 08:33:13',NULL,NULL,NULL,NULL),(6,'Nhân viên test','tuantt72@wru.vn',2,NULL,'$2y$10$fnUpezZo.N5M/8oGgFjPXuLcOlO2Juvr/Riids61fQgGbRV0Q4Wdq',NULL,NULL,NULL,NULL,NULL,'2022-10-04 08:59:42','2022-10-04 08:59:42',NULL,NULL,NULL,NULL),(7,'Trần Văn Tèo','teo.tv@gmail.com',3,NULL,'$2y$10$V4e5XHq8l0FBRst6eEhnIe.36X/udRuiYnQ7B.rUXDnbuv41Gl7bS',NULL,NULL,NULL,NULL,NULL,'2022-10-04 09:26:51','2022-10-04 09:54:12','Hà Nội','KH7','0987654545','Khách VIP'),(9,'Thời trang nam','tuan22SD@dsd',3,NULL,'$2y$10$ly7TLI5Gm55RhPKX5dMKZuXtnT/gOZeXuJwZ/PVy7pOov2gJ5E35W',NULL,NULL,NULL,NULL,NULL,'2022-10-04 09:35:20','2022-10-04 09:54:24','Hà Nội','KH9','0976543789','VIP'),(10,'Áo thun nam trơn giá rẻ','ttt@gmail.com',3,NULL,'$2y$10$Ogbu19X8Bwgxmrrco0ouE..mT3TwJxYQptC.EgmZj084sA.BaE3UG',NULL,NULL,NULL,NULL,NULL,'2022-10-04 09:41:41','2022-10-04 09:41:41','Hà Nội','KH10','0987654545','ádasd');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-05 22:37:07
