<?php
session_start();
$_SESSION['database'] = "on";
$link = mysqli_connect("localhost", "root", "root", "", "8080");
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL : " . mysqli_connect_error();
mysqli_query($link, "CREATE DATABASE IF NOT EXISTS db_rush;");
mysqli_query($link, "use db_rush");
mysqli_query($link, "CREATE TABLE IF NOT EXISTS users
(
	id_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	login VARCHAR(32) NOT NULL,
	email VARCHAR(64) NOT NULL,
	password VARCHAR(128) NOT NULL,
	secret_answer VARCHAR(64) NOT NULL,
	admin ENUM('yes','no') DEFAULT 'no' NOT NULL
);");
mysqli_query($link, "CREATE TABLE IF NOT EXISTS cart
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_cookie VARCHAR(64) NOT NULL,
	login VARCHAR(32),
	id_product INT NOT NULL,
	product_price DECIMAL(10, 2) NOT NULL,
	quantity INT DEFAULT 0,
	sub_total DECIMAL(10, 2),
	order_confirmed ENUM('yes', 'no') DEFAULT 'no' NOT NULL,
	order_date DATETIME
);");
mysqli_query($link, "CREATE TABLE IF NOT EXISTS products
(
	id_product INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	title VARCHAR(64) NOT NULL,
	img_url VARCHAR(512) NOT NULL,
	price DECIMAL(10, 2) NOT NULL,
	inventory INT,
	category VARCHAR(128) NOT NULL,
	sub_category VARCHAR(128)
);");
if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM products")) == 0)
{
	mysqli_query($link, "INSERT INTO products
	VALUES(null, 'tropcherpourtoi', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf1.png', '85.95', 'men', 'scarf'),
(null, 'pourlesradasses', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf2.png', '145.95', 'women', 'scarf'),
(null, 'pourlespauvres', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf3.png', '1.95', 'men', 'scarf'),
(null, 'made_by_grandma', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf4.png', '25.95', 'men', 'scarf'),
(null, 'old_fashion', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/scarf5.png', '15.95', 'women', 'scarf'),
(null, 'he_will_be_back', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/pull1.png', '115.95', 'women', 'pull'),
(null, 'nice_one', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/pull2.png', '135.95', 'women', 'pull'),
(null, 'high_education', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/pull3.png', '115.95', 'women', 'pull'),
(null, 'bad_boy', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/pull4.png', '95.95', 'men', 'pull'),
(null, 'Vanilla', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/glasses1.png', '15.95', 'women', 'glasses'),
(null, 'Special_Keke', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/glasses2.png', '45.95', 'women', 'glasses'),
(null, 'Plus_didee', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/glasses3.png', '23.95', 'women', 'glasses'),
(null, 'Marvelous', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/glasses4.png', '69.95', 'men', 'glasses'),
(null, 'Macho', 'https://raw.githubusercontent.com/agavrel/42-Projects/master/Piscine_PHP/Rush00/resources/glasses5.png', '12.95', 'men', 'glasses');
}


if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM users")) == 0)
{
	mysqli_query($link, "INSERT INTO users
	VALUES (null, 'arlecomt', 'arlecomt@student.42.fr', 'fc922396dd7baa77aae45a177dae12deb56345d84f0e17b31eb99485d5555e378d0828ba84a8ef928b30bc8b56a10d7acad46af46d4b57faf7527f5df93c6f2a', 'girard', 'yes'),
	(null, 'apemjean', 'apemjean@student.42.fr', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'void', 'yes')
	;");
}
?>