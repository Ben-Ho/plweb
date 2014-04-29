ALTER TABLE `p_product` ADD `quantity` INT NOT NULL AFTER `price` ;
ALTER TABLE `p_product` ADD `unit` ENUM( 'gram', 'mililiter', 'pieces', 'undefined' ) NOT NULL AFTER `quantity` ;
ALTER TABLE `p_product` CHANGE `unit` `unit` ENUM( 'g', 'ml', 'pieces', 'undefined' ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;

