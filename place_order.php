<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// 1. Get cart items
$stmt = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
    $total += $row["product_price"] * $row["quantity"];
}

if (empty($cart)) {
    header("Location: bag.php");
    exit;
}

// 2. Get form data
$name = $_POST["full_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];

// 3. Create order
$stmt = $conn->prepare("
    INSERT INTO orders (user_id, full_name, email, phone, address, total)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->bind_param("issssd", $user_id, $name, $email, $phone, $address, $total);
$stmt->execute();

$order_id = $stmt->insert_id;

// 4. Insert order items
foreach ($cart as $item) {

    $stmt = $conn->prepare("
        INSERT INTO order_items 
        (order_id, product_id, product_name, product_price, product_size, product_image, quantity)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "issdssi",
        $order_id,
        $item["product_id"],
        $item["product_name"],
        $item["product_price"],
        $item["product_size"],
        $item["product_image"],
        $item["quantity"]
    );

    $stmt->execute();
}

// 5. Clear cart
$stmt = $conn->prepare("DELETE FROM cart_items WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

// 6. Redirect
header("Location: order_confirmation.php");
exit;