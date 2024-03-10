/*
 Navicat Premium Data Transfer

 Source Server         : laragon
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : laravel

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 10/03/2024 12:53:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES (1, 'BCA', '2024-01-07 07:24:53', '2024-01-07 07:24:53');
INSERT INTO `bank` VALUES (2, 'Mandiri', '2024-01-07 07:24:58', '2024-01-07 07:24:58');
INSERT INTO `bank` VALUES (3, 'BRI', '2024-01-07 07:25:01', '2024-01-07 07:25:01');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Gym', '2024-01-07 07:25:15', '2024-01-07 07:25:15');
INSERT INTO `category` VALUES (2, 'Cardio', '2024-01-07 07:25:20', '2024-01-07 07:25:20');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `job_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `join_date` date NOT NULL,
  `status` int NOT NULL,
  `npwp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_bank` int NULL DEFAULT NULL,
  `account_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES (1, '1', 'Super Admin', NULL, NULL, NULL, NULL, NULL, '1970-01-01', 1, NULL, NULL, NULL, NULL, 'admin@superuser.id', NULL, NULL, NULL);
INSERT INTO `employee` VALUES (2, '0000001', 'Arif', '2024-01-07', '1', '1', 'Mr', 'Bekasi', '2024-01-08', 1, '8762131677032', NULL, '8787234', '082169266870', 'cacas@mail.com', 'homebase web-01.png', '2024-01-07 07:24:01', '2024-01-07 07:24:01');
INSERT INTO `employee` VALUES (3, '0000001', 'Siska', '2024-01-07', '2', '1', 'Dev', 'Bekasi', '2024-01-07', 1, '726483274', 1, '423542523', '24234324324', 'anwar@gmail.com', 'honda-cbr-1000rr-r-fireblade-sp-2023.jpg', '2024-01-07 07:54:13', '2024-01-07 07:54:13');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for groupins
-- ----------------------------
DROP TABLE IF EXISTS `groupins`;
CREATE TABLE `groupins`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groupins
-- ----------------------------
INSERT INTO `groupins` VALUES (1, 'PT', '2024-01-07 08:01:02', '2024-01-07 08:01:02');
INSERT INTO `groupins` VALUES (2, 'Fitness', '2024-01-07 08:01:13', '2024-01-07 08:01:13');

-- ----------------------------
-- Table structure for instruktur
-- ----------------------------
DROP TABLE IF EXISTS `instruktur`;
CREATE TABLE `instruktur`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `instructur_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructur_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NULL DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `join_date` date NOT NULL,
  `npwp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_bank` int NULL DEFAULT NULL,
  `account_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_group` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of instruktur
-- ----------------------------
INSERT INTO `instruktur` VALUES (1, '0000001', 'John Cena', '2024-01-07', '1', '1', 'Bekasi', '2023-12-31', '2343451235434234234', NULL, '234234234', '0812-9047-1735', 'caca@mail.com', 'honda-cbr-1000rr-r-fireblade-sp-2023.jpg', NULL, '2024-01-07 07:59:40', '2024-01-07 07:59:40');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `pob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `emer_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `referal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES (1, '51152', '1', 'Okki Setyawan', 'Okki Setyawan', '2019-07-08', 'Jakarta', '0218274232', '1', 'okkisetyawan@gmail.com', 'Bintara IX', '02172348343', '02187734232', 'homebase web-01.png', '2024-01-07 07:22:26', '2024-01-07 07:22:26');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_04_08_154711_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (7, '2023_04_09_092843_create_products_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_04_16_220628_create_member_models_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_04_21_083514_create_instruktur_models_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_04_21_083544_create_employee_models_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_04_21_155956_create_bank_models_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_04_21_160035_create_uom_models_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_04_24_070746_create_groupins_models_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_04_25_230950_create_pengguna_models_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_05_02_035412_create_service_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_05_07_150752_create_table_t_pos', 1);
INSERT INTO `migrations` VALUES (17, '2023_05_07_150822_create_table_t_post_detail', 1);
INSERT INTO `migrations` VALUES (18, '2023_05_13_032259_create_p_o_s_models_table', 1);
INSERT INTO `migrations` VALUES (19, '2023_05_16_002657_create_category_models_table', 1);
INSERT INTO `migrations` VALUES (20, '2023_05_16_002742_create_payment_type_models_table', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payment_type
-- ----------------------------
DROP TABLE IF EXISTS `payment_type`;
CREATE TABLE `payment_type`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment_type
-- ----------------------------
INSERT INTO `payment_type` VALUES (1, 'Cash', '2024-01-07 07:57:54', '2024-01-07 07:57:54');
INSERT INTO `payment_type` VALUES (2, 'TOP', '2024-01-07 07:58:00', '2024-01-07 07:58:00');
INSERT INTO `payment_type` VALUES (3, 'Debit', '2024-01-07 07:58:04', '2024-01-07 07:58:04');
INSERT INTO `payment_type` VALUES (4, 'CC', '2024-01-07 07:58:07', '2024-01-07 07:58:07');

-- ----------------------------
-- Table structure for pengguna_models
-- ----------------------------
DROP TABLE IF EXISTS `pengguna_models`;
CREATE TABLE `pengguna_models`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna_models
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_group` int NOT NULL,
  `category` int NOT NULL,
  `kategori` int NOT NULL,
  `qty` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_revenue` int NOT NULL,
  `agreement_type` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES (1, '0000001', 'Bulanan Exercise', 'OK', 1, 1, 1, 1, '100000', '30', 1, 1, '2024-01-07 08:04:44', '2024-01-07 08:04:44');
INSERT INTO `service` VALUES (2, '0000002', 'PT Bulanan', 'OK', 1, 1, 2, 1, '400000', '30', 1, 1, '2024-01-07 08:05:10', '2024-01-07 08:05:10');

-- ----------------------------
-- Table structure for t_pos
-- ----------------------------
DROP TABLE IF EXISTS `t_pos`;
CREATE TABLE `t_pos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_trans` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_member` int NULL DEFAULT NULL,
  `id_member_referal` int NULL DEFAULT NULL,
  `id_marketing_referal` int NULL DEFAULT NULL,
  `visit_type` int NULL DEFAULT NULL,
  `date_trans` date NULL DEFAULT NULL,
  `diskon` int NULL DEFAULT NULL,
  `id_payment` int NULL DEFAULT NULL,
  `id_cc` int NULL DEFAULT NULL,
  `id_debit` int NULL DEFAULT NULL,
  `basicprice` int NULL DEFAULT NULL,
  `total_payment` int NULL DEFAULT NULL,
  `payment` int NULL DEFAULT NULL,
  `change_payment` int NULL DEFAULT NULL,
  `cc_charge` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pos
-- ----------------------------
INSERT INTO `t_pos` VALUES (1, 'FP0000001', 51152, 1, 2, 1, '2024-02-12', 10000, 1, 0, 0, 490000, 490000, 1000000, 510000, NULL, '2024-02-12 03:09:05', '2024-02-12 03:09:05');
INSERT INTO `t_pos` VALUES (2, 'FP0000002', 51152, 1, 2, 1, '2024-03-02', 10000, 3, 1, 2, 990000, 1049400, 1049400, 0, 59400, '2024-03-02 03:40:44', '2024-03-02 03:40:44');
INSERT INTO `t_pos` VALUES (3, 'FP0000003', 51152, 1, 2, 2, '2024-03-02', 100000, 2, 0, 0, 900000, 900000, 900000, 0, NULL, '2024-03-02 13:12:29', '2024-03-02 13:12:29');
INSERT INTO `t_pos` VALUES (4, 'FP0000004', 51152, 1, 3, 2, '2024-03-03', 100000, 2, 0, 1, 400000, 400000, 400000, 0, NULL, '2024-03-03 00:33:31', '2024-03-03 00:33:31');
INSERT INTO `t_pos` VALUES (5, 'FP0000005', NULL, 1, 2, 1, '2024-03-03', 0, 2, 0, 0, 500000, 500000, 500000, 0, NULL, '2024-03-03 00:39:29', '2024-03-03 00:39:29');
INSERT INTO `t_pos` VALUES (6, 'FP0000006', 51152, 1, 2, 2, '2024-03-03', 100000, 1, 0, 0, 400000, 400000, 400000, 0, NULL, '2024-03-03 00:49:26', '2024-03-03 00:49:26');
INSERT INTO `t_pos` VALUES (7, 'FP0000006', 51152, 1, 2, 2, '2024-03-03', 100000, 1, 0, 0, 400000, 400000, 400000, 0, NULL, '2024-03-03 00:50:07', '2024-03-03 00:50:07');
INSERT INTO `t_pos` VALUES (8, 'FP0000006', 51152, 1, 2, 2, '2024-03-03', 100000, 1, 0, 0, 400000, 400000, 400000, 0, NULL, '2024-03-03 00:50:44', '2024-03-03 00:50:44');
INSERT INTO `t_pos` VALUES (9, 'FP0000007', 51152, 1, 2, 1, '2024-03-03', 10000, 2, 0, 1, 490000, 490000, 490000, 0, NULL, '2024-03-03 14:57:53', '2024-03-03 14:57:53');
INSERT INTO `t_pos` VALUES (10, 'FP0000008', 51152, 1, 2, 1, '2024-03-05', 100000, 1, 0, 0, 400000, 400000, 400000, 0, NULL, '2024-03-05 09:18:15', '2024-03-05 09:18:15');
INSERT INTO `t_pos` VALUES (11, 'FP0000009', 51152, 1, 2, 1, '2024-03-08', 10000, 1, 0, 0, 490000, 490000, 500000, 10000, NULL, '2024-03-08 03:16:26', '2024-03-08 03:16:26');
INSERT INTO `t_pos` VALUES (12, 'FP0000010', 51152, 1, 2, 2, '2024-03-08', 10000, 1, 0, 0, 490000, 500000, 500000, NULL, NULL, '2024-03-08 03:50:38', '2024-03-08 03:50:38');
INSERT INTO `t_pos` VALUES (13, 'FP0000011', 51152, 1, 3, 2, '2024-03-08', 100000, 3, 3, 0, 400000, 424000, 424000, 0, 24000, '2024-03-08 13:05:07', '2024-03-08 13:05:07');
INSERT INTO `t_pos` VALUES (14, 'FP0000012', 51152, 1, 2, 1, '2024-03-10', 100000, 2, 0, 1, 500000, 500000, 500000, 0, NULL, '2024-03-10 05:03:41', '2024-03-10 05:03:41');
INSERT INTO `t_pos` VALUES (15, 'FP0000013', 51152, 1, 2, 1, '2024-03-10', 100000, 1, 0, 1, 400000, 400000, 400000, 0, NULL, '2024-03-10 05:25:14', '2024-03-10 05:25:14');
INSERT INTO `t_pos` VALUES (16, 'FP0000013', 51152, 1, 2, 1, '2024-03-10', 100000, 1, 0, 1, 400000, 400000, 400000, 0, NULL, '2024-03-10 05:27:07', '2024-03-10 05:27:07');
INSERT INTO `t_pos` VALUES (17, 'FP0000013', 51152, 1, 2, 1, '2024-03-10', 100000, 1, 0, 1, 400000, 400000, 400000, 0, NULL, '2024-03-10 05:31:13', '2024-03-10 05:31:13');
INSERT INTO `t_pos` VALUES (18, 'FP0000014', 51152, 1, 2, 1, '2024-03-10', 100000, 1, 0, 1, 400000, 500000, 400000, NULL, NULL, '2024-03-10 05:33:07', '2024-03-10 05:33:07');

-- ----------------------------
-- Table structure for t_pos_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pos_detail`;
CREATE TABLE `t_pos_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_trans` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_service` int NULL DEFAULT NULL,
  `price` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pos_detail
-- ----------------------------

-- ----------------------------
-- Table structure for uom
-- ----------------------------
DROP TABLE IF EXISTS `uom`;
CREATE TABLE `uom`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uom
-- ----------------------------
INSERT INTO `uom` VALUES (1, 'CM', '2024-01-07 07:57:42', '2024-01-07 07:57:42');
INSERT INTO `uom` VALUES (2, 'Kg', '2024-01-07 07:57:47', '2024-01-07 07:57:47');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_employee` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 1, 'admin@superuser.id', NULL, '$2y$10$8aGLJy0orI4YEMpjbkqK0uzzfG6UJzkrhz01gMa5VDt8bR1fxNuhq', '$2y$10$mRDjUcNb4IzO7zv8mLkNxuHX0vU/uBkcM4wkAyU8QRP28zH7ikLyu', '2020-06-23 11:29:31', '2020-06-23 11:29:31');
INSERT INTO `users` VALUES (2, 'Arif', 2, 'cacas@mail.com', NULL, '$2y$10$T11.TGvOADBBvNs3WNqSb.w2CoO54l/U4CjRLRvET6QN34NTyjdje', NULL, '2024-01-07 07:24:01', '2024-01-07 07:24:01');
INSERT INTO `users` VALUES (3, 'Siska', 3, 'anwar@gmail.com', NULL, '$2y$10$3ON1GtoVyaZV7Y29IQSjUOIzWKHdwuO.I2fylDVmR8UuMYy5amfdm', NULL, '2024-01-07 07:54:14', '2024-01-07 07:54:14');

SET FOREIGN_KEY_CHECKS = 1;
