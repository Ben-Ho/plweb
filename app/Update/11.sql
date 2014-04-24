CREATE TABLE IF NOT EXISTS `p_product_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`,`tag_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `p_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE `p_product_to_tag`
  ADD CONSTRAINT `p_product_to_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `p_tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_product_to_tag_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `p_product` (`id`) ON DELETE CASCADE;

