<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kilian Angel's Share Body Wash | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<!-- PRODUCT PAGE -->
<section class="product-page">

    <!-- LEFT IMAGE -->
    <div class="product-left">
        <img src="images/angel_share_bodywash.png" alt="Kilian Angel's Share Body Wash">
    </div>

    <!-- RIGHT INFO -->
    <div class="product-right">

        <h1>Kilian Angel's Share Body Wash</h1>

        <p class="price">$80.00</p>
        <p class="price-note">Full size (250ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            Angels' Share by By Kilian is a warm, boozy ode to Kilian Hennessy's cognac-making heritage, capturing the "angels' share" that evaporates into the heavens. Now transformed into a decadent cleansing ritual, this shower gel is richly infused with the fragrance to offer a full-sensory indulgence.
        </p>

        <!-- ADD TO BAG -->
        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="angel-share-bodywash">
            <input type="hidden" name="product_name" value="Kilian Angel's Share Body Wash">
            <input type="hidden" name="product_price" value="80">
            <input type="hidden" name="product_size" value="250ml">
            <input type="hidden" name="product_image" value="images/angel_share_bodywash.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>

    </div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>