/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80027
 Source Host           : localhost:3306
 Source Schema         : klinik

 Target Server Type    : MySQL
 Target Server Version : 80027
 File Encoding         : 65001

 Date: 12/01/2022 15:27:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for medicines
-- ----------------------------
DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `medicine_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medicine_name` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medicine_price` int NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL,
  `updated_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medicine_type` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `medicine_stock` int NOT NULL,
  PRIMARY KEY (`medicine_id`),
  KEY `medicine_type` (`medicine_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of medicines
-- ----------------------------
BEGIN;
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145251', 'Paracetamol', 10000, '2021-12-21 02:52:51', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0007', 99);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145312', 'Komik OBH', 20000, '2021-12-21 02:53:12', 'admin', '2021-12-21 03:07:53', 'admin', 'REF-0008', 100);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145342', 'Amlodipine 5 Mg', 12500, '2021-12-21 02:53:42', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0007', 98);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145458', 'Voltadex 50 mg ', 9000, '2021-12-21 02:54:58', 'admin', '2021-12-21 03:08:07', 'admin', 'REF-0005', 100);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145610', 'Mefinal 250 mg', 15900, '2021-12-21 02:56:10', 'admin', '2021-12-21 03:08:14', 'admin', 'REF-0005', 100);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145704', 'Cendo Lyteers Eye Drops 15 ml', 44300, '2021-12-21 02:57:04', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0017', 99);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145742', 'Promag Gazero 10 ml 6 Sachet', 30000, '2021-12-21 02:57:42', 'admin', '2021-12-21 03:08:32', 'admin', 'REF-0008', 100);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145824', 'Farpain 10 mg', 86000, '2021-12-21 02:58:24', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0004', 99);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145843', 'Ketrolac', 78000, '2021-12-21 02:58:43', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0018', 98);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021145929', 'Decamox Sirup 60 ml', 15000, '2021-12-21 02:59:29', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0008', 99);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021150957', 'Biostatik 150 mg', 75000, '2021-12-21 03:09:57', 'admin', '0000-00-00 00:00:00', 'apoteker', 'REF-0004', 100);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-212021151034', 'Pharflox 400 mg', 207500, '2021-12-21 03:10:34', 'admin', '0000-00-00 00:00:00', '', 'REF-0008', 100);
INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `medicine_type`, `medicine_stock`) VALUES ('MED-232021092819', 'tambah obat', 10000, '2021-12-23 09:28:19', 'admin', '2022-01-06 08:48:42', 'admin', 'REF-0005', 10);
COMMIT;

-- ----------------------------
-- Table structure for patients
-- ----------------------------
DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `patient_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_name` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patient_age` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_gender` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of patients
-- ----------------------------
BEGIN;
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-0001', 'Devri Budi Christianto', 'Jogonalan Lor RT 01 Dusun VII Tirtonirmolo Kasihan Bantul Yogyakarta', '29', '2021-12-18 12:54:35', 'developer', '2021-12-20 05:58:44', 'admin', 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-0002', 'Dehn Joe', 'Tegal Krapyak RT 76 RW 25 Panggungharjo Sewon Bantul', '30', '2021-12-18 12:54:35', 'developer', NULL, '', 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-0003', 'Aprilia Ariana Dewi Prasetya', 'Monggang RT 01 RW 008 Panggungharjo Sewon Bantul', '23', '2021-12-18 13:37:41', 'developer', NULL, NULL, 'REF-0002');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-062022084541', 'gova', 'Jogonalan Lor', '20', '2022-01-06 08:45:41', 'admin', NULL, NULL, 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-182021161302', 'Renata Kusumawardani', 'Karangnongko RT 089 RW 12 Panggungharjo Sewon Bantul', '26', '2021-12-18 04:13:02', 'admin', NULL, NULL, 'REF-0002');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021084922', 'Namira Kurnia ', 'JL. Ampel no 12 Depok Sleman Yogyakarta', '21', '2021-12-22 08:49:22', 'admin', NULL, NULL, 'REF-0002');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021085201', 'Reihan Septa Raharja', 'JL.Kabupaten No 4 RT.010 RW.78 Gamping Sleman Daerah Istimewa Yogyakarta', '30', '2021-12-22 08:52:01', 'admin', NULL, NULL, 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021085315', 'Kuniasari Raharja', 'Bangunjiwo RT 045 Dusun V Tirtonirmolo Kasihan Bantul Daerah Istimewa Yogyakarta', '30', '2021-12-22 08:53:15', 'admin', NULL, NULL, 'REF-0002');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021085438', 'Narendra Andika Kurniawan', 'JL.Kabupaten No 10 RT.010 RW.78 Gamping Sleman Daerah Istimewa Yogyakarta', '30', '2021-12-22 08:54:38', 'admin', NULL, NULL, 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021085552', 'Adrian Setiawan', 'Gedongkuning RT 78 RW 31 Banguntapan Bantul Daerah Istimewa Yogyakarta', '45', '2021-12-22 08:55:52', 'admin', NULL, NULL, 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021085826', 'Agustinus Dwi Haryanto', 'Ganjuran, Sumbermulyo (Bambanglipuro), Bantul, DI Yogyakarta', '30', '2021-12-22 08:58:26', 'admin', NULL, NULL, 'REF-0001');
INSERT INTO `patients` (`patient_id`, `patient_name`, `patient_address`, `patient_age`, `created_date`, `created_by`, `updated_date`, `updated_by`, `patient_gender`) VALUES ('PAT-222021090721', 'Anita Kusumawardani', 'Jalan Kenari No.56, Muja Muju, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55165', '70', '2021-12-22 09:07:21', 'admin', NULL, NULL, 'REF-0002');
COMMIT;

