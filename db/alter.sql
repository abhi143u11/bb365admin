ALTER TABLE `categories` ADD `subcat` TINYINT(1) NULL DEFAULT '0' AFTER `cat_type`;

ALTER TABLE `users` ADD `downloads` INT NULL DEFAULT '5' AFTER `package_type`, ADD `todays_downloads` INT NOT NULL DEFAULT '0' AFTER `downloads`;


//28-05-2021
ALTER TABLE `images` ADD `video` TEXT NULL DEFAULT NULL AFTER `image`;
ALTER TABLE `users` ADD `unlimited` TINYINT NOT NULL DEFAULT '0' AFTER `city`;


//07-06-2021
ALTER TABLE `notification_message` CHANGE `customer_id` `sub_cat_id` INT(11) NULL DEFAULT NULL;

//11-06-2021
ALTER TABLE `users` ADD `beepixl` TINYINT(1) NOT NULL DEFAULT '0' AFTER `email`;
ALTER TABLE `custom_images` ADD `psd` TEXT NULL DEFAULT NULL AFTER `image`;
ALTER TABLE `custom_images` ADD `category` VARCHAR(200) NULL DEFAULT NULL AFTER `psd`;

//19-07-2021
ALTER TABLE `users` ADD `trial` TINYINT NOT NULL DEFAULT '0' AFTER `device_token`;

//26-07-2021
ALTER TABLE `coupons` ADD `minimum_price` INT NULL DEFAULT NULL AFTER `customer_id`;


//13-12-2021
ALTER TABLE `users` ADD `referral_code` VARCHAR(20) NULL DEFAULT NULL AFTER `device_token`;
ALTER TABLE `users` ADD `referred_by` VARCHAR(6) NULL DEFAULT NULL AFTER `referral_code`;
ALTER TABLE `users` ADD UNIQUE(`referral_code`);
