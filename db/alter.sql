ALTER TABLE `categories` ADD `subcat` TINYINT(1) NULL DEFAULT '0' AFTER `cat_type`;

ALTER TABLE `users` ADD `downloads` INT NULL DEFAULT '5' AFTER `package_type`, ADD `todays_downloads` INT NOT NULL DEFAULT '0' AFTER `downloads`;


//28-05-2021
ALTER TABLE `images` ADD `video` TEXT NULL DEFAULT NULL AFTER `image`;
ALTER TABLE `users` ADD `unlimited` TINYINT NOT NULL DEFAULT '0' AFTER `city`;


