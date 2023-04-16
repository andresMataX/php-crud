<?php
define('DB_HOST', 'b4jxgubl4uhjwxxikiqg-mysql.services.clever-cloud.com');
define('DB_NAME', 'b4jxgubl4uhjwxxikiqg');
define('DB_USER', 'uy94b8h2imcststa');
define('DB_PASS', 'lEg75hFf50vE7agHBCED');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}
