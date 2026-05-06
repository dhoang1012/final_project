<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Summer Osmanthus | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

<section class="product-page">
    <div class="product-left">
        <img src="images/osmanthus.png" alt="To Summer Osmanthus">
    </div>

    <div class="product-right">
        <h1>To Summer Osmanthus</h1>
        <p class="price">$139.99</p>
        <p class="price-note">Full size (30ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            To Summer Osmanthus features the sweet and gragrant essence of osmanthus. A poetc and elegant tribute to the scent of osmanthus as rain fall on your shoulder. An ode to the fleeting autumn.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Peach, Bitter Orange</p>
    		<p>Heart: Osmanthus, Jasmine Tea, Green Leaves, Oily</p>
    		<p>Base: Musk, Amber</p>
        </div>

        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="osmanthus">
            <input type="hidden" name="product_name" value="To Summer Osmanthus">
            <input type="hidden" name="product_price" value="139.99">
            <input type="hidden" name="product_size" value="30ml">
            <input type="hidden" name="product_image" value="images/osmanthus.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>
    </div>
</section>

<!-- FOOTER -->
    <?php include 'footer.php'; ?>

</body>
</html>
