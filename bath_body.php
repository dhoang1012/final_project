<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bath & Body | Scent Atelier</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <?php include 'nav.php'; ?>


<section class="page-hero">
    <h1>Bath & Body</h1>
    <p>Elevated essentials for daily ritual.</p>
</section>

<section class="filter-bar">

    <select class="type-filter">
        <option value="all">All Products</option>
        <option value="bodylotion">Body Lotion</option>
        <option value="handcream">Hand Cream</option>
        <option value="bodywash">Body Wash</option>
    </select>

</section>

<section class="product-section">

    <div class="product-grid">

        <!-- O.B.A. Hinode Body Lotion -->
        <div class="product-card" data-type="bodylotion"data-id="hinode-bodylotion" data-brand="oba" data-price="79.99">
            <a href="hinode_bodylotion.php">
                <div class="img-box">
                    <img src="images/hinode_bodylotion.png" alt="O.B.A. Hinode Body Lotion">
                </div>
                <h3>O.B.A. Hinode Body Lotion</h3>
            </a>

            <p class="price">$79.99</p>
        </div>

        <!-- To Summer Osmanthus Hand Cream -->
        <div class="product-card" data-type="handcream" data-id="osmanthus-handcream" data-brand="tosummer" data-price="49.99">
            <a href="osmanthus_handcream.php">
                <div class="img-box">
                    <img src="images/osmanthus_handcream.png" alt="To Summer Osmanthus Hand Cream">
                </div>
                <h3>To Summer Osmanthus Hand Cream</h3>
            </a>

            <p class="price">$49.99</p>
        </div>

        <!-- Kilian Angel Share Body Wash -->
        <div class="product-card" data-type="bodywash" data-id="angel_share_bodywash" data-brand="kilian" data-price="80.00">
            <a href="angel_share_bodywash.php">
                <div class="img-box">
                    <img src="images/angel_share_bodywash.png" alt="Kilian Angel's Share Body Wash">
                </div>
                <h3>Kilian Angel's Share Body Wash</h3>
            </a>

            <p class="price">$80.00</p>
        </div>

    </div>

</section>

<script>
const typeFilter = document.querySelector('.type-filter');
const products = document.querySelectorAll('.product-card');

function filterProducts() {
    const selectedType = typeFilter.value;

    products.forEach(product => {
        const type = product.dataset.type;

        const matchesType =
            selectedType === 'all' || type === selectedType;

        product.style.display = matchesType ? 'block' : 'none';
    });
}

typeFilter.addEventListener('change', filterProducts);
</script>

    <?php include 'footer.php'; ?>

</body>
</html>