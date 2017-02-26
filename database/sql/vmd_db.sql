/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3307
Source Database       : vmd_db

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-02-26 14:05:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` text NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('25', 'Testing Banner', 'Cuma mau ngetest ajah', 'assets/uploads/images/banners/banner25.jpg', '', '2017-02-11 17:45:49');
INSERT INTO `banner` VALUES ('26', 'Testing Banner', 'Cuma mau ngetest ajah', 'assets/uploads/images/banners/banner26.jpg', '', '2017-02-11 11:40:58');

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` text NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', 'Kick Denim', '', 'assets/img/4.jpg', '', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('2', 'Nevada', '', 'assets/img/4.jpg', '', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('3', 'The Executive', '', 'assets/img/4.jpg', '', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('4', 'Quick Silver', '', 'assets/img/4.jpg', '', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('5', 'Rebook', '', 'assets/img/4.jpg', '', '2016-12-17 20:38:43');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` text NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'T-Shirt', 'Kaos Berkualitas', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('2', 'Baju Denim', 'Denim yang soft dan adem', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('3', 'Celana Denim', 'Trendy dan Simple', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('4', 'Kemeja', 'Formal & non Formal', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('5', 'Topi', 'Gaul Pake Topi', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('6', 'Jaket Kulit', 'Kulit asli 100%', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('7', 'Jaket Hoody', 'Bahan yang soft', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('8', 'Celana Olah Raga', 'Mau lari? pakai celana ini.', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('9', 'Sepatu Formal', 'Gaya berkelas', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('10', 'Sepatu Olahraga', 'Olahraga setiap saat, dimanapun kapanpun.', 'assets/img/8.jpg', '', '2016-12-17 20:37:39');

-- ----------------------------
-- Table structure for configuration
-- ----------------------------
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE `configuration` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of configuration
-- ----------------------------
INSERT INTO `configuration` VALUES ('1', 'app_name', 'VMD');
INSERT INTO `configuration` VALUES ('2', 'footer_instagram', '');
INSERT INTO `configuration` VALUES ('3', 'footer_path', '');
INSERT INTO `configuration` VALUES ('4', 'footer_facebook', '');
INSERT INTO `configuration` VALUES ('5', 'footer_address', '');
INSERT INTO `configuration` VALUES ('6', 'footer_phone', '');
INSERT INTO `configuration` VALUES ('7', 'footer_whatsapp', '');
INSERT INTO `configuration` VALUES ('8', 'footer_bbm', '');
INSERT INTO `configuration` VALUES ('9', 'footer_email', '');
INSERT INTO `configuration` VALUES ('10', 'special_section_name', 'Hot Products');
INSERT INTO `configuration` VALUES ('11', 'username', 'Administrator');
INSERT INTO `configuration` VALUES ('12', 'password', '');
INSERT INTO `configuration` VALUES ('13', 'email_recovery', '');
INSERT INTO `configuration` VALUES ('14', 'max_banner_count', '5');
INSERT INTO `configuration` VALUES ('15', 'category_pria_img_url', '');
INSERT INTO `configuration` VALUES ('16', 'category_wanita_img_url', '');

-- ----------------------------
-- Table structure for display_category
-- ----------------------------
DROP TABLE IF EXISTS `display_category`;
CREATE TABLE `display_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `fk_display_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of display_category
-- ----------------------------
INSERT INTO `display_category` VALUES ('1', '1');
INSERT INTO `display_category` VALUES ('2', '4');
INSERT INTO `display_category` VALUES ('5', '7');
INSERT INTO `display_category` VALUES ('4', '8');
INSERT INTO `display_category` VALUES ('3', '9');

