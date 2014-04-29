ALTER TABLE `p_product` ADD `create_time` DATETIME NOT NULL ;

CREATE TABLE IF NOT EXISTS `p_product_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `create_time` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` enum('g','ml','pieces','undefined') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE `p_product_history`
  ADD CONSTRAINT `p_product_history_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `p_product` (`id`) ON DELETE CASCADE;

