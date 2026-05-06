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

    <!-- LEFT IMAGE -->
    <div class="product-left">
        <img src="images/alb.png" alt="O.B.A. ALB">
    </div>

    <!-- RIGHT INFO -->
    <div class="product-right">

        <h1>O.B.A. ALB</h1>

        <p class="price">$129.99</p>
        <p class="price-note">Full size (50ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            Alb by The O.B.A. captures a sunny spring afternoon where a gentle breeze whisks sweet geranium and spicy undertones through fields of daisies.
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Pink Pepper, Lemon, Bergamot</p>
            <p>Heart: Geranium, Lavender, Cloves</p>
            <p>Base: Ambergris, Iso E Super, White Musk, Tonka Bean</p>
        </div>

        <!-- ADD TO BAG -->
        <form action="add_to_bag.php" method="POST">

            <input type="hidden" name="product_id" value="oba-alb">
            <input type="hidden" name="product_name" value="O.B.A. ALB">
            <input type="hidden" name="product_price" value="129.99">
            <input type="hidden" name="product_size" value="50ml">
            <input type="hidden" name="product_image" value="images/alb.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>

    </div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>