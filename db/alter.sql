ALTER TABLE `users` CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `customers_address` CHANGE `house_no` `house_no` VARCHAR(20) NULL DEFAULT NULL;
ALTER TABLE `transaction` ADD `order_id` VARCHAR(20) NULL AFTER `user_type`;


//16-01-2021
ALTER TABLE `users` CHANGE `email` `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `products` ADD `description` TEXT NULL AFTER `size`, ADD `sub_title` VARCHAR(200) NULL AFTER `description`, ADD `gross_wt` VARCHAR(50) NULL AFTER `sub_title`, ADD `net_wt` VARCHAR(50) NULL AFTER `gross_wt`, ADD `serves` VARCHAR(50) NULL AFTER `net_wt`;
ALTER TABLE `recipes` CHANGE `sub_title` `sub_title` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `products` DROP `serves`;
ALTER TABLE `video` CHANGE `link` `link` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `video` CHANGE `title` `title` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `link` `link` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `blog` CHANGE `description` `description` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `recipes` CHANGE `description` `description` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `preparation_method` `preparation_method` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `recipe_ingredients` CHANGE `item` `item` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `weight` `weight` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `products` CHANGE `description` `description` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `sub_title` `sub_title` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

//22-01-2021
ALTER TABLE `bill` ADD `email_sent` TINYINT NOT NULL DEFAULT '0' AFTER `notes`, ADD `notification_sent` TINYINT NOT NULL DEFAULT '0' AFTER `email_sent`;
ALTER TABLE `users` ADD `device_token` TEXT NULL DEFAULT NULL AFTER `remember_token`;

//23-01-2021
ALTER TABLE `products` ADD `available` TINYINT NOT NULL DEFAULT '1' AFTER `featured`, ADD `original_price` BIGINT(20) NULL DEFAULT NULL AFTER `available`, ADD `limited_stock` TINYINT NOT NULL DEFAULT '0' AFTER `original_price`;


//29-01-2021
ALTER TABLE `coupons` ADD `customer_id` INT(11) NULL AFTER `max_discount`;


//03-02-2021
ALTER TABLE `customers_address` CHANGE `house_no` `house_no` VARCHAR(250) NULL DEFAULT NULL;
ALTER TABLE `transaction` ADD `bill_id` INT(11) NULL DEFAULT NULL AFTER `user_id`;
ALTER TABLE `products` CHANGE `mrp` `mrp` FLOAT(10,2) NULL DEFAULT NULL, CHANGE `original_price` `original_price` FLOAT(10,2) NULL DEFAULT NULL;
ALTER TABLE `coupons` DROP `coupon_name`, DROP `coupon_expiry`, DROP `minimum_price`, DROP `coupon_products`, DROP `coupon_categories`, DROP `coupon_published`, DROP `coupon_images`;

//04-02-2021
ALTER TABLE `bill` ADD `house_no` VARCHAR(100) NULL DEFAULT NULL AFTER `state`, ADD `landmark` VARCHAR(100) NULL DEFAULT NULL AFTER `house_no`, ADD `address_type` VARCHAR(100) NULL DEFAULT NULL AFTER `landmark`;


//16-04-2021
ALTER TABLE `recipes` CHANGE `sub_title` `sub_title` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `products` ADD `hsn_code` VARCHAR(15) NULL DEFAULT NULL AFTER `limited_stock`;
ALTER TABLE `bill_products` ADD `hsn_code` VARCHAR(15) NULL DEFAULT NULL AFTER `sub_total`