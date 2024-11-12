CREATE DATABASE IF NOT EXISTS `db_documents_login`
/*!40100 DEFAULT CHARACTER SET latin1 */
;

USE `db_documents_login`;

-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: db_documents_login
-- ------------------------------------------------------
-- Server version	5.7.31
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!50503 SET NAMES utf8 */
;

/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;

/*!40103 SET TIME_ZONE='+00:00' */
;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `adress`
--
DROP TABLE IF EXISTS `adress`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `adress` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `slug_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 86 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `adress`
--
LOCK TABLES `adress` WRITE;

/*!40000 ALTER TABLE `adress` DISABLE KEYS */
;

/*!40000 ALTER TABLE `adress` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `authorizerequests`
--
DROP TABLE IF EXISTS `authorizerequests`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `authorizerequests` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `itinerary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arr_requests_in_script` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver` int(10) DEFAULT NULL,
  `vehicle` int(10) DEFAULT NULL,
  `authorized_departure_date` date DEFAULT NULL,
  `authorized_departure_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `output_mileage` int(12) DEFAULT NULL,
  `return_mileage` int(12) DEFAULT NULL,
  `authorizer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusauthorization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `justificativa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 868 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `authorizerequests`
--
LOCK TABLES `authorizerequests` WRITE;

/*!40000 ALTER TABLE `authorizerequests` DISABLE KEYS */
;

/*!40000 ALTER TABLE `authorizerequests` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `categories`
--
DROP TABLE IF EXISTS `categories`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `categories`
--
LOCK TABLES `categories` WRITE;

/*!40000 ALTER TABLE `categories` DISABLE KEYS */
;

INSERT INTO
  `categories`
VALUES
  (
    1,
    'COMBUSTÍVEL',
    'Abastecimento, combustíveis fósseis, combustíveis químicos, biocombustíveis\r\n',
    '2020-11-12 18:45:58',
    '2020-11-12 18:45:58'
  ),
  (
    2,
    'QUILOMETRAGEM',
    'Custo em Km\'s',
    '2020-11-12 18:45:58',
    '2020-11-12 18:45:58'
  ),
  (
    3,
    'MANUTENÇÃO',
    'Serviços de manutenção. Inclui aquisição de peças',
    '2020-11-13 13:42:59',
    '2020-11-13 13:42:59'
  );

/*!40000 ALTER TABLE `categories` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `category_expense`
--
DROP TABLE IF EXISTS `category_expense`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `category_expense` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `expense_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_expense_category_id_foreign` (`category_id`),
  KEY `category_expense_expense_id_foreign` (`expense_id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `category_expense`
--
LOCK TABLES `category_expense` WRITE;

/*!40000 ALTER TABLE `category_expense` DISABLE KEYS */
;

/*!40000 ALTER TABLE `category_expense` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `drivers`
--
DROP TABLE IF EXISTS `drivers`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `drivers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_driver` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hab` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 31 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `drivers`
--
LOCK TABLES `drivers` WRITE;

/*!40000 ALTER TABLE `drivers` DISABLE KEYS */
;

INSERT INTO
  `drivers`
VALUES
  (1, 'SEM MOTORISTA', '', '', NULL, NULL);

/*!40000 ALTER TABLE `drivers` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `expenses`
--
DROP TABLE IF EXISTS `expenses`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `expenses` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(12) NOT NULL,
  `category_id` int(12) NOT NULL,
  `supply_in_liters` decimal(5, 3) DEFAULT NULL,
  `total_value_supply` decimal(10, 2) DEFAULT NULL,
  `previous_mileage` int(7) DEFAULT NULL,
  `current_mileage` int(7) DEFAULT NULL,
  `quantity_km_whells` int(7) DEFAULT NULL,
  `cost_per_liter` decimal(10, 2) DEFAULT NULL,
  `kilometers_per_liter` decimal(5, 3) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` text CHARACTER SET utf8mb4,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fk_vehicles` (`vehicle_id`),
  KEY `fk_categories` (`category_id`)
) ENGINE = MyISAM AUTO_INCREMENT = 51 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `expenses`
--
LOCK TABLES `expenses` WRITE;

/*!40000 ALTER TABLE `expenses` DISABLE KEYS */
;

/*!40000 ALTER TABLE `expenses` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--
DROP TABLE IF EXISTS `failed_jobs`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `failed_jobs`
--
LOCK TABLES `failed_jobs` WRITE;

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */
;

