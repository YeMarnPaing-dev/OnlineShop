<?php
session_start();
ob_start();

// Load database credentials from environment or separate config file
$server_name = getenv('DB_HOST') ?: '127.0.0.1';
$username    = getenv('DB_USER') ?: 'root';
$password    = getenv('DB_PASS') ?: 'root';
$dbname      = getenv('DB_NAME') ?: 'online_shop';

// Define site URL
// define('SITEURL', getenv('SITE_URL') ?: 'http://127.0.0.1/Online-Shop/');

// Create connection using MySQLi (object-oriented)
$conn = new mysqli($server_name, $username, $password, $dbname);

// Check connection
if ($conn) {
 echo 'Connected';
}else{
       die('Database Connection Failed: ' . $conn->connect_error);
}

// Optional: remove this in production
// echo 'Connected successfully';
?>
