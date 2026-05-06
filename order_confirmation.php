<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// get latest order
$stmt = $conn->prepare("
    SELECT * 
    FROM orders 
    WHERE user_id = ? 
    ORDER BY id DESC 
    LIMIT 1
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orderResult = $stmt->get_result();
$order = $orderResult->fetch_assoc();

if (!$order) {
    header("Location: index.php");
    exit;
}

// get items
$stmt = $conn->prepare("
    SELECT * 
    FROM order_items 
    WHERE order_id = ?
");
$stmt->bind_param("i", $order["id"]);
$stmt->execute();
$items = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<div class="confirmation-container">

    <div class="confirmation-box">

        <h1>Thank you for your order</h1>
        <p class="confirm-subtext">
            Your order has been placed successfully.
        </p>

        <div class="order-meta">
            <p><strong>Order ID:</strong> #<?php echo $order["id"]; ?></p>
            <p><strong>Total:</strong> $<?php echo number_format($order["total"], 2); ?></p>
            <p><strong>Shipping to:</strong> <?php echo htmlspecialchars($order["address"]); ?></p>
        </div>

        <h3>Items</h3>

        <?php while ($item = $items->fetch_assoc()): ?>
            <div class="confirm-item">

                <img src="<?php echo $item["product_image"]; ?>">

                <div>
                    <p><?php echo $item["product_name"]; ?></p>
                    <p>Size: <?php echo $item["product_size"]; ?></p>
                    <p>Qty: <?php echo $item["quantity"]; ?></p>
                    <p>$<?php echo number_format($item["product_price"], 2); ?></p>
                </div>

            </div>
        <?php endwhile; ?>

        <a href="index.php" class="home-btn">
            Continue Shopping
        </a>

    </div>

</div>

</body>
</html>