CREATE TABLE `directions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quatity` smallint(2) NOT NULL,
  `price` smallint(2) NOT NULL,
  `discount` smallint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