-- ----------------------------
-- Table structure for gender
-- ----------------------------
DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gender
-- ----------------------------
INSERT INTO `gender` VALUES ('1', 'Male');
INSERT INTO `gender` VALUES ('2', 'Female');
INSERT INTO `gender` VALUES ('3', 'Unisex');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `gender_id` int(11) unsigned NOT NULL,
  `price` bigint(18) NOT NULL,
  `description` varchar(255) NOT NULL,
  `brand_id` int(11) unsigned NOT NULL,
  `primary_img_id` int(11) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `is_special_product` bit(1) NOT NULL DEFAULT b'0',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `brand_id_idx` (`brand_id`),
  KEY `category_id_idx` (`category_id`),
  KEY `gender_id_idx` (`gender_id`),
  CONSTRAINT `fk_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'NVDTSH01', 'Daily T-Shirt Brown', '1', '1', '150000', 'Baju soft bahan dingin', '2', '1', '0', '', '', '2016-12-17 21:36:29');
INSERT INTO `product` VALUES ('2', 'NVDTSH02', 'Daily T-Shirt Black', '1', '1', '150000', 'Baju soft bahan dingin', '2', '2', '0', '', '', '2016-12-17 21:38:43');
INSERT INTO `product` VALUES ('3', 'NVDTSH03', 'Daily T-Shirt Red', '1', '1', '150000', 'Baju soft bahan dingin', '2', '3', '0', '', '', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('4', 'NVDJKT01', 'Hoody Retro Jacket Brown', '7', '1', '300000', 'Cool Jacket, Make you more cool', '2', '4', '0', '', '\0', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('5', 'NVDJKT02', 'Hoody Retro Jacket Black', '7', '1', '300000', 'Cool Jacket, Make you more cool', '2', '5', '0', '', '\0', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('6', 'NVDTSH04', 'Sexy Hot Brown', '1', '2', '150000', 'Baju soft bahan dingin', '2', '6', '0', '', '', '2016-12-17 21:36:29');
INSERT INTO `product` VALUES ('7', 'NVDTSH05', 'Sexy Hot Black', '1', '2', '150000', 'Baju soft bahan dingin', '2', '7', '0', '', '', '2016-12-17 21:38:43');
INSERT INTO `product` VALUES ('8', 'NVDTSH06', 'Sexy Hot Red', '1', '2', '150000', 'Baju soft bahan dingin', '2', '8', '0', '', '\0', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('9', 'NVDTSH07', 'Universal Red', '1', '3', '175000', 'Baju soft bahan dingin', '2', '9', '0', '', '', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('10', 'NVDTSH08', 'Universal Blue', '1', '3', '175000', 'Baju soft bahan dingin', '2', '10', '0', '', '\0', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('11', 'NVDJKT03', 'Beauty Dark Brown Parka ', '7', '1', '350000', 'Make you more beauty', '2', '11', '0', '', '\0', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('12', 'NVDJKT04', 'Beauty Dark Red Parka ', '7', '1', '350000', 'Make you more beauty', '2', '12', '0', '', '', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('13', 'QSTSH01', 'Play Together Blue', '1', '3', '200000', 'Keep you free', '4', '13', '0', '', '', '2016-12-17 21:49:28');
INSERT INTO `product` VALUES ('14', 'QSTSH02', 'Play Together Black', '1', '3', '200000', 'Keep you free', '4', '14', '0', '', '\0', '2016-12-17 21:49:28');
INSERT INTO `product` VALUES ('15', 'QSDSH01', 'Soft Trendy Blue Denim', '2', '1', '400000', 'Soft denim, high quality', '4', '15', '0', '', '\0', '2016-12-17 21:52:09');

-- ----------------------------
-- Table structure for product_image
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `img_url` text NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_id_idx` (`product_id`),
  CONSTRAINT `fk_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_image
-- ----------------------------
INSERT INTO `product_image` VALUES ('1', '1', 'assets/img/11.jpg', '', '2016-12-22 15:40:28');
INSERT INTO `product_image` VALUES ('2', '2', 'assets/img/11.jpg', '', '2016-12-22 15:40:29');
INSERT INTO `product_image` VALUES ('3', '3', 'assets/img/11.jpg', '', '2016-12-22 15:40:30');
INSERT INTO `product_image` VALUES ('4', '4', 'assets/img/11.jpg', '', '2016-12-22 15:40:33');
INSERT INTO `product_image` VALUES ('5', '5', 'assets/img/11.jpg', '', '2016-12-22 15:40:34');
INSERT INTO `product_image` VALUES ('6', '6', 'assets/img/11.jpg', '', '2016-12-22 15:40:35');
INSERT INTO `product_image` VALUES ('7', '7', 'assets/img/11.jpg', '', '2016-12-22 15:40:36');
INSERT INTO `product_image` VALUES ('8', '8', 'assets/img/11.jpg', '', '2016-12-22 15:40:36');
INSERT INTO `product_image` VALUES ('9', '9', 'assets/img/11.jpg', '', '2016-12-22 15:40:37');
INSERT INTO `product_image` VALUES ('10', '10', 'assets/img/11.jpg', '', '2016-12-22 15:40:39');
INSERT INTO `product_image` VALUES ('11', '11', 'assets/img/11.jpg', '', '2016-12-22 15:40:40');
INSERT INTO `product_image` VALUES ('12', '12', 'assets/img/11.jpg', '', '2016-12-22 15:40:41');
INSERT INTO `product_image` VALUES ('13', '13', 'assets/img/11.jpg', '', '2016-12-22 15:40:42');
INSERT INTO `product_image` VALUES ('14', '14', 'assets/img/11.jpg', '', '2016-12-22 15:40:44');
INSERT INTO `product_image` VALUES ('15', '15', 'assets/img/11.jpg', '', '2016-12-22 15:40:53');
INSERT INTO `product_image` VALUES ('16', '1', 'assets/img/8.jpg', '', '2016-12-22 15:41:24');
INSERT INTO `product_image` VALUES ('17', '3', 'assets/img/8.jpg', '', '2016-12-22 15:41:25');
INSERT INTO `product_image` VALUES ('18', '5', 'assets/img/8.jpg', '', '2016-12-22 15:41:26');
INSERT INTO `product_image` VALUES ('19', '7', 'assets/img/8.jpg', '', '2016-12-22 15:41:26');
INSERT INTO `product_image` VALUES ('20', '8', 'assets/img/8.jpg', '', '2016-12-22 15:41:27');
INSERT INTO `product_image` VALUES ('21', '10', 'assets/img/8.jpg', '', '2016-12-22 15:41:29');

-- ----------------------------
-- Table structure for product_size
-- ----------------------------
DROP TABLE IF EXISTS `product_size`;
CREATE TABLE `product_size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `size_id` int(11) unsigned NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `size_id_idx` (`size_id`),
  CONSTRAINT `fk_product_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  CONSTRAINT `fk_size_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_size