/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `fuel_costs`
--
DROP TABLE IF EXISTS `fuel_costs`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `fuel_costs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `request_id` int(12) DEFAULT NULL,
  `group_script` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_id` int(12) DEFAULT NULL,
  `sector_id` int(12) DEFAULT NULL,
  `individual_km` decimal(6, 2) DEFAULT NULL,
  `percet` decimal(4, 2) DEFAULT NULL,
  `individual_liter` decimal(6, 2) DEFAULT NULL,
  `individual_spent` decimal(10, 2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 891 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `fuel_costs`
--
LOCK TABLES `fuel_costs` WRITE;

/*!40000 ALTER TABLE `fuel_costs` DISABLE KEYS */
;

/*!40000 ALTER TABLE `fuel_costs` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `migrations`
--
DROP TABLE IF EXISTS `migrations`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 28 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `migrations`
--
LOCK TABLES `migrations` WRITE;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */
;

INSERT INTO
  `migrations`
VALUES
  (1, '2014_10_12_000000_create_users_table', 1),
  (
    2,
    '2014_10_12_100000_create_password_resets_table',
    1
  ),
  (
    3,
    '2019_08_19_000000_create_failed_jobs_table',
    1
  ),
  (4, '2020_04_30_200343_create_vehicles_table', 1),
  (
    5,
    '2020_05_09_175702_create_solicitacoes_table',
    1
  ),
  (
    6,
    '2020_10_19_111620_create_permissions_table',
    1
  ),
  (7, '2020_10_19_111733_create_roles_table', 1),
  (
    15,
    '2020_10_22_105605_create_categories_table',
    2
  ),
  (16, '2020_10_22_105911_create_expenses_table', 2),
  (
    17,
    '2020_10_22_110200_create_category_expense_table',
    2
  ),
  (23, '2020_10_22_125237_create_drivers_table', 3),
  (
    24,
    '2020_10_22_145004_add_motorista_id_table_vehicles',
    3
  );

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--
DROP TABLE IF EXISTS `password_resets`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `password_resets`
--
LOCK TABLES `password_resets` WRITE;

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */
;

/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--
DROP TABLE IF EXISTS `permission_role`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE = MyISAM AUTO_INCREMENT = 80 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `permission_role`
--
LOCK TABLES `permission_role` WRITE;

/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */
;

INSERT INTO
  `permission_role`
VALUES
  (48, 4, 1),
  (49, 4, 2),
  (50, 1, 1),
  (51, 2, 1),
  (52, 3, 1),
  (53, 5, 1),
  (54, 6, 1),
  (55, 7, 1),
  (56, 8, 1),
  (57, 9, 1),
  (58, 11, 1),
  (59, 1, 2),
  (60, 2, 2),
  (61, 3, 2),
  (62, 5, 2),
  (63, 6, 2),
  (64, 7, 2),
  (65, 8, 2),
  (66, 9, 2),
  (67, 1, 3),
  (68, 2, 3),
  (69, 3, 3),
  (70, 8, 3),
  (71, 10, 3),
  (72, 1, 4),
  (73, 2, 4),
  (74, 3, 4),
  (75, 10, 4),
  (76, 1, 5),
  (77, 2, 5),
  (78, 3, 5),
  (79, 10, 5);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `permissions`
--
DROP TABLE IF EXISTS `permissions`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `permissions`
--
LOCK TABLES `permissions` WRITE;

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */
;

INSERT INTO
  `permissions`
VALUES
  (1, 'Request', 'Solicita Veículo', NULL, NULL),
  (
    2,
    'Edit Request',
    'Edita solicitação Pendente',
    NULL,
    NULL
  ),
  (
    3,
    'Delete Request',
    'Deleta solicitação Pendente',
    NULL,
    NULL
  ),
  (
    4,
    'Authorize Request',
    'Autoriza solicitações',
    NULL,
    NULL
  ),
  (
    5,
    'Manages expenses',
    'Administra despesas(Cadastra, edita e deleta categorias. Cadastra, edita e deleta custo)',
    NULL,
    NULL
  ),
  (
    6,
    'Manages drivers',
    'Administra motoristas(Cadastra, edita e deleta motoristas)',
    NULL,
    NULL
  ),
  (
    7,
    'Manages sectors',
    'Administra setores',
    NULL,
    NULL
  ),
  (
    8,
    'Access reports',
    'Visualiza e exporta relatórios do sistema.',
    NULL,
    NULL
  ),
  (
    9,
    'View ADM dashboard',
    'Visualiza Dashboard com informações para o ADM',
    NULL,
    NULL
  ),
  (
    10,
    'View USER dashboard',
    'Visualiza Dashboard com informações para o USER',
    NULL,
    NULL
  ),
  (
    11,
    'Manages Users',
    'Cadastra, edita e deleta usuário.',
    NULL,
    NULL
  );

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `role_user`
--
DROP TABLE IF EXISTS `role_user`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE = MyISAM AUTO_INCREMENT = 138 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `role_user`
--
LOCK TABLES `role_user` WRITE;

/*!40000 ALTER TABLE `role_user` DISABLE KEYS */
;

INSERT INTO
  `role_user`
VALUES
  (1, 1, 1, NULL, NULL);

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `roles`
--
DROP TABLE IF EXISTS `roles`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `roles`
--
LOCK TABLES `roles` WRITE;

/*!40000 ALTER TABLE `roles` DISABLE KEYS */
;

INSERT INTO
  `roles`
VALUES
  (
    1,
    'SUPER ADM',
    'Infraestrutura, administrador geral. Nível 1.',
    NULL,
    NULL
  ),
  (
    2,
    'ADM',
    'Serviços Gerais, administrador de frota. Nível 2.',
    NULL,
    NULL
  ),
  (
    3,
    'MANAGER',
    'Gestores Administrativos, ADM Financeiro, ADM Custos, etc. Nível 3.',
    NULL,
    NULL
  ),
  (
    4,
    'USER REQUEST',
    'Gestores de setor ou responsáveis autorizados, responsáveis por solicitar frota. Nível 4',
    NULL,
    NULL
  ),
  (
    0,
    'NO ROLE',
    'Usuário sem permissões',
    '2020-10-26 19:40:07',
    '2020-10-26 19:40:07'
  ),
  (
    5,
    'PAD',
    'PAD',
    '2021-05-24 20:55:45',
    '2021-05-24 20:55:45'
  );

/*!40000 ALTER TABLE `roles` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `sectors`
--
DROP TABLE IF EXISTS `sectors`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cc` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 65 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `sectors`
--
LOCK TABLES `sectors` WRITE;

/*!40000 ALTER TABLE `sectors` DISABLE KEYS */
;

INSERT INTO
  `sectors`
VALUES
  (64, '27', 'INFORMATICA');

/*!40000 ALTER TABLE `sectors` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sector_id` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `sector_id` (`sector_id`)
) ENGINE = MyISAM AUTO_INCREMENT = 139 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `users`
--
LOCK TABLES `users` WRITE;

/*!40000 ALTER TABLE `users` DISABLE KEYS */
;

INSERT INTO
  `users`
VALUES
  (
    1,
    '27',
    'Administrador',
    'hsj.developmentsoftware@gmail.com',
    NULL,
    '$2y$10$C/nRlyKb16BDjglx.qsa2uQPN44H0cSQknTcoSJ6.b.YPpxfbGRta',
    NULL,
    '2022-02-23 14:22:18',
    '2022-02-23 14:22:18'
  );

/*!40000 ALTER TABLE `users` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `vehiclerequests`
--
DROP TABLE IF EXISTS `vehiclerequests`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `vehiclerequests` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) unsigned NOT NULL,
  `grouprequest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setorsolicitante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leito` int(12) DEFAULT NULL,
  `sltmotivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estadopaciente` text COLLATE utf8mb4_unicode_ci,
  `materiaisfin` text COLLATE utf8mb4_unicode_ci,
  `admfin` text COLLATE utf8mb4_unicode_ci,
  `datasaida` date DEFAULT NULL,
  `horasaida` time DEFAULT NULL,
  `dataretorno` date DEFAULT NULL,
  `horaretorno` time DEFAULT NULL,
  `statussolicitacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mileage_traveled` decimal(12, 3) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 1482 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `vehiclerequests`
--
LOCK TABLES `vehiclerequests` WRITE;

/*!40000 ALTER TABLE `vehiclerequests` DISABLE KEYS */
;

/*!40000 ALTER TABLE `vehiclerequests` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--
DROP TABLE IF EXISTS `vehicles`;

/*!40101 SET @saved_cs_client     = @@character_set_client */
;

/*!50503 SET character_set_client = utf8mb4 */
;

CREATE TABLE `vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `brand` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `situacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometers_per_liter` decimal(10, 3) DEFAULT NULL,
  `last_price` decimal(10, 3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_placa_unique` (`placa`),
  KEY `vehicles_driver_id_foreign` (`driver_id`)
) ENGINE = MyISAM AUTO_INCREMENT = 36 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `vehicles`
--
LOCK TABLES `vehicles` WRITE;

/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */
;

INSERT INTO
  `vehicles`
VALUES
  (
    1,
    1,
    'SEM VEICULOS',
    'A',
    'AAA 0000',
    2020,
    'EM USO',
    0.000,
    7.260,
    '2020-11-03 11:51:42',
    '2021-04-06 15:47:58'
  );

/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */
;

UNLOCK TABLES;

--
-- Dumping events for database 'db_documents_login'
--
--
-- Dumping routines for database 'db_documents_login'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2022-02-23  8:25:18
