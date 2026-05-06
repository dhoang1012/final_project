<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kilian Intoxicated | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>


<section class="product-page">
    <div class="product-left">
        <img src="images/intoxicated.png" alt="Kilian Intoxicated">
    </div>

    <div class="product-right">
        <h1>Intoxicated</h1>
        <p class="price">$275.00</p>
        <p class="price-note">Full size (100ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            Intoxicated by Kilian is a dark, addictive tribute to the rich tradition of Turkish coffee, capturing that potent moment when rising steam meets the air, thick with roasted beans and exotic spices. It is a fragrance of contradictions, dangerously bold in its spicy depth, yet incredibly cozy in its velvety warmth.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Cardamom, Coffee, Bergamot, Aldehydes</p>
            <p>Heart: Nutmeg, Cinnamon, Tobacco, Ginger, Geranium</p>
            <p>Base: Caramel, Mocha, Vanilla, Balsam Fir, Patchouli, Coumarin, Sugar, Marshmallow</p>
        </div>

        <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="intoxicated">
            <input type="hidden" name="product_name" value="Kilian Intoxicated">
            <input type="hidden" name="product_price" value="275">
            <input type="hidden" name="product_size" value="100ml">
            <input type="hidden" name="product_image" value="images/intoxicated.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>
    </div>
</section>


<!-- FOOTER -->
    <?php include 'footer.php'; ?>

</body>
</html>
