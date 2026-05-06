<?php
session_start();
require_once "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// Use a unique variable name to avoid conflicts with nav.php
$stmt_bag = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ?");
$stmt_bag->bind_param("i", $user_id);
$stmt_bag->execute();
$result_bag = $stmt_bag->get_result();

$cart = [];
$total = 0;

// Store items in an array first so we can use your original foreach loop
while ($row = $result_bag->fetch_assoc()) {
    $cart[] = $row;
    $total += (float)$row["product_price"] * (int)$row["quantity"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Bag | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<div class="bag-container">

    <h1>Your Bag</h1>

    <?php if (empty($cart)): ?>
        <p style="text-align:center;">Your bag is empty. <a href="index.php">Go shopping.</a></p>
    <?php else: ?>

        <?php foreach ($cart as $item): ?>

            <div class="bag-item">

                <!-- LEFT SIDE -->
                <div class="bag-left">
                    <img src="<?php echo htmlspecialchars($item['product_image']); ?>">

                    <div class="bag-info">
                        <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
                        <p><?php echo htmlspecialchars($item['product_size']); ?></p>
                        <p>$<?php echo number_format((float)$item['product_price'], 2); ?></p>

                        <a class="remove-link" href="remove_from_bag.php?id=<?php echo $item['id']; ?>">
                            Remove
                        </a>
                    </div>
                </div>

                <!-- RIGHT SIDE -->
                <div class="bag-right">
                    <div class="qty-controls">
                        <!-- DECREASE -->
                        <form action="update_quantity.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <input type="hidden" name="action" value="decrease">
                            <button type="submit">−</button>
                        </form>

                        <span><?php echo (int)$item['quantity']; ?></span>

                        <!-- INCREASE -->
                        <form action="update_quantity.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <input type="hidden" name="action" value="increase">
                            <button type="submit">+</button>
                        </form>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>

        <!-- SUMMARY -->
        <div class="bag-summary">
            <h2>Total: $<?php echo number_format($total, 2); ?></h2>
            <a href="checkout.php" class="checkout-btn">
                Checkout
            </a>
        </div>

    <?php endif; ?>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
