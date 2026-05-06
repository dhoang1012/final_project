<?php
$host = "sql207.ezyro.com";       // Updated for ProFreeHost
$user = "ezyro_41843011";         // Your FTP/Control Panel username
$pass = "abc123";  // The password you use to log in to ProFreeHost
$db   = "ezyro_41843011_Shop";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}
?>