-- ----------------------------
INSERT INTO `product_size` VALUES ('2', '1', '1', '', '2016-12-22 15:42:28');
INSERT INTO `product_size` VALUES ('3', '1', '2', '', '2016-12-22 15:42:34');
INSERT INTO `product_size` VALUES ('4', '1', '3', '', '2016-12-22 15:42:38');
INSERT INTO `product_size` VALUES ('5', '1', '4', '', '2016-12-22 15:42:46');
INSERT INTO `product_size` VALUES ('6', '2', '1', '', '2016-12-22 15:43:02');
INSERT INTO `product_size` VALUES ('7', '2', '2', '', '2016-12-22 15:43:02');
INSERT INTO `product_size` VALUES ('8', '2', '3', '', '2016-12-22 15:43:02');
INSERT INTO `product_size` VALUES ('9', '2', '4', '', '2016-12-22 15:43:02');
INSERT INTO `product_size` VALUES ('10', '3', '1', '', '2016-12-22 15:43:07');
INSERT INTO `product_size` VALUES ('11', '3', '2', '', '2016-12-22 15:43:07');
INSERT INTO `product_size` VALUES ('12', '3', '3', '', '2016-12-22 15:43:07');
INSERT INTO `product_size` VALUES ('13', '3', '4', '', '2016-12-22 15:43:07');
INSERT INTO `product_size` VALUES ('14', '4', '1', '', '2016-12-22 15:43:12');
INSERT INTO `product_size` VALUES ('15', '4', '2', '', '2016-12-22 15:43:12');
INSERT INTO `product_size` VALUES ('16', '4', '3', '', '2016-12-22 15:43:12');
INSERT INTO `product_size` VALUES ('17', '4', '4', '', '2016-12-22 15:43:12');
INSERT INTO `product_size` VALUES ('18', '5', '1', '', '2016-12-22 15:43:17');
INSERT INTO `product_size` VALUES ('19', '5', '2', '', '2016-12-22 15:43:17');
INSERT INTO `product_size` VALUES ('20', '5', '3', '', '2016-12-22 15:43:17');
INSERT INTO `product_size` VALUES ('21', '5', '4', '', '2016-12-22 15:43:17');
INSERT INTO `product_size` VALUES ('22', '6', '1', '', '2016-12-22 15:43:21');
INSERT INTO `product_size` VALUES ('23', '6', '2', '', '2016-12-22 15:43:21');
INSERT INTO `product_size` VALUES ('24', '6', '3', '', '2016-12-22 15:43:21');
INSERT INTO `product_size` VALUES ('25', '6', '4', '', '2016-12-22 15:43:21');
INSERT INTO `product_size` VALUES ('26', '7', '1', '', '2016-12-22 15:43:25');
INSERT INTO `product_size` VALUES ('27', '7', '2', '', '2016-12-22 15:43:25');
INSERT INTO `product_size` VALUES ('28', '7', '3', '', '2016-12-22 15:43:25');
INSERT INTO `product_size` VALUES ('29', '7', '4', '', '2016-12-22 15:43:25');
INSERT INTO `product_size` VALUES ('30', '8', '1', '', '2016-12-22 15:43:29');
INSERT INTO `product_size` VALUES ('31', '8', '2', '', '2016-12-22 15:43:29');
INSERT INTO `product_size` VALUES ('32', '8', '3', '', '2016-12-22 15:43:30');
INSERT INTO `product_size` VALUES ('33', '8', '4', '', '2016-12-22 15:43:30');
INSERT INTO `product_size` VALUES ('34', '9', '1', '', '2016-12-22 15:43:34');
INSERT INTO `product_size` VALUES ('35', '9', '2', '', '2016-12-22 15:43:34');
INSERT INTO `product_size` VALUES ('36', '9', '3', '', '2016-12-22 15:43:34');
INSERT INTO `product_size` VALUES ('37', '9', '4', '', '2016-12-22 15:43:34');
INSERT INTO `product_size` VALUES ('38', '10', '1', '', '2016-12-22 15:43:46');
INSERT INTO `product_size` VALUES ('39', '10', '2', '', '2016-12-22 15:43:46');
INSERT INTO `product_size` VALUES ('40', '10', '3', '', '2016-12-22 15:43:46');
INSERT INTO `product_size` VALUES ('41', '10', '4', '', '2016-12-22 15:43:46');
INSERT INTO `product_size` VALUES ('42', '11', '4', '', '2016-12-22 15:43:50');
INSERT INTO `product_size` VALUES ('43', '11', '1', '', '2016-12-22 15:43:51');
INSERT INTO `product_size` VALUES ('44', '11', '2', '', '2016-12-22 15:43:51');
INSERT INTO `product_size` VALUES ('45', '11', '3', '', '2016-12-22 15:43:51');
INSERT INTO `product_size` VALUES ('46', '12', '1', '', '2016-12-22 15:44:12');
INSERT INTO `product_size` VALUES ('47', '12', '2', '', '2016-12-22 15:44:12');
INSERT INTO `product_size` VALUES ('48', '12', '3', '', '2016-12-22 15:44:12');
INSERT INTO `product_size` VALUES ('49', '12', '4', '', '2016-12-22 15:44:12');
INSERT INTO `product_size` VALUES ('50', '13', '1', '', '2016-12-22 15:44:18');
INSERT INTO `product_size` VALUES ('51', '13', '2', '', '2016-12-22 15:44:19');
INSERT INTO `product_size` VALUES ('52', '13', '3', '', '2016-12-22 15:44:19');
INSERT INTO `product_size` VALUES ('53', '13', '4', '', '2016-12-22 15:44:19');
INSERT INTO `product_size` VALUES ('54', '14', '1', '', '2016-12-22 15:44:23');
INSERT INTO `product_size` VALUES ('55', '14', '2', '', '2016-12-22 15:44:23');
INSERT INTO `product_size` VALUES ('56', '14', '3', '', '2016-12-22 15:44:23');
INSERT INTO `product_size` VALUES ('57', '14', '4', '', '2016-12-22 15:44:23');
INSERT INTO `product_size` VALUES ('58', '15', '1', '', '2016-12-22 15:44:27');
INSERT INTO `product_size` VALUES ('59', '15', '2', '', '2016-12-22 15:44:27');
INSERT INTO `product_size` VALUES ('60', '15', '3', '', '2016-12-22 15:44:27');
INSERT INTO `product_size` VALUES ('61', '15', '4', '', '2016-12-22 15:44:27');

