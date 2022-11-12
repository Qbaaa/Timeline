-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: timeline-db
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `events`
--

use hphDbBgYnn;


DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detailed_description` text COLLATE utf8mb4_unicode_ci,
  `file_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_type_id_foreign` (`type_id`),
  CONSTRAINT `events_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'1987-06-24','Narodziny','Narodziny w Rosario, Santa Fe, Argentina','Lionel Messi, Leo Messi, właśc. Lionel Andrés Messi Cuccittini ur. 24 czerwca 1987 w Rosario – argentyński piłkarz, występujący na pozycji napastnika lub ofensywnego pomocnik.','1668173013_Narodziny.jpg',3,'2022-11-11 13:23:33','2022-11-11 13:23:33'),(2,'2017-06-30','Ślub','Ślub Lionel Messi i Antonella Roccuzzo','Leo Messi i Antonella Roccuzzo są po ślubie! Para pobrała się w piątek, 30 czerwca w rodzinnym miasteczku, Rosario','1668173770_Ślub.jpg',3,'2022-11-11 13:36:10','2022-11-11 13:36:10'),(3,'2009-12-01','Pierwsze Złota Piłka','Najlepszy piłkarz minionego sezonu','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668174792_Pierwsze Złota Piłka.jpg',1,'2022-11-11 13:51:10','2022-11-11 13:53:12'),(4,'2011-01-10','Druga Złota Piłka','Złota Piłka FIFA za najlepszy sezon','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668175136_Druga Złota Piłka.jpg',1,'2022-11-11 13:58:56','2022-11-11 13:58:56'),(5,'2012-01-09','Trzecia Złota Piłka','Złota Piłka FIFA za najlepszy sezon','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668175255_Trzecia Złota Piłka.jpg',1,'2022-11-11 14:00:55','2022-11-11 14:00:55'),(6,'2013-01-07','Czwarta Złota Piłka','Złota Piłka FIFA za najlepszy sezon','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668175341_Czwarta Złota Piłka.jpg',1,'2022-11-11 14:02:21','2022-11-11 14:02:21'),(7,'2015-01-12','Piąta Złota Piłka','Złota Piłka FIFA za najlepszy sezon','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668175425_Piąta Złota Piłka.jpg',1,'2022-11-11 14:03:45','2022-11-11 14:03:45'),(8,'2019-12-02','Szósta Złota Piłka','Złota Piłka France Football za najlepszy sezon','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668175553_Szósta Złota Piłka.jpg',1,'2022-11-11 14:05:55','2022-11-11 14:05:55'),(9,'2021-11-29','Siódma Złota Piłka','Złota Piłka France Football za najlepszy sezon','Coroczny plebiscyt piłkarski. Trofeum przyznawane piłkarzowi, który zaprezentował się najlepiej w mijającym roku kalendarzowym. Na pomysł przyznawania Złotej Piłki wpadł szef „France Football”','1668175680_Siódma Złota Piłka.jpg',1,'2022-11-11 14:08:00','2022-11-11 14:08:00'),(10,'2006-05-17','Wygrana Liga Mistrzów','Pierwsza wygrana Liga Mistrzów UEFA','Liga Mistrzów UEFA (ang. UEFA Champions League – międzynarodowe, europejskie, klubowe rozgrywki piłkarskie, utworzone z inicjatywy UEFA w 1992.','1668176295_Wygrana Liga Mistrzów.jpg',1,'2022-11-11 14:18:15','2022-11-11 14:18:15'),(11,'2009-05-27','Wygrana Liga Mistrzów','Druga wygrana Liga Mistrzów UEFA','Liga Mistrzów UEFA (ang. UEFA Champions League – międzynarodowe, europejskie, klubowe rozgrywki piłkarskie, utworzone z inicjatywy UEFA w 1992.','1668176425_Wygrana Liga Mistrzów.jpg',1,'2022-11-11 14:20:27','2022-11-11 14:20:27'),(12,'2011-05-28','Wygrana Liga Mistrzów','Trzecia wygrana Liga Mistrzów UEFA','Liga Mistrzów UEFA (ang. UEFA Champions League – międzynarodowe, europejskie, klubowe rozgrywki piłkarskie, utworzone z inicjatywy UEFA w 1992.','1668176539_Wygrana Liga Mistrzów.jpg',1,'2022-11-11 14:22:19','2022-11-11 14:22:19'),(13,'2015-06-06','Wygrana Liga Mistrzów','Czwarta wygrana Liga Mistrzów UEFA','Liga Mistrzów UEFA (ang. UEFA Champions League – międzynarodowe, europejskie, klubowe rozgrywki piłkarskie, utworzone z inicjatywy UEFA w 1992.','1668176748_Wygrana Liga Mistrzów.jpg',1,'2022-11-11 14:25:48','2022-11-11 14:25:48'),(14,'2021-07-11','Copa América 2021','Wygranie Copa América 2021 z reprezentacją','Copa América 2021 – 47. edycja piłkarskiego Copa América organizowana przez CONMEBOL. Turniej odbywał się w Brazylii między 13 czerwca a 10 lipca.','1668177374_Copa América 2021.jpg',2,'2022-11-11 14:36:14','2022-11-11 14:36:14'),(15,'2022-06-01','Superpuchar CONMEBOL–UEFA','Wygranie Superpuchar CONMEBOL–UEFA z reprezentacją','Trzecia edycja meczu pomiędzy zwycięzcą Mistrzostw Europy w piłce nożnej a triumfatorem Copa América. Odbył się w środę 1 czerwca 2022 roku o godzinie 20:45 na Stadionie Wembley w Londynie w Anglii.','1668177635_Superpuchar CONMEBOL–UEFA.png',2,'2022-11-11 14:40:35','2022-11-11 14:40:35'),(16,'2005-07-02','Mistrzostwa Świata U-20','Wygranie młodzieżowych Mistrzostw Świata','Młodzieżowe Mistrzostwa Świata w Piłce Nożnej 2005 – piętnasta edycja tego międzynarodowego turnieju piłkarskiego, odbywającego się w Holandii od 10 czerwca do 2 lipca 2005.','1668185344_Mistrzostwa Świata U-20.jpg',2,'2022-11-11 16:49:04','2022-11-11 16:49:04'),(17,'2012-03-07','5 bramek','Strzelenie 5 bramek w jednym meczu','Strzelenie 5 bramek w jednym meczu podczas międzynarodowych, europejskich, klubowych rozgrywkach piłkarskich','1668186144_5 bramek.jpg',4,'2022-11-11 17:02:25','2022-11-11 17:02:25'),(18,'2012-12-31','91 bramek','Najwięcej bramek w roku','Najwięcej bramek zdobytych w jednym roku kalendarzowym','1668186701_91 bramek.jpg',4,'2022-11-11 17:11:41','2022-11-11 17:11:41'),(19,'2022-10-25','129 bramka','Zdobycie 192 bramek','Zdobycie 192 bramek w Lidze Mistrzów','1668186997_129 bramka.jpg',4,'2022-11-11 17:16:37','2022-11-11 17:16:37');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2022_11_01_000000_create_sessions_table',1),(3,'2022_11_02_000000_create_types_table',1),(4,'2022_11_03_000000_create_processes_table',1),(5,'2022_11_05_000000_create_events_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processes`
--

DROP TABLE IF EXISTS `processes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `processes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detailed_description` text COLLATE utf8mb4_unicode_ci,
  `file_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processes`
