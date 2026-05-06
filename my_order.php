<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// get orders
$stmt = $conn->prepare("
    SELECT * 
    FROM orders 
    WHERE user_id = ? 
    ORDER BY id DESC
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>

<?php include 'nav.php'; ?>

<div class="orders-container">

    <h1>My Orders</h1>

    <?php if ($orders->num_rows === 0): ?>
        <p>No orders yet.</p>
    <?php endif; ?>

    <?php while ($order = $orders->fetch_assoc()): ?>

        <div class="order-box">

            <h3>Order #<?php echo $order["id"]; ?></h3>
            <p>Total: $<?php echo number_format($order["total"], 2); ?></p>
            <p>Shipping: <?php echo htmlspecialchars($order["address"]); ?></p>

            <?php
            $stmt = $conn->prepare("
                SELECT * FROM order_items WHERE order_id = ?
            ");
            $stmt->bind_param("i", $order["id"]);
            $stmt->execute();
            $items = $stmt->get_result();
            ?>

            <div class="order-items">

                <?php while ($item = $items->fetch_assoc()): ?>
                    <div class="order-item">
                        <img src="<?php echo $item["product_image"]; ?>" width="60">

                        <div>
                            <p><?php echo $item["product_name"]; ?></p>
                            <p>Qty: <?php echo $item["quantity"]; ?></p>
                            <p>$<?php echo number_format($item["product_price"], 2); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>

        </div>

    <?php endwhile; ?>

</div>

</body>
</html>