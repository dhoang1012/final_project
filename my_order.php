<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

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

    <h1 class="orders-title">My Orders</h1>

    <?php if ($orders->num_rows === 0): ?>
        <p class="empty-state">No orders yet.</p>
    <?php endif; ?>

    <?php while ($order = $orders->fetch_assoc()): ?>

        <div class="order-box">

            <div class="order-header">
                <div class="order-id">Order #<?php echo $order["id"]; ?></div>
                <div class="order-total">$<?php echo number_format($order["total"], 2); ?></div>
            </div>

            <div class="order-address">
                <?php echo htmlspecialchars($order["address"]); ?>
            </div>

            <?php
	        $stmt_items = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
	        $stmt_items->bind_param("i", $order["id"]);
	        $stmt_items->execute();
	        $items = $stmt_items->get_result();
	        ?>

            <div class="order-items">

                <?php while ($item = $items->fetch_assoc()): ?>
                    <div class="order-item">

                        <img src="<?php echo $item["product_image"]; ?>">

                        <div>
                            <p><strong><?php echo $item["product_name"]; ?></strong></p>
                            <p>Qty: <?php echo $item["quantity"]; ?></p>
                            <p>$<?php echo number_format($item["product_price"], 2); ?></p>
                        </div>

                    </div>
                <?php endwhile; ?>

            </div>
            ?php $stmt_items->close();

        </div>

    <?php endwhile; ?>

</div>

<?php include 'footer.php'; ?>

</body>
</html>