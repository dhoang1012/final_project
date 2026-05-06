<?php
session_start();
require_once "db.php"; 

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$stmt_bag = $conn->prepare("SELECT * FROM cart_items WHERE user_id = ?");
$stmt_bag->bind_param("i", $user_id);
$stmt_bag->execute();
$result_bag = $stmt_bag->get_result();

$total_price = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Bag | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cloudflare.com">
</head>
<body>
    
    <?php include 'nav.php'; ?>

    <div class="bag-container">
        <h1>Your Shopping Bag</h1>

        <?php if ($result_bag->num_rows > 0): ?>
            <div class="cart-items">
                <?php while($item = $result_bag->fetch_assoc()): ?>
                    <div class="cart-item">
                        <img src="<?php echo htmlspecialchars($item['product_image']); ?>" alt="Product">
                        
                        <div class="item-details">
                            <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
                            <p>Size: <?php echo htmlspecialchars($item['product_size']); ?></p>
                            <p>Price: $<?php echo number_format((float)$item['product_price'], 2); ?></p>
                            <p>Quantity: <?php echo (int)$item['quantity']; ?></p>
                        </div>

                        <?php 
                            // Calculate subtotal for this specific item
                            $item_total = (float)$item['product_price'] * (int)$item['quantity'];
                            $total_price += $item_total; 
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="cart-summary">
                <h2>Total: $<?php echo number_format($total_price, 2); ?></h2>
                <a href="checkout.php" class="checkout-btn" style="text-decoration: none; display: inline-block; text-align: center;">
                    Checkout
                </a>
            </div>

        <?php else: ?>
            <div class="empty-bag">
                <p>Your bag is empty!</p>
                <a href="index.php" class="shop-link">Go shopping.</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
