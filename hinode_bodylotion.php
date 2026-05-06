<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O.B.A. Hinode Body Lotion | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

<section class="product-page">
    <div class="product-left">
        <img src="images/hinode_bodylotion.png" alt="O.B.A. Hinode Body Lotion">
    </div>

    <div class="product-right">
        <h1>O.B.A. Hinode Body Lotion</h1>
        <p class="price">$79.99</p>
        <p class="price-note">Full size (300ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            HINODE by The O.B.A. captures a moss-clad oasis where hinoki wood, fresh cedar, and orchid dance with velvety juniper and a hint of woodsmoke. This nourishing formula harnesses Niacinamide to enhance clarity, while Centella Asiatica, aloe, and hyaluronic acid soothe and moisturize. Crafted for daily use, this hydrating lotion leaves skin revitalized and enveloped in a magnetic, serene tranquility.
        </p>

        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="hinode-bodylotion">
            <input type="hidden" name="product_name" value="O.B.A. Hinode Body Lotion">
            <input type="hidden" name="product_price" value="79.99">
            <input type="hidden" name="product_size" value="300ml">
            <input type="hidden" name="product_image" value="images/hinode_bodylotion.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>
    </div>
</section>


<!-- FOOTER -->
    <?php include 'footer.php'; ?>

</body>
</html>
