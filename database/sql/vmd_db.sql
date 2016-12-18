/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3307
Source Database       : vmd_db

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-12-18 12:05:42
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
  `img_url` varchar(255) NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', 'Kick Denim', '', '', '\0', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('2', 'Nevada', '', '', '\0', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('3', 'The Executive', '', '', '\0', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('4', 'Quick Silver', '', '', '\0', '2016-12-17 20:38:43');
INSERT INTO `brand` VALUES ('5', 'Rebook', '', '', '\0', '2016-12-17 20:38:43');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'T-Shirt', 'Kaos Berkualitas', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('2', 'Baju Denim', 'Denim yang soft dan adem', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('3', 'Celana Denim', 'Trendy dan Simple', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('4', 'Kemeja', 'Formal & non Formal', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('5', 'Topi', 'Gaul Pake Topi', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('6', 'Jaket Kulit', 'Kulit asli 100%', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('7', 'Jaket Hoody', 'Bahan yang soft', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('8', 'Celana Olah Raga', 'Mau lari? pakai celana ini.', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('9', 'Sepatu Formal', 'Gaya berkelas', '', '', '2016-12-17 20:37:39');
INSERT INTO `category` VALUES ('10', 'Sepatu Olahraga', 'Olahraga setiap saat, dimanapun kapanpun.', '', '', '2016-12-17 20:37:39');

-- ----------------------------
-- Table structure for configuration
-- ----------------------------
DROP TABLE IF EXISTS `configuration`;
CREATE TABLE `configuration` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
  `view_count` int(11) NOT NULL DEFAULT '0',
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
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
INSERT INTO `product` VALUES ('1', 'NVDTSH01', 'Daily T-Shirt Brown', '1', '1', '150000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:36:29');
INSERT INTO `product` VALUES ('2', 'NVDTSH02', 'Daily T-Shirt Black', '1', '1', '150000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:38:43');
INSERT INTO `product` VALUES ('3', 'NVDTSH03', 'Daily T-Shirt Red', '1', '1', '150000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('4', 'NVDJKT01', 'Hoody Retro Jacket Brown', '7', '1', '300000', 'Cool Jacket, Make you more cool', '2', '0', '', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('5', 'NVDJKT02', 'Hoody Retro Jacket Black', '7', '1', '300000', 'Cool Jacket, Make you more cool', '2', '0', '', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('6', 'NVDTSH04', 'Sexy Hot Brown', '1', '2', '150000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:36:29');
INSERT INTO `product` VALUES ('7', 'NVDTSH05', 'Sexy Hot Black', '1', '2', '150000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:38:43');
INSERT INTO `product` VALUES ('8', 'NVDTSH06', 'Sexy Hot Red', '1', '2', '150000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('9', 'NVDTSH07', 'Universal Red', '1', '3', '175000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('10', 'NVDTSH08', 'Universal Blue', '1', '3', '175000', 'Baju soft bahan dingin', '2', '0', '', '2016-12-17 21:39:51');
INSERT INTO `product` VALUES ('11', 'NVDJKT03', 'Beauty Dark Brown Parka ', '7', '1', '350000', 'Make you more beauty', '2', '0', '', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('12', 'NVDJKT04', 'Beauty Dark Red Parka ', '7', '1', '350000', 'Make you more beauty', '2', '0', '', '2016-12-17 21:43:31');
INSERT INTO `product` VALUES ('13', 'QSTSH01', 'Play Together Blue', '1', '3', '200000', 'Keep you free', '4', '0', '', '2016-12-17 21:49:28');
INSERT INTO `product` VALUES ('14', 'QSTSH02', 'Play Together Black', '1', '3', '200000', 'Keep you free', '4', '0', '', '2016-12-17 21:49:28');
INSERT INTO `product` VALUES ('15', 'QSDSH01', 'Soft Trendy Blue Denim', '2', '1', '400000', 'Soft denim, high quality', '4', '0', '', '2016-12-17 21:52:09');

-- ----------------------------
-- Table structure for product_image
-- ----------------------------
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE `product_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_id_idx` (`product_id`),
  CONSTRAINT `fk_image_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_image
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_size
-- ----------------------------

-- ----------------------------
-- Table structure for product_store
-- ----------------------------
DROP TABLE IF EXISTS `product_store`;
CREATE TABLE `product_store` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `store_id` int(11) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `show_flag` bit(1) NOT NULL DEFAULT b'1',
  `input_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `store_id_idx` (`store_id`),
  CONSTRAINT `fk_product_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`),
  CONSTRAINT `fk_store_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_store
-- ----------------------------

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
  `icon_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES ('1', 'Tokopedia', '', '');
INSERT INTO `store` VALUES ('2', 'Bukalapak', '', '');
INSERT INTO `store` VALUES ('3', 'Blibli', '', '');
