<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$stmt = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart = [];
$subtotal = 0;

while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
    $subtotal += (float)$row["product_price"] * (int)$row["quantity"];
}

if (empty($cart)) {
    header("Location: bag.php");
    exit;
}

$shipping = 9.99;
$total = $subtotal + $shipping;

$name = $_POST["full_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];


$stmt_order = $conn->prepare("
    INSERT INTO orders (user_id, full_name, email, phone, address, total)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt_order->bind_param("issssd", $user_id, $name, $email, $phone, $address, $total);
$stmt_order->execute();

$order_id = $stmt_order->insert_id;

foreach ($cart as $item) {
    $stmt_items = $conn->prepare("
        INSERT INTO order_items 
        (order_id, product_id, product_name, product_price, product_size, product_image, quantity)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt_items->bind_param(
        "isssssi",
        $order_id,
        $item["product_id"],
        $item["product_name"],
        $item["product_price"],
        $item["product_size"],
        $item["product_image"],
        $item["quantity"]
    );

    $stmt_items->execute();
    $stmt_items->close();
}

$stmt_clear = $conn->prepare("DELETE FROM cart_items WHERE user_id = ?");
$stmt_clear->bind_param("i", $user_id);
$stmt_clear->execute();

header("Location: order_confirmation.php");
exit;
