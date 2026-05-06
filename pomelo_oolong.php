<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O.B.A. ALB | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>


<section class="product-page">
    <div class="product-left">
        <img src="images/pomelo_oolong.png" alt="d'Annam Pomelo Oolong">
    </div>

    <div class="product-right">
        <h1>d'Annam Pomelo Oolong</h1>
        <p class="price">$169.99</p>
        <p class="price-note">Full size (50ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            Pomelo Oolong by d'Annam captures China's daily ritual of reflection through the layered elegance of oolong, infused with notes of pomelo and white blossoms. A refreshing harmony that echoes quiet conversations in sunlit tea houses.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Details</h3>
            <p>Note: Oolong Tea, Pomelo, Osmanthus, Porcelain, White Musk</p>
    		<p>Main Accords: Tea / Fresh</p>
        </div>

        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="pomelo-oolong">
            <input type="hidden" name="product_name" value="d'Annam Pomelo Oolong">
            <input type="hidden" name="product_price" value="169.99">
            <input type="hidden" name="product_size" value="50ml">
            <input type="hidden" name="product_image" value="images/pomelo_oolong.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>
    </div>
</section>


<!-- FOOTER -->
    <?php include 'footer.php'; ?>

</body>
</html>