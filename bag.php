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

$total_price = 0;
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
        <h1>Your Shopping Bag</h1>

        <?php if ($result->num_rows > 0): ?>
            <div class="cart-items">
                <?php while($item = $result->fetch_assoc()): ?>
                    <div class="cart-item">
                        <img src="<?php echo $item['product_image']; ?>" alt="Product">
                        <div class="item-details">
						    <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
						    <p>Size: <?php echo htmlspecialchars($item['product_size']); ?></p>
						    <p>Price: $<?php echo number_format((float)$item['product_price'], 2); ?></p>
						    
						    <div class="quantity-controls">
						        <form action="update_quantity.php" method="POST" style="display: flex; align-items: center; gap: 10px;">
						            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
						            
						            <button type="submit" name="action" value="decrease" class="qty-btn">-</button>
						            <span class="qty-number"><?php echo (int)$item['quantity']; ?></span>
						            <button type="submit" name="action" value="increase" class="qty-btn">+</button>
						        </form>
						    </div>

						    <a href="remove_from_bag.php?id=<?php echo $item['id']; ?>" class="remove-link">Remove</a>
						</div>

                        <?php 
                            $total_price += ($item['product_price'] * $item['quantity']); 
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="cart-summary">
                <h2>Total: $<?php echo number_format($total_price, 2); ?></h2>
                <button class="checkout-btn">Checkout</button>
            </div>

        <?php else: ?>
            <p>Your bag is empty! <a href="index.php">Go shopping.</a></p>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
