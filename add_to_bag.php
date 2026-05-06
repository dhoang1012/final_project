<?php
session_start();
require_once "db.php";

// 1. Ensure user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// 2. Get POST data
$product_id = $_POST["product_id"];
$name       = $_POST["product_name"];
$price      = $_POST["product_price"];
$size       = $_POST["product_size"] ?? 'standard'; // Default if empty
$image      = $_POST["product_image"] ?? '';

// 3. Check if item already exists in cart for this user
// Changed "iss" to match: int (user_id), string (product_id), string (size)
$stmt = $conn->prepare("
    SELECT id, quantity 
    FROM cart_items 
    WHERE user_id = ? AND product_id = ? AND product_size = ?
");

$stmt->bind_param("iss", $user_id, $product_id, $size);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // 4. Update quantity if it exists
    $newQty = $row["quantity"] + 1;
    $update = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
    $update->bind_param("ii", $newQty, $row["id"]);
    $update->execute();
} else {
    // 5. Insert new item
    // Corrected bind_param string to "isssss" (6 total parameters)
    $insert = $conn->prepare("
        INSERT INTO cart_items 
        (user_id, product_id, product_name, product_price, product_size, product_image, quantity)
        VALUES (?, ?, ?, ?, ?, ?, 1)
    ");

    $insert->bind_param(
        "isssss", 
        $user_id,
        $product_id,
        $name,
        $price,
        $size,
        $image
    );

    $insert->execute();
}

// 6. Redirect back to the cart page
header("Location: bag.php");
exit;
?>
