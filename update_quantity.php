<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$id = $_POST["id"];
$action = $_POST["action"];

// get current quantity
$stmt = $conn->prepare("
    SELECT quantity 
    FROM cart_items 
    WHERE id = ? AND user_id = ?
");
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();

if (!$item) {
    header("Location: bag.php");
    exit;
}

$qty = $item["quantity"];

// update logic
if ($action === "increase") {
    $qty++;
} elseif ($action === "decrease") {
    $qty--;
}

// REMOVE IF 0 OR LESS
if ($qty <= 0) {

    $delete = $conn->prepare("
        DELETE FROM cart_items 
        WHERE id = ? AND user_id = ?
    ");
    $delete->bind_param("ii", $id, $user_id);
    $delete->execute();

} else {

    $update = $conn->prepare("
        UPDATE cart_items 
        SET quantity = ? 
        WHERE id = ? AND user_id = ?
    ");
    $update->bind_param("iii", $qty, $id, $user_id);
    $update->execute();
}

header("Location: bag.php");
exit;