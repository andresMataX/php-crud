<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'php_dev');
define('DB_PASS', 'php_dev');
define('DB_NAME', 'productosapp-php');


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}
