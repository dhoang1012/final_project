<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Summer Magnolia | Scent Atelier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>

<section class="product-page">
    <div class="product-left">
        <img src="images/magnolia.png" alt="To Summer Magnolia">
    </div>

    <div class="product-right">
        <h1>To Summer Magnolia</h1>
        <p class="price">$139.99</p>
        <p class="price-note">Full size (30ml)</p>

        <!-- DESCRIPTION -->
        <p class="description">
            To Summer Magnolia holds the tender nostalgia of summers. It's an ode to a memory of the perfumist's grandmother who used to pinned four fresh magnolias to her dress before going to the park. The streets in her memory were lined with blooming white magnolias. This scent captures that memory, the fresh warmth of summer flowers enveloping your body. 
        </p>

        <!-- NOTES -->
        <div class="notes">
            <h3>Notes</h3>
            <p>Top: Green Notes, Narcissus, Magnolia</p>
    		<p>Heart: Tuberose, Jasmine, Neroli</p>
    		<p>Base: Cedarwood, Amber, Musk</p>
        </div>

       <form method="POST" action="add_to_bag.php">

            <input type="hidden" name="product_id" value="magnolia">
            <input type="hidden" name="product_name" value="To Summer Magnolia">
            <input type="hidden" name="product_price" value="139.99">
            <input type="hidden" name="product_size" value="30ml">
            <input type="hidden" name="product_image" value="images/magnolia.png">

            <button class="add-btn" type="submit">Add to Bag</button>

        </form>
    </div>
</section>

    <?php include 'footer.php'; ?>

</body>
</html>