-- ----------------------------
-- Table structure for product_store
-- ----------------------------
DROP TABLE IF EXISTS `product_store`;
CREATE TABLE `product_store` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `store_id` int(11) unsigned NOT NULL,
  `url` text NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `store_id_idx` (`store_id`),
  CONSTRAINT `fk_product_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`),
  CONSTRAINT `fk_store_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_store
-- ----------------------------
INSERT INTO `product_store` VALUES ('1', '1', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('2', '2', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('3', '3', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('4', '4', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('5', '5', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('6', '6', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('7', '7', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('8', '8', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('9', '9', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('10', '10', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('11', '11', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('12', '12', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('13', '1', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('14', '13', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('15', '14', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('16', '15', '1', 'http://www.tokopedia.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('17', '2', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('18', '3', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('19', '4', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('20', '5', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('21', '6', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('22', '7', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('23', '8', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('24', '9', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('25', '10', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('26', '11', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('27', '12', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('28', '13', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('29', '14', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('30', '15', '2', 'http://www.bukalapak.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('31', '2', '3', 'http://www.blibli.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('32', '4', '3', 'http://www.blibli.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('33', '6', '3', 'http://www.blibli.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('34', '8', '3', 'http://www.blibli.com/', '', '2016-12-22 15:45:09');
INSERT INTO `product_store` VALUES ('35', '10', '3', 'http://www.blibli.com/', '', '2016-12-22 15:45:09');

-- ----------------------------
-- Table structure for size
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES ('1', 'S', '');
INSERT INTO `size` VALUES ('2', 'M', '');
INSERT INTO `size` VALUES ('3', 'L', '');
INSERT INTO `size` VALUES ('4', 'XL', '');
INSERT INTO `size` VALUES ('5', 'XXL', '');

-- ----------------------------
-- Table structure for store
-- ----------------------------
DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon_url` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES ('1', 'Tokopedia', '', '');
INSERT INTO `store` VALUES ('2', 'Bukalapak', '', '');
INSERT INTO `store` VALUES ('3', 'Blibli', '', '');

-- ----------------------------
-- View structure for view_active_product
-- ----------------------------
DROP VIEW IF EXISTS `view_active_product`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_active_product` AS SELECT
	category.`name` AS category_name,
	brand.`name` AS brand_name,
	gender.`name` AS gender_name,
	product.*
FROM category
LEFT JOIN product ON product.category_id = category.id
LEFT JOIN product_size ON product_size.product_id = product.id
LEFT JOIN product_image ON product_image.product_id = product.id
LEFT JOIN product_store ON product_store.product_id = product.id
LEFT JOIN brand ON brand.id = product.brand_id
LEFT JOIN gender ON gender.id = product.gender_id
WHERE
	category.show_flag = 1
	AND
	product.show_flag = 1
	AND
	product_size.show_flag = 1
	AND
	product_image.show_flag = 1
	AND
	product_store.show_flag = 1
	AND
	brand.show_flag = 1
GROUP BY
	product.id ;
SET FOREIGN_KEY_CHECKS=1;
