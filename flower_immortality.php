<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kilian Flower of Immortality | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>

<?php include 'nav.php'; ?>

<!-- PRODUCT PAGE -->
<section class="product-page">

    <!-- LEFT IMAGE -->
    <div class="product-left">
        <img src="images/flower_immortality.png" alt="Kilian Flower of Immortality">
    </div>

    <!-- RIGHT INFO -->
    <div class="product-right">

        <h1>Flower of Immortality</h1>

        <p class="price">$275.00</p>
        <p class="price-note">Full size (100ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            Kilian's Flower of Immortality celebrates white peaches, inspired by ancient Chinese folklore and the idea of a utopian garden in eternal spring.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: White Peach, Nectarine, Peach Blossom, Coconut</p>
            <p>Heart: Iris, Rose, Black Currant, Freesia</p>
            <p>Base: Tonka Bean, Carrot Seeds, Musk, Vanilla</p>
        </div>

        <!-- ADD TO BAG -->
        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="flower-immortality">
            <input type="hidden" name="product_name" value="Kilian Flower of Immortality">
            <input type="hidden" name="product_price" value="275">
            <input type="hidden" name="product_size" value="100ml">
            <input type="hidden" name="product_image" value="images/flower_immortality.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>

    </div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>