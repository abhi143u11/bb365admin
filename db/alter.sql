ALTER TABLE `categories` ADD `subcat` TINYINT(1) NULL DEFAULT '0' AFTER `cat_type`;

ALTER TABLE `users` ADD `downloads` INT NULL DEFAULT '5' AFTER `package_type`, ADD `todays_downloads` INT NOT NULL DEFAULT '0' AFTER `downloads`;