--

LOCK TABLES `processes` WRITE;
/*!40000 ALTER TABLE `processes` DISABLE KEYS */;
INSERT INTO `processes` VALUES (1,'2000-12-14','2021-06-30','FC Barcelona','Okres gry w Barcelonie','FC Barcelona, Barça, właśc. Futbol Club Barcelona – kataloński wielosekcyjny klub sportowy z Barcelony (Hiszpania), istniejący od chwili powstania męskiej drużyny piłkarskiej. Założony 29 listopada 1899 r. przez grupę Szwajcarów, Anglików, Katalończyków i Niemca, z czasem stał się katalońską instytucją o dużym znaczeniu społecznym. Jego motto to Més que un club (pol. Więcej niż klub).','1668168629_FC Barcelona.png','2022-11-11 12:10:29','2022-11-11 12:10:29'),(2,'2021-07-10','2023-07-10','Paris Saint-Germain','Okres gry w Paris','Paris Saint-Germain Football Club – francuski klub piłkarski z siedzibą w Paryżu, rozgrywający mecze na stadionie Parc des Princes. Założony został w 1970 roku i aktualnie występuje w rozgrywkach Ligue 1. Drużyna należy do najbardziej utytułowanych w swoim kraju, mając na koncie m.in. dziesięć mistrzostw Francji, czternaście Pucharów Francji, dzięsięć Superpucharów Francji, dziewięć Pucharów Ligi Francuskiej oraz Puchar Zdobywców Pucharów i Puchar Intertoto.','1668169186_Paris Saint-Germain.png','2022-11-11 12:19:46','2022-11-11 12:19:46');
/*!40000 ALTER TABLE `processes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('SNnp72C7oVrqHhBtLvBONKWhBLqjE17DA6NqW5L2',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibnB0WVdPbmRjOFNKVmNYQ2JzV3RZN2JRQlIwRFo2WG9iOTdwaU9OTiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2V2ZW50cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1668187000);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'TROFEA','#ffd700','2022-11-11 12:27:57','2022-11-11 12:44:07'),(2,'REPREZENTACJA','#0007db','2022-11-11 12:28:27','2022-11-11 12:44:37'),(3,'ŻYCIE OSOBISTE','#d10000','2022-11-11 12:43:37','2022-11-11 12:44:58'),(4,'OSIĄGNIĘCIA','#0e920c','2022-11-11 16:58:05','2022-11-11 17:03:08');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jakub','jakub@test.com','2022-11-11 11:05:50','2022-11-11 11:05:50','$2y$10$eMwvudx3m5PsylSG8lvHa.QeNHZlZ0IImDa/3RldGgPzviBis5WDC');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'timeline-db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-11 18:28:30