-- ----------------------------
-- Table structure for ref_reservation
-- ----------------------------
DROP TABLE IF EXISTS `ref_reservation`;
CREATE TABLE `ref_reservation` (
  `ref_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ref_reservation_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ref_medicine_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL,
  `updated_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ref_reservation
-- ----------------------------
BEGIN;
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-0620220846581', 'CHK-062022084622', 'MED-212021145251', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-06202208465844', 'CHK-062022084622', 'MED-232021092819', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-06202208465873', 'CHK-062022084622', 'MED-212021145843', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-06202208465894', 'CHK-062022084622', 'MED-212021145342', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-22202119482667', 'CHK-222021193955', 'MED-212021145704', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-22202119482675', 'CHK-222021193955', 'MED-212021145824', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-22202119482684', 'CHK-222021193955', 'MED-212021145929', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-23202109255613', 'CHK-232021092501', 'MED-212021145843', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
INSERT INTO `ref_reservation` (`ref_id`, `ref_reservation_id`, `ref_medicine_id`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RMR-23202109255626', 'CHK-232021092501', 'MED-212021145342', '0000-00-00 00:00:00', 'dokter', '0000-00-00 00:00:00', '');
COMMIT;

-- ----------------------------
-- Table structure for reference
-- ----------------------------
DROP TABLE IF EXISTS `reference`;
CREATE TABLE `reference` (
  `reference_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reference_label` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reference_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of reference
-- ----------------------------
BEGIN;
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0001', 'PRIA', 'gender');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0002', 'WANITA', 'gender');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0003', 'Pulvis', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0004', 'Tablet', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0005', 'Pil', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0006', 'Kapsul', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0007', 'Kaplet', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0008', 'Larutan', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0009', 'Suspensi', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0010', 'Emulsi', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0011', 'Galenik', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0012', 'Ekstrak', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0013', 'Infusa', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0014', 'Imunoserum', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0015', 'Salep', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0016', 'Suppositoria', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0017', 'Obat tetes', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0018', 'Injeksi', 'jenis_obat');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0019', 'MENDAFTAR', 'reservation');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0020', 'DIPERIKSA', 'dokter');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0021', 'SELESAI', 'apotek');
INSERT INTO `reference` (`reference_id`, `reference_label`, `reference_type`) VALUES ('REF-0022', 'BATAL', 'reservation');
COMMIT;

-- ----------------------------
-- Table structure for reservations
-- ----------------------------
DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `reservation_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reservation_user` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reservation_status` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of reservations
-- ----------------------------
BEGIN;
INSERT INTO `reservations` (`reservation_id`, `reservation_user`, `reservation_status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('CHK-062022084622', 'PAT-062022084541', 'REF-0021', '2022-01-06 08:46:22', 'resepsionis', '2022-01-06 08:47:53', 'apoteker');
INSERT INTO `reservations` (`reservation_id`, `reservation_user`, `reservation_status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('CHK-222021193955', 'PAT-222021085552', 'REF-0021', '2021-12-22 07:39:55', 'resepsionis', '2021-12-22 07:51:33', 'apoteker');
INSERT INTO `reservations` (`reservation_id`, `reservation_user`, `reservation_status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('CHK-222021194006', 'PAT-222021085826', 'REF-0022', '2021-12-22 07:40:06', 'resepsionis', '2022-01-06 08:50:48', 'admin');
INSERT INTO `reservations` (`reservation_id`, `reservation_user`, `reservation_status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('CHK-232021092501', 'PAT-0002', 'REF-0021', '2021-12-23 09:25:01', 'resepsionis', '2021-12-23 09:26:56', 'apoteker');
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_name` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`role_id`, `role_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RL-0047893', 'APOTEKER', '2021-12-18 06:56:35', 'developer', NULL, NULL);
INSERT INTO `roles` (`role_id`, `role_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RL-04792766', 'ADMIN', '2021-12-18 06:56:35', 'developer', NULL, NULL);
INSERT INTO `roles` (`role_id`, `role_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RL-2885772', 'DOKTER', '2021-12-18 06:56:35', 'developer', NULL, NULL);
INSERT INTO `roles` (`role_id`, `role_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RL-774773', 'RESEPSIONIS', '2021-12-18 06:56:35', 'developer', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_role_id` (`user_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`user_id`, `user_role_id`, `user_name`, `user_password`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('ADM-0388348', 'RL-04792766', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-12-18 06:56:35', 'developer', NULL, '');
INSERT INTO `users` (`user_id`, `user_role_id`, `user_name`, `user_password`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('APT-8493667', 'RL-0047893', 'apoteker', '326dd0e9d42a3da01b50028c51cf21fc', '2021-12-18 07:17:08', 'developer', '2021-12-21 09:51:02', 'admin');
INSERT INTO `users` (`user_id`, `user_role_id`, `user_name`, `user_password`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('DOK-212021091058', 'RL-2885772', 'dominic', '850ab44cce67bf2c5457c6dca6181d60', '2021-12-21 09:10:58', 'admin', NULL, NULL);
INSERT INTO `users` (`user_id`, `user_role_id`, `user_name`, `user_password`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('DOK-8562774', 'RL-2885772', 'dokter', 'd22af4180eee4bd95072eb90f94930e5', '2021-12-18 07:17:08', 'developer', NULL, NULL);
INSERT INTO `users` (`user_id`, `user_role_id`, `user_name`, `user_password`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RES-212021091158', 'RL-774773', 'Intan', 'b1098cab9c2db3eb9f576eb66c33449c', '2021-12-21 09:11:58', 'admin', NULL, NULL);
INSERT INTO `users` (`user_id`, `user_role_id`, `user_name`, `user_password`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES ('RES-8479368', 'RL-774773', 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', '2021-12-18 07:17:08', 'developer', NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
