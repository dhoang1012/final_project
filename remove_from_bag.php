<?php
session_start();
require_once "db.php";

// 1. Always check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$cart_id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

if ($cart_id > 0) {
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $cart_id, $user_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: bag.php");
exit;
?>
