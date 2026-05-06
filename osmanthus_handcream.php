<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Summer Osmanthus Hand Cream | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>


<section class="product-page">
    <div class="product-left">
        <img src="images/osmanthus_handcream.png" alt="To Summer Osmanthus Hand Cream">
    </div>

    <div class="product-right">
        <h1>To Summer Osmanthus Hand Cream</h1>
        <p class="price">$49.99</p>
        <p class="price-note">Size: 30ml</p>

        <!-- DESCRIPTION -->
        <p class="description">
            To Summer Osmanthus is a poetic tribute to fleeting autumn, capturing the sweet essence of osmanthus as rain falls on your shoulder. This deep moisturizing lotion features five plant oils—nut seed, shea butter, sunflower, avocado, and oat kernel oil—carefully blended with rice fermentation filtrate. Using micro-emulsification technology, the formula absorbs instantly to soften and hydrate, leaving skin revitalized and elegantly scented.
        </p>

        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="osmanthus-handcream">
            <input type="hidden" name="product_name" value="To Summer Osmanthus Hand Cream">
            <input type="hidden" name="product_price" value="49.99">
            <input type="hidden" name="product_size" value="30ml">
            <input type="hidden" name="product_image" value="images/osmanthus_handcream.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>
    </div>
</section>

<!-- FOOTER -->
    <?php include 'footer.php'; ?>

</body>
</html>
