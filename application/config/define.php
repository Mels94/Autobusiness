<?php

define('UPLOADS', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/uploads/');


define('ASSETS', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/assets/');


define("CREATE_TABLE", "CREATE TABLE IF NOT EXISTS `users`(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
password VARCHAR(100) NOT NULL,
cookie_key VARCHAR(100),
role VARCHAR(100)
)");

define("CATEGORIES_TABLE", "CREATE TABLE IF NOT EXISTS `category`(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
create_time DATETIME,
update_time TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
)");

define("PRODUCT_TABLE", "CREATE TABLE IF NOT EXISTS `product`(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
category_id INT(11),
img_path VARCHAR(255),
isNew TINYINT(1),
date INT (20),
gear_box VARCHAR (255),
motor VARCHAR (255),
run INT(20),
horsepower INT(20),
color VARCHAR (255),
description TEXT,
price INT(20),
count INT(20),
create_time DATETIME,
update_time TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
)");

define("ALTER_PRODUCT", "ALTER TABLE `product`
ADD FOREIGN KEY (category_id) REFERENCES `category`(id) ON DELETE CASCADE ON UPDATE CASCADE");


define("ORDER_TABLE", "CREATE TABLE IF NOT EXISTS `order`(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
phone VARCHAR (255),
message TEXT,
name_card VARCHAR(255),
card_num VARCHAR (255),
product_order JSON,
isNew TINYINT(1),
order_time DATETIME,
shipping_date DATETIME
)");


define("ORDER_DELETE", "CREATE EVENT IF NOT EXISTS `delete_order`
ON SCHEDULE EVERY 50 SECOND
DO
DELETE FROM `order` where `order`.`shipping_date` <= CURRENT_TIMESTAMP;");


define("CONTACT_TABLE", "CREATE TABLE IF NOT EXISTS `contact`(
id INT(11) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
subject VARCHAR(255) NOT NULL,
message TEXT NOT NULL,
isNew TINYINT(1) NOT NULL,
create_time DATETIME
)");