<?php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

// 1. Initialize mysqli
$conn = mysqli_init();

// 2. Setup SSL (Required for Aiven)
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// 3. Connect using the variables
$success = mysqli_real_connect(
    $conn, 
    $host, 
    $user, 
    $pass, 
    $dbname, 
    $port, 
    NULL, 
    MYSQLI_CLIENT_SSL
);

if (!$success) {
    die("DB connection failed: " . mysqli_connect_error());
}
?>
