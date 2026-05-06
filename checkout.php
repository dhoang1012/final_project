<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// get cart items
$stmt = $conn->prepare("
    SELECT * 
    FROM cart_items 
    WHERE user_id = ?
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart = [];
$subtotal = 0;

while ($row = $result->fetch_assoc()) {
    $cart[] = $row;
    $subtotal += $row["product_price"] * $row["quantity"];
}

$shipping = ($subtotal > 0) ? 9.99 : 0;
$total = $subtotal + $shipping;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<div class="checkout-container">

    <!-- LEFT: FORM -->
    <div class="checkout-form">

        <h1>Checkout</h1>

        <h3>Shipping Information</h3>

        <?php if (isset($_SESSION["user_id"])): ?>
            <p class="checkout-subtext">Welcome back!</p>
        <?php else: ?>
            <p class="checkout-subtext">
                Sign in for faster checkout, or continue as guest below.
            </p>
        <?php endif; ?>

        <form action="place_order.php" method="POST">

            <input type="text" name="full_name" placeholder="Full name" required>

            <input type="email" name="email" placeholder="Email address" required>

            <input type="text" name="phone" placeholder="Phone number (e.g. +1 234 567 8900)" required>

            <textarea name="address" placeholder="Shipping address (Street, City, State, ZIP, Country)" required></textarea>

            <h3>Payment</h3>
            <p class="demo-note">For demonstration purpose: no real payment processed.</p>

            <button type="submit" class="place-order-btn">
                Place Order — $<?php echo number_format($total, 2); ?>
            </button>

        </form>

    </div>

    <!-- RIGHT: SUMMARY -->
    <div class="checkout-summary">

    <h3>Order Summary</h3>

    <!-- Divider 1: under title -->
    <hr class="summary-divider">

    <?php foreach ($cart as $item): ?>
        <div class="summary-item">
            <p>
                <?php echo $item["product_name"]; ?> ×<?php echo $item["quantity"]; ?>
                / <?php echo $item["product_size"]; ?>
            </p>
            <p>$<?php echo number_format($item["product_price"] * $item["quantity"], 2); ?></p>
        </div>
    <?php endforeach; ?>

    <!-- Divider 2: before totals -->
    <hr class="summary-divider">

    <div class="summary-row">
        <span>Subtotal</span>
        <span>$<?php echo number_format($subtotal, 2); ?></span>
    </div>

    <div class="summary-row">
        <span>Shipping</span>
        <span>$<?php echo number_format($shipping, 2); ?></span>
    </div>

    <div class="summary-total">
        <span>Total</span>
        <span>$<?php echo number_format($total, 2); ?></span>
    </div>

</div>

</div>

</body>
</html>