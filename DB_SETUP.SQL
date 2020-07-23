CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `user_org` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `user_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `user_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `user_level` int(3) NOT NULL,
 `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `reset_urls` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `reset_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `registration_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reg_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;