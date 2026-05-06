<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$product_id = $_POST["product_id"];
$name       = $_POST["product_name"];
$price      = $_POST["product_price"];
$size       = $_POST["product_size"] ?? null;
$image      = $_POST["product_image"] ?? null;

// check if already exists
$stmt = $conn->prepare("
    SELECT id, quantity 
    FROM cart_items 
    WHERE user_id = ? AND product_id = ? AND product_size = ?
");

$stmt->bind_param("iss", $user_id, $product_id, $size);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    // update quantity
    $newQty = $row["quantity"] + 1;

    $update = $conn->prepare("
        UPDATE cart_items 
        SET quantity = ? 
        WHERE id = ?
    ");
    $update->bind_param("ii", $newQty, $row["id"]);
    $update->execute();

} else {

    // insert new item
    $insert = $conn->prepare("
        INSERT INTO cart_items 
        (user_id, product_id, product_name, product_price, product_size, product_image, quantity)
        VALUES (?, ?, ?, ?, ?, ?, 1)
    ");

    $insert->bind_param(
        "issdss",
        $user_id,
        $product_id,
        $name,
        $price,
        $size,
        $image
    );

    $insert->execute();
}

header("Location: bag.php");
exit;
?